<?php

namespace App\Http\Controllers;

use App\Notifications\RequestAccessNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Services\GymService;
use DateTime;
use DateInterval;
use Notification;

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
                        $this->gymservice->cancelRequest($user->id, $gym->id);
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
    public function requestAccess($gym_id, Request $request ){

        $user = $request->user();
        $this->gymservice->accessRequest($user->id, $gym_id);
        $gym = $this->gymservice->read($gym_id);
        $gymowner = $this->gymservice->getGymOwner($gym->owner_id);

        activity()
            ->performedOn($gym)
            ->causedBy($user)
            ->log('request_member');

        Notification::send($gymowner, new RequestAccessNotification($user));
        return redirect('/account/student/gyms/search');
    }

    public function updateGym($gym_id, Request $request){
        $user = $request->user();
        $this->gymservice->update($request, $gym_id);

        $gym = $this->gymservice->read($gym_id);
        activity()
            ->performedOn($gym)
            ->causedBy($user)
            ->log('update_gym');

		return redirect()->back()->with('successes', 'My Gym Details have been updated successfully!');
    }
    /**
     * Request to access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function requestCancel($gym_id, Request $request)
    {
        $user = $request->user();
        $gym = $this->gymservice->read($gym_id);
        $this->gymservice->cancelRequest($user->id, $gym_id);

        activity()
            ->performedOn($gym)
            ->causedBy($user)
            ->log('cancel_member');

        return redirect('/account/student/gyms/search');
    }
    /**
     * Deny to access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function requestDeny( $gym_id , $user_id)
    {
        $this->gymservice->deniedRequest($user_id, $gym_id);

        $gym = $this->gymservice->read($gym_id);
        $user = auth()->user();
        activity()
            ->performedOn($gym)
            ->causedBy($user)
            ->log('deny_member');

        return redirect('/account/gymowner');
    }
    /**
     * aprove to access to the gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function requestAprove( $gym_id, $user_id){
        
        $this->gymservice->approveRequest($user_id, $gym_id);
        
        $gym = $this->gymservice->read($gym_id);
        $user = auth()->user();
        activity()
            ->performedOn($gym)
            ->causedBy($user)
            ->log('approve_member');

        return redirect('/account/gymowner');
    }
    /**
     * Get videos of this gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */    
	public function gymVideos($gym_id)
	{
        $videos = $this->gymservice->read($gym_id)->videos;
        foreach($videos as $key => $video)
        {
            $p = $video->playlists;
            if ($p->count() > 0)
            {
                $video->playlist = $p->first();
            }
        }
        $count = $videos->where('status', 1)->count();
        return view('viewvideos', ['videos' => $videos, 'gym_id' => $gym_id, 'published_count'=>$count]);
    }
        
    /**
     * Get gym
     *
     * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */  
    public function gymView($gym_id, Request $request)
    {
        $user = $request->user();

        $page = $request->query('page');
        if (!$page)
        {
            $page = 1;
        }

        $ppage = $request->query('ppage');
        if (!$ppage)
        {
            $ppage = 1;
        }


        $sub = $user->approved_gyms()->find($gym_id);
        if ($sub)
        {
            $gym = $this->gymservice->read($gym_id);
            $videos_all = $this->gymservice->getVideosIncludeFavorite($gym_id, $user);
            $videos = $videos_all->where('status', 1);
            $video_count = $videos->count();
            $videos = $videos->forPage($page, 6);
            foreach($videos as $key => $video)
            {
                $p = $video->playlists;
                if ($p->count() > 0)
                {
                    $video->playlist = $p->first();
                }

                $video->favorite = $user->favorites->where('id', $video->id)->count() > 0;

            }
            $gym->videos = $videos;
        
            $gym->total_video = $video_count;
            $gym->currentpage = $page;

            $playlists = $gym->playlists;
            $nplaylists =  collect();
            foreach($playlists as $playlist)
            {
                if ($playlist->videos->count() > 0)
                {
                    $playlist->thumbnail = $playlist->videos->first()->video_url;
                    $nplaylists->push($playlist);
                }
            }
            $gym->playlists = $nplaylists->forPage($ppage, 6);
            $gym->playlists_total = $nplaylists->count();
            $gym->playlists_current = $ppage;

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
