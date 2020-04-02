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
}
