<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Validator;
use App\Gym;
use App\Services\GymService;
=======
>>>>>>> 6450c17befb244b0aef8f674bc53977e28862db7

class GymController extends Controller
{
    //
    protected $gymservice;
 
	public function __construct(GymService $gymservice)
	{
		$this->gymservice = $gymservice;
	}
    
}
