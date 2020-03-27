<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services\UserService;

class AccountController extends Controller
{
    protected $userservice;
 
	public function __construct(UserService $userservice)
	{
        $this->userservice = $userservice;
    }
    
    //Gym ownner account
    public function gymowner(Request $request)
    {
        $user = $request->user();
        $gymownerid = $user->id;
        $data = $this->userservice->getGymSummary($gymownerid);
        
        return view('gymowneraccount', $data);
    }

    public function members($id)
    {
        return view('members');
    }
    
    //student account
    public function student(Request $request)
    {
        $user = $request->user();
        $id = $user->id;
        $members = $this->userservice->getMembers($id);
        // foreach($members as $key => $member)
        // {
        //     $o = $member->owner;
        //     $v = $member->videos;
        // }
        return view('memberaccount', ['members'=> $members]);
    }
    
    public function gymlist()
    {
        return view('gymlist');
    }
}
