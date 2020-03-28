<?php

namespace App\Services;
 
use App\Video;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
 
class VideoService
{
	public function __construct(VideoRepository $video)
	{
		$this->video = $video ;
	}
 
	public function index()
	{
		return $this->video->all();
	}
             
    public function create(Request $request)
	{
        $attributes = $request->all();

        return $this->video->create($attributes);
	}
	    
	public function read($id)
	{
        return $this->video->find($id);
	}
 
	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->video->update($id, $attributes);
	}
 
	public function getGymId($id)
	{
		return $video = $this->video->find($id)->gym_id;
	}
	
	public function publish($id)
	{
		return $this->video->publish($id);
	}
	
	public function delete($id)
	{
      return $this->video->delete($id);
	}

	public function favorite($user, $id)
	{
		if($this->hasFavorite($user->id, $id))
		{
			$this->video->find($id)->detach($user->id);
			return false;
		}
		else
		{
			$this->video->find($id)->attach($user->id);
			return true;
		}
	}

	public function hasFavorite($user_id, $video_id)
	{
		return $this->video->find($video_id)->favorites()->where('user_id', $user_id)->count() > 0;
	}
}