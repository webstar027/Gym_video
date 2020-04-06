<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Services\VideoService;
use Alaouy\Youtube\Facades\Youtube;
use App\Requests\VideoRequest;

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
	public function addVideo($gym_id)
	{
		return view('addvideo', ['gym_id' => $gym_id]);
	}

    /**
     * Post video.
     *
	 * @param App\Requests\VideoRequest
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function createVideo(VideoRequest $request)
	{	
		$video = $this->videoservice->create($request);

		$attributes = $request->all();
		if (array_key_exists('playlist', $attributes) && $attributes['playlist'])
		{
			$playlist = $this->videoservice->getPlaylist($video->id, $attributes['playlist']);
			$id = $playlist->id;
			$video->playlists()->attach($playlist->id);
		}

		$user = $request->user;
		activity()
			->performedOn($video)
			->causedBy($user)
			->log('create_video');

		return redirect('/account/gymowner/gym/myvideos/'.$video->gym_id);
	}

    /**
     * Show update video page.
     *
	 * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function updateVideo($id)
	{
		$video = $this->videoservice->read($id);
		if ($video->playlists->count() > 0){
            $video->playlist = $video->playlists->first();
            $video->playlist_name = $video->playlists->first()->name;
        }
        else{
            $video->playlist_name = "";
        }
		return view('updatevideo', $video);
	}

    /**
     * Put update video.
     *
	 * @param integer
	 * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function updateVideoPost($id, VideoRequest $request)
	{
		$this->videoservice->update($request, $id);
		$video = $this->videoservice->read($id);

		$attributes = $request->all();
	
		$this->videoservice->getPlaylist($id, $attributes['playlist']);
	
		$user = $request->user;
		activity()
			->performedOn($video)
			->causedBy($user)
			->log('update_video');


		return redirect('/account/gymowner/gym/myvideos/'.$video->gym_id);
	}

    /**
     * Delete video.
     *
	 * @param integer
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function deleteVideo($id, Request $request)
	{	
		$video = $this->videoservice->read($id);
		$this->videoservice->delete($id);
		$user = $request->user;

		activity()
			->performedOn($video)
			->causedBy($user)
			->log('delete_video');

		return redirect('/account/gymowner/gym/myvideos/'.$video->gym_id);
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
		$video = $this->videoservice->read($id);

		activity()
			->performedOn($video)
			->causedBy($user)
			->withProperties(['isFavorite' => $ret])
			->log('favorite_video');

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
		$video = $this->videoservice->publish($id);
		$user = $request->user;

		activity()
			->performedOn($video)
			->causedBy($user)
			->log('publish_video');

		return redirect('/account/gymowner/gym/myvideos/'.$video->gym_id);
	}

	/**
     * Get a video
     *
     * @param integer $video id
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function watchGym($id, Request $request)
	{
		$user = $request->user();
		$video = $this->videoservice->getVideoDetail($id, $user);

		activity()
			->performedOn($video)
			->causedBy($user)
			->log('watch_video');

		return view('watchvideogym', ['data' => $video]);
	}

	/**
     * watch a video
     *
     * @param integer $video id
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function watch($id, Request $request)
	{
		$user = $request->user();
		$video = $this->videoservice->getVideoDetail($id, $user);
		
		activity()
			->performedOn($video)
			->causedBy($user)
			->log('watch_video');

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

		$tag = "";
		if (array_key_exists("tags", $video['snippet']))
		{
			$tag = implode(',', $video['snippet']['tags']);
		}
		
		$data=['title'=>$video['snippet']['title'], 'description'=>$video['snippet']['description'], 'tag'=>$tag, 'thumbnail'=>$video['snippet']['thumbnails']['maxres']['url']];
		return $data;
	}

}
