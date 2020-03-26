<?php

namespace App\Services;
 
use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
 
class UserService
{
	public function __construct(UserRepository $user)
	{
		$this->user = $user ;
	}
 
	public function getGymSummary($id)
	{
		$u = $this->user->find($id);
		$gym = $u ->gyms->first();

        $members = $gym->members;
        $active = $members->where('status', 1)->get();
        $pending = $members->where('status', 2)->get();
        $videos = $gym->videos;

        $data = [
                "gym_id"=> $gym->id,
                "active_count"=> $active->count(),
				"pending_count"=> $pending->count(),
				"video_count" => $videos->count(),
                "active_members"=> $active,
                "pending_members"=> $pending,
                "videos"=> $videos
			];
			
		return $data;
	}

	public function index()
	{
		return $this->user->all();
	}
             
    public function create(Request $request)
	{
        $attributes = $request->all();

        return $this->user->create($attributes);
	}
	    
	public function read($id)
	{
        return $this->user->find($id);
	}
 
	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->user->update($id, $attributes);
	}
 
	public function delete($id)
	{
      return $this->user->delete($id);
	}
}