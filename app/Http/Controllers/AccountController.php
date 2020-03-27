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
        return view('memberaccount');
    }
    //student account
    public function student()
    {
        return view('memberaccount');
    }
    public function gymlist()
    {
        return view('gymlist');
    }
}
