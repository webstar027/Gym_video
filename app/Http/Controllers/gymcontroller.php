<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Gym;
use App\Services\GymService;

class GymController extends Controller
{
    //
    protected $gymservice;
 
	public function __construct(GymService $gymservice)
	{
		$this->gymservice = $gymservice;
	}
    
}
