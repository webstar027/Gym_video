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
       
        $members = $user->gyms;
        foreach($members as $key => $member)
        {
            $o = $this->userservice->read($member->owner_id);
            $member->owner = $o;
        }
        return view('memberaccount', ['members'=> $members, 'user' => $user]);
    }

    public function updateUser($id, Request $request)
	{
        $user = $request->user();
        
		$this->userservice->update($request, $id);
		return redirect('/admin');
    }
    
    public function gymlist()
    {
        return view('gymlist');
    }
}
