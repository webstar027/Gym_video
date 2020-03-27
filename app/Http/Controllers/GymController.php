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
     * Post video.
     *
	 * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $user = $request->user();
        $all = $this->gymservice->index();

        $sub_gyms = $user->gyms;

        foreach($all as $key=> $gym)
        {
            $sub = $sub_gyms.where('gym_id', $gym->id);
            
            if ($sub)
            {
                $gym->status = $sub->pivot->status;
                $gym->time = $sub->pivot->updated_at;
            }

            $gym->owner = $this->gymservice->getGymOwner($gym->owner_id);
        }

        return view('addgym', ['allgyms'=>$gyms]);
    }

    /**
     * Get videos of this gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */    
	public function gymvideos($gym_id)
	{
        $videos = $this->gymservice->read($gym_id)->videos;
        return view('viewvideos', ['videos' => $videos, 'gym_id' => $gym_id]);
	}
}
