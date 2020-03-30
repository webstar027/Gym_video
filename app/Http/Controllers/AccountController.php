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
    

    /**
     * Get gym information
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */    
    public function gymowner(Request $request)
    {
        $user = $request->user();
        $gymownerid = $user->id;
        $data = $this->userservice->getGymSummary($gymownerid);
      
        return view('gymowneraccount', $data);
    }

    /**
     * Get members information
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function members($id)
    {
        return view('members');
    }
    
    /**
     * Show student page
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function student(Request $request)
    {
        $user = $request->user();
       
        $members = $user->approved_gyms;
        foreach($members as $key => $member)
        {
            $o = $this->userservice->read($member->owner_id);
            $member->owner = $o;
        }
        return view('memberaccount', ['members'=> $members, 'user' => $user]);
    }

    /**
     * Update user page
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function updateUser($id, Request $request)
	{
        if (!empty($request->input('password'))){
            $this->validate($request, [
                'email'=>'required|string|email',
                'password'=>'sometimes|string|min:6|confirmed'
                
            ]);
            $user = $request->user();
            $this->userservice->update($request, $id);
            return redirect()->back()->with('success', 'Details and Password has been updated successfully!');
        }else{
            $user = $request->user();
            $this->userservice->update($request, $id);
            return redirect()->back()->with('success', 'My Account Details have been updated successfully!');
        }
        
    }
  
            
    /**
     * Update user page
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function gymlist()
    {
        return view('gymlist');
    }
}
