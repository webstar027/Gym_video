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

	/**
     * add video page
     *
     * @param $gym_id
     * @return App\Video
     */
	public function addvideo($gym_id)
	{
		return view('addvideo', ['gym_id' => $gym_id]);
	}

	/**
     * post a video
     *
     * @param $video id
     * @return App\Video
     */
	public function createVideo(Request $request)
	{
		$this->videoservice->create($request);
		return redirect()->action('GymController@gymvideos', ['gym_id'=> $request->gym_id]);
	}

    /**
     * Get a video
     *
     * @param $video id
     * @return App\Video
     */
	public function watch($id)
	{
		$data = $this->videoservice->read($id);
		return view('watchvideo', $data);
	}
}
