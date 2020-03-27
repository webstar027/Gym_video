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
}