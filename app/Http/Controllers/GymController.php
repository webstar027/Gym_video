<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymController extends Controller
{
   
    public function addgym()
    {
        return view('addgym');
    }
    
	public function gymvideos($gym_id)
	{
        return view('viewvideos');
        
	}
}
