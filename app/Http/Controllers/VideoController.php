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
		
		$video = $this->videoservice->create($request);
		$idd = $video ->gym_id;
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}
	/**
     * update video page
     *
     * @param $gym_id, $id
     * @return App\Video
     */
	public function update_video($id)
	{
		$video = $this->videoservice->read($id);
		return view('updatevideo', $video);
	}

	public function updateVideo($id, Request $request)
	{
		$this->videoservice->update($request, $id);
		$idd = $this->videoservice->getGymId($id);
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}

	public function deleteVideo($id)
	{	
		$idd = $this->videoservice->getGymId($id);
		$this->videoservice->delete($id);
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}

	public function publishVideo($id, Request $request)
	{
		$this->videoservice->publish($id);
		$idd = $this->videoservice->getGymId($id);
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
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
