<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Video;
use App\Gym;

use App\Services\UserService;
use App\Services\GymService;
use Spatie\Activitylog\Models\Activity;

class AccountController extends Controller
{
    protected $userservice;
    protected $gymservice;

	public function __construct(UserService $userservice, GymService $gymservice)
	{
        $this->userservice = $userservice;
        $this->gymservice = $gymservice;
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
    public function gymowner_details(Request $request)
    {
        $user = $request->user();
        $gymownerid = $user->id;
        $data = $this->userservice->getGymSummary($gymownerid);
      
        return view('gymownerdetails', $data);
    }
    public function gym_details(Request $request)
    {
        $user = $request->user();
        $gymownerid = $user->id;
        $data = $this->userservice->getGymSummary($gymownerid);
      
        return view('gymdetails', $data);
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
    public function student_details(Request $request)
    {
        $user = $request->user();
       
        $members = $user->approved_gyms;
        foreach($members as $key => $member)
        {
            $o = $this->userservice->read($member->owner_id);
            $member->owner = $o;
        }
        return view('studentaccountdetails', ['members'=> $members, 'user' => $user]);
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

            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log('update_user');

            return redirect()->back()->with('success', 'My Account Details have been updated successfully!');
        }else{
            $user = $request->user();
            $this->userservice->update($request, $id);

            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log('update_user');

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

    //member activity
    public function adminactivity()
    {   
        $activities = Activity::orderBy('created_at','desc')->get();

        foreach($activities as $activity)
        {
            $causer = $activity->causer;
            $subject = $activity->subject;
            $action = $activity->description;
        }

        return view('adminmemberactivity', ['activities'=>$activities]);
    }



    public function gymactivity($gym_id, Request $request)
    {
        $activities = Activity::orderBy('created_at','desc')->get();
        $user = auth()->user();
        $activities = Activity::orderBy('created_at','desc')->get();

        $nactivites = collect();
        foreach($activities as $key =>$activity)
        {
            $causer = $activity->causer;
            $subject = $activity->subject;

            if ($causer->id == $user->id)
            {
                $nactivites->push($activity); 
            }
            else
            {
                if ($this->userservice->isGymMember($causer, $gym_id)){
                    if ($subject instanceof Video && $subject->gym->id == $gym_id)
                    {
                        $nactivites->push($activity); 
                    }
                    else if ($subject instanceof Gym && $subject->id == $gym_id)
                    {
                        $nactivites->push($activity); 
                    }
                }
               
            }

        }
        $gym = $this->gymservice->read($gym_id);
        return view('gymmemberactivity', ['activities'=>$nactivites, 'gym'=>$gym]);
    }
}
