<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Services\VideoService;
use Alaouy\Youtube\Facades\Youtube;

class VideoController extends Controller
{
    //
    protected $videoservice;
 
	public function __construct(VideoService $videoservice)
	{
		$this->videoservice = $videoservice;
	}

    /**
     * Show add video page.
     *
	 * @param gym_id
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function addvideo($gym_id)
	{
		return view('addvideo', ['gym_id' => $gym_id]);
	}

    /**
     * Post video.
     *
	 * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function createVideo(Request $request)
	{	
		
		$video = $this->videoservice->create($request);
		$idd = $video ->gym_id;
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}

    /**
     * Show update video page.
     *
	 * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function update_video($id)
	{
		$video = $this->videoservice->read($id);
		return view('updatevideo', $video);
	}

    /**
     * Put update video.
     *
	 * @param integer
	 * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function updateVideo($id, Request $request)
	{
		$this->videoservice->update($request, $id);
		$idd = $this->videoservice->getGymId($id);
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}

    /**
     * Delete video.
     *
	 * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function deleteVideo($id)
	{	
		$idd = $this->videoservice->getGymId($id);
		$this->videoservice->delete($id);
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}

	/**
     * Favorite video.
     *
	 * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function favorite($id)
	{	
		$user = auth()->user();
		$ret = $this->videoservice->favorite($user, $id);
		return $ret;		
	}

    /**
     * Publish video.
     *
	 * @param integer
	 * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function publishVideo($id, Request $request)
	{
		$this->videoservice->publish($id);
		$idd = $this->videoservice->getGymId($id);
		return redirect('/account/gymowner/gym/myvideos/'.$idd);
	}

	/**
     * Get a video
     *
     * @param integer $video id
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function watchgym($id, Request $request)
	{
		$user = $request->user();
		$video = $this->videoservice->read($id);
		$video->favorite = $this->videoservice->hasFavorite($user->id, $id);
		$video->favorite_count = $video->favorites()->count();
		foreach($video->comments as $key=>$comment){
			$cuser = $comment->user;
			$comment->avatar = $this->videoservice->get_gravatar($cuser->email);
			foreach($comment->replies as $key => $reply){
				$ruser = $reply->user;
				$reply->avatar = $this->videoservice->get_gravatar($ruser->email);
			}
		}

		return view('watchvideogym', ['data' => $video]);
	}
	public function watch($id, Request $request)
	{
		$user = $request->user();
		$video = $this->videoservice->read($id);
		$video->favorite = $this->videoservice->hasFavorite($user->id, $id);
		$video->favorite_count = $video->favorites()->count();
		foreach($video->comments as $key=>$comment){
			$cuser = $comment->user;
			$comment->avatar = $this->videoservice->get_gravatar($cuser->email);
			foreach($comment->replies as $key => $reply){
				$ruser = $reply->user;
				$reply->avatar = $this->videoservice->get_gravatar($ruser->email);
			}
		}
		
		return view('watchvideo', ['data' => $video]);
	}
	
	/**
     * Get youtube video information
     *
     * @param integer $video id
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function getYoutube($id)
	{
		$video = Youtube::getVideoInfo($id);
		$video = json_decode(json_encode($video), true);
		//$data = ['title'=>$video->title];
		// print_r('<pre>');
		// print_r($video);
		// print_r('</pre>');
		$tag = "";
		if (array_key_exists("tags", $video['snippet']))
		{
			$tag = implode(',', $video['snippet']['tags']);
		}
		
		$data=['title'=>$video['snippet']['title'], 'description'=>$video['snippet']['description'], 'tag'=>$tag, 'thumbnail'=>$video['snippet']['thumbnails']['maxres']['url']];
		return $data;
	}

}
