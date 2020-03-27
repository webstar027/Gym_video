<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GymController extends Controller
{
   
    public function addgym($id)
    {
        return view('addgym');
    }
}
