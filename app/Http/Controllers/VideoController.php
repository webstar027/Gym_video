<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Services\VideoService;

class VideoController extends Controller
{
    //
    protected $videoservice;
 
	public function __construct(VideoService $videoservice)
	{
		$this->videoservice = $videoservice;
	}
	public function gymvideos($gymid)
	{
		return view('viewvideos');
	}
	public function addvideo($id)
	{
		return view('addvideo');
	}
	public function watch($id)
	{
		return view('watchvideo');
	}
}
