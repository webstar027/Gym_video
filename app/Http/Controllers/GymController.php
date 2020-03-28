<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\GymService;
use DateTime;
use DateInterval;

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

        $current = new DateTime();
        $current = $current->sub(new DateInterval('P1D'));
        foreach($all as $key=> $gym)
        {
            $sub = $sub_gyms->find($gym->id);
            
            if ($sub)
            {
                $gym->status = $sub->pivot->status;
                if ($gym->status == 3)
                {
                    $diff = $current->diff($sub->pivot->updated_at);
                    if ($diff->h < 24)
                    {
                        $gym->time = str_pad($diff->h, 2, '0', STR_PAD_LEFT).':'.str_pad($diff->i, 2, '0', STR_PAD_LEFT).':'.str_pad($diff->s, 2, '0', STR_PAD_LEFT).' wait time';
                    }
                    else
                    {
                        $this->gymservice->cancel_request($user->id, $gym->id);
                    }
                }
            }

            $gym->owner = $this->gymservice->getGymOwner($gym->owner_id);
        }

        return view('addgym', ['allgyms'=>$all]);
    }
    
    /**
     * Request to cancel the access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function request_access($gym_id, Request $request ){

        $user = $request->user();
        $this->gymservice->access_request($user->id, $gym_id);
        return redirect('/account/student');
    }

    /**
     * Request to access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function request_cancel($gym_id, Request $request)
    {
        $user = $request->user();
        $this->gymservice->cancel_request($user->id, $gym_id);
        return redirect('/account/student');
    }
    /**
     * Deny to access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function request_deny( $gym_id , $user_id)
    {
        $this->gymservice->denied_request($user_id, $gym_id);
        return redirect('/account/gymowner');
        
    }
    /**
     * aprove to access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function request_aprove( $gym_id, $user_id){
        
        $this->gymservice->approve_request($user_id, $gym_id);
        return redirect('/account/gymowner');
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
        
    /**
     * Get gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function gymview($gym_id, Request $request)
    {
        $user = $request->user();
        $gym = $this->gymservice->read($gym_id);
        $videos_all = $this->gymservice->getVideosIncludeFavorite($gym_id, $user);
        $videos = $videos_all->where('status', 1);
        $gym->videos = $videos;
        
        return view('viewgym',['data' => $gym]);
    }

    	
	/**
     * Get video list of gym
     *
     * @param integer $video id
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function videos($gym_id, Request $request)
	{
		$user = $request->user();
        $videos = $this->gymservice->getVideosIncludeFavorite($gym_id, $user);
        return view();
	}
}
