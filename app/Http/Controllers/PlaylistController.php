<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\Services\GymService;

class PlaylistController extends Controller
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
     * Get playlists of gym
     *
	 * @param integer 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function autoComplete($gym_id)
    {
        $playlists = $this->gymservice->read($gym_id)->playlists;
        return response()->json($playlists);
    }

    /**
     * Get videos of playlist
     *
	 * @param integer 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function videos($id, Request $request)
    {
        $playlist = $this->gymservice->getPlaylist($id);

        return view('gymplaylistview', ['videos'=>$playlist->videos, 'playlist_name'=>$playlist->name]);
    }
    
    /**
     * Get videos of playlist
     *
	 * @param integer 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function approvedVideos($id, Request $request)
    {
        $user = $request->user();

        $page = $request->query('page');
        if (!$page)
        {
            $page = 1;
        }
        $playlist = $this->gymservice->getPlaylist($id);
        $videos =  $playlist->videos->where('status', 1);
        $gym = $playlist->gym;
        $total_video = $playlist->videos->count();
        $videos = $videos->forPage($page, 6);
        $currentpage = $page;
        return view('studentplaylistview', ['videos'=>$videos,'total_video'=>$total_video, 'currentpage'=>$currentpage, 'playlist_name'=>$playlist->name, 'playlist_id'=>$playlist->id, 'gym'=>$gym]);
    }
}
