<?php

namespace App\Http\Controllers;
use App\Notifications\RequestAccessNotification;
use Illuminate\Http\Request;
use Notification;
use App\Repositories\MessageRepository;

use App\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $msgRepo;
    public function __construct(MessageRepository $msgRepo)
    {
        $this->middleware(['auth', 'verified']);
        $this->msgRepo = $msgRepo;
    }

    /**
     * Show the application dashboard, gymowner account, student account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $userHistory = $this->msgRepo->getUserList($user->id);
        $counts = $this->msgRepo->getUnreadCounts($user->id);
        $totalCounts = 0;
        foreach($userHistory as $key=>$client){
            $userHistory[$key]['unread'] = 0;
            foreach($counts as $one){
                if($one['sender'] == $client['id']) $userHistory[$key]['unread'] = $one['count'];
            }
        }
        foreach($counts as $one){
            $totalCounts += $one['count'];
        }
        $userHistory = $this->msgRepo->getLastUpdateDate($userHistory, $user->id);
        return view('message', ["user"=>$user, "userHistory"=>$userHistory, "totalUnread"=>$totalCounts]);
    }

    public function search(Request $request){
        $userId = $request->userId;
        $searchKey = $request->key;
        $users = $this->msgRepo->search_user($userId, $searchKey);
        foreach($users as $id=>$user){
            $users[$id]['first_name'] = ucfirst($user['first_name']);
            $users[$id]['last_name'] = ucfirst($user['last_name']);
        }
        return response()->json($users);

    }

    public function send(MessageRequest $request){
        $userId = $request->sender;
        $receiver = $request->receiver;
        $msg = $request->msg;
        
        $date = $this->msgRepo->store($userId, $receiver, $msg);
        return response()->json(array("success"=>1, "date"=>$date));
    }

    public function getHistory(Request $request){
        $userId = $request->userId;
        $clientId = $request->clientId;
        $history = $this->msgRepo->get($userId, $clientId);
        foreach($history as $key=>$one){
            $history[$key]['created_at'] = date("m/d/y H:i A", strtotime($one['created_at']));
        }
        return response()->json(array("history"=>$history));

    }

    public function checkUser(Request $request){
        $clientId = $request->clientId;
        $userId = $request->user()->id;
        $check = $this->msgRepo->checkUser($clientId, $userId);

        return response()->json(array("check"=>$check?1:0));
    }

    public function readAll(Request $request){
        $clientId = $request->clientId;
        $userId = $request->user()->id;
        $check = $this->msgRepo->readAll($userId, $clientId);
        return response()->json(array("count"=>$check));
    }

    public function getAllData(Request $request){
        $clientId = $request->clientId;
        $userId = $request->user()->id;
        $userHistory = $this->msgRepo->getUserList($userId);
        $counts = $this->msgRepo->getUnreadCounts($userId);
        $totalCounts = 0;
        foreach($userHistory as $key=>$client){
            $userHistory[$key]['unread'] = 0;
            foreach($counts as $one){
                if($one['sender'] == $client['id']) $userHistory[$key]['unread'] = $one['count'];
            }
        }
        foreach($counts as $one){
            $totalCounts += $one['count'];
        }
        $userHistory = $this->msgRepo->getLastUpdateDate($userHistory, $userId);
        if($clientId != 0){
            $history = $this->msgRepo->get($userId, $clientId);
            foreach($history as $key=>$one){
                $history[$key]['created_at'] = date("m/d/y H:i A", strtotime($one['created_at']));
            }
        }
        else{
            $history = array();
        }
        
        return response()->json(array("userHistory"=>$userHistory, "totalUnread"=>$totalCounts, "currentHistory"=>$history));
    }
       
}