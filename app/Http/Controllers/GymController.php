<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        //$current = $current->sub(new DateInterval('P1D'));
        foreach($all as $key=> $gym)
        {
            $sub = $sub_gyms->find($gym->id);
            
            if ($sub)
            {
                $gym->status = $sub->pivot->status;
                if ($gym->status == 3)
                {
                    $last = $sub->pivot->updated_at->add(new DateInterval('P1D'));
                    $diff = $current->diff($last);
                    if ($diff->d < 1 && $diff->h < 24)
                    {
                        $gym->time = str_pad($diff->h, 2, '0', STR_PAD_LEFT).':'.str_pad($diff->i, 2, '0', STR_PAD_LEFT).':'.str_pad($diff->s, 2, '0', STR_PAD_LEFT).' wait time';
                    }
                    else
                    {
                        $this->gymservice->cancel_request($user->id, $gym->id);
                        $gym->status = 0;
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
        return redirect('/account/student/gyms/search');
    }

    public function updategym($gym_id, Request $request){
        $user = $request->user();
        $this->gymservice->update($request, $gym_id);
		return redirect()->back()->with('successes', 'My Gym Details have been updated successfully!');
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
        return redirect('/account/student/gyms/search');
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
        $count = $videos->where('status', 1)->count();
        return view('viewvideos', ['videos' => $videos, 'gym_id' => $gym_id, 'published_count'=>$count]);
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

        $page = $request->query('page');
        if (!$page)
        {
            $page = 1;
        }

        $sub = $user->approved_gyms()->find($gym_id);
        if ($sub)
        {
            $gym = $this->gymservice->read($gym_id);
            $videos_all = $this->gymservice->getVideosIncludeFavorite($gym_id, $user);
            $videos = $videos_all->where('status', 1);
            $video_count = $videos->count();
            $videos = $videos->forPage($page, 6);
            $gym->videos = $videos;
            $gym->total_video = $video_count;
            $gym->currentpage = $page;
            return view('viewgym',['data' => $gym]);
        }
        else
        {
            return redirect('/admin');
        }
        
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
