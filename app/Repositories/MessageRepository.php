<?php

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Message;
use App\Gym;
use App\Gym_User;
use App\User;
 
class MessageRepository
{
  protected $message;
  protected $gym;
  protected $gymUser;
  protected $user;
 
  public function __construct(Message $message, Gym $gym, Gym_User $gymUser, User $user)
  {
      $this->message = $message;
      $this->gym = $gym;
      $this->gymUser = $gymUser;
      $this->user = $user;
  }
    
  public function getUserList($userId){
    $senders = $this->message->where("sender", $userId )->join("users as s_users", "s_users.id", "=","messages.receiver")->select("s_users.id", "s_users.first_name", "s_users.last_name");
    $receivers = $this->message->where("receiver", $userId)->join("users as r_users", "r_users.id", "=", "messages.sender")->select("r_users.id", "first_name", "last_name");
    $result = $senders->union($receivers)->groupBy("id","first_name", "last_name")->get();
    
    return $result->toArray();
  }

  public function getUnreadCounts($userId){
    $query = $this->message->select("sender", DB::raw('count(*) as count'))
                          ->where("receiver",$userId)
                          ->where("status", 0)
                          ->groupBy("sender")
                          ->get();
    return $query->toArray();
  }

  public function getLastUpdateDate($users, $userId){
    foreach($users as $key=>$one){
      $clientId = $one['id'];
      $query=$this->message->select(DB::raw("MAX(created_at) as lastUpdate"))
                            ->where(function($q) use ($userId, $clientId){
                              $q->where("sender", $userId);
                              $q->where("receiver",$clientId);
                            })->orWhere(function($q) use ($userId, $clientId){
                              $q->where("sender", $clientId);
                              $q->where("receiver", $userId);
                            })->get();
      $array = $query->toArray();
      $users[$key]['lastUpdate'] = date("m/d/Y H:i A", strtotime($array[0]['lastUpdate']));
    }
    return $users;

  }

  public function search_user($userId, $key){
    $gymIds = $this->gymUser->select("gym_id")->where("user_id", $userId)->where("status", "1")->get();
    $arrayOfIds = [];
    foreach($gymIds as $one){
      $arrayOfIds[]=$one->gym_id;
    } 
    $users = $this->gymUser->whereIn("gym_id", $arrayOfIds)
              ->join("users", "gym_user.user_id", "=","users.id")
              ->select("users.id", "users.first_name", "users.last_name", "users.username", "users.email")
              ->where("users.username","like","%".$key."%")
              ->get();
    return $users;
  }

  
  public function store($sender, $receiver, $msg){
    $this->message->sender = $sender; 
    $this->message->receiver = $receiver;
    $this->message->msg = $msg;
    $this->message->save();
    $date = date("m/d/Y H:i A");
    return $date;
  }

  public function get($userId, $clientId){
    $history  = $this->message->where(function($q) use ($userId, $clientId){
      $q->where("sender", $userId);
      $q->where("receiver",$clientId);
    })->orWhere(function($q) use ($userId, $clientId){
      $q->where("sender", $clientId);
      $q->where("receiver", $userId);
    })->get();
    return $history->toArray();
  }

  public function checkUser($clientId, $userId){
    $count = $this->message->where(function($q) use ($userId, $clientId){
      $q->where("sender", $userId);
      $q->where("receiver",$clientId);
    })->orWhere(function($q) use ($userId, $clientId){
      $q->where("sender", $clientId);
      $q->where("receiver", $userId);
    })->count();
    if($count) return true;
    return false;
  }
  public function readAll($userId, $clientId){

    $count = $this->message->where("sender", $clientId)->where("receiver", $userId)->where("status", 0)->update(['status'=>1]);
    return $count;    
  }
 
}