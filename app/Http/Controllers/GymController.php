<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GymService;


class GymController extends Controller
{
    protected $gymservice;

     /**
     * constructor
     *
     * @param GymService $gymservice
     */
	public function __construct(GymService $gymservice)
	{
        $this->gymservice = $gymservice;
    }

    /**
     * add gym
     *
     * @param 
     * @return 
     */
    public function addgym()
    {
        return view('addgym');
    }

    /**
     * Get videos of this gym
     *
     * @param 
     * @return 
     */    
	public function gymvideos($gym_id)
	{
        $videos = $this->gymservice->read($gym_id)->videos;
        return view('viewvideos', $videos);
	}
}
