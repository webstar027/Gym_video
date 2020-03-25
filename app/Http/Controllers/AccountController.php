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
    //
    public function Index()
    {
        return view();
    }

    public function Gymowner()
    {
        return view();
    }

    public function Student()
    {
        return view();
    }
}
