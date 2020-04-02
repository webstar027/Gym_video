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

    //
    public function autocomplete($gym_id, Request $request)
    {
        $playlists = $this->gymservice->read($gym_id)->playlists;
        return response()->json($playlists);
    }

    public function videos($id, Request $request)
    {
        $playlist = $this->gymservice->getPlaylist($id);

        return $playlist->videos;
    }

    public function approved_videos($id)
    {
        $playlist = $this->gymservice->getPlaylist($id);

        return $playlist->vidoes->where('status', 1);
    }
}
