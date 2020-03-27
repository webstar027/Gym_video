<?php

namespace App\Services;
 
use App\User;
use App\Repositories\UserRepository;
use App\Repositories\GymRepository;
use Illuminate\Http\Request;
 
class UserService
{

	public function __construct(UserRepository $userRepo, GymRepository $gymRepo)
	{
		$this->userRepo = $userRepo ;
		$this->gymRepo = $gymRepo ;
	}
 
	public function getGymSummary($id)
	{
		$u = $this->userRepo->find($id);
		
		$gym = $this->gymRepo->getGymByOwner($id);
		$owner = $gym->owner;
		$members = $gym->members;
		$active = $gym->activeMembers;
		$pending = $gym->pendingMembers;
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

	public function getMembers($id)
	{
		$u = $this->userRepo->find($id);
		return $u->gyms;
	}

	public function index()
	{
		return $this->userRepo->all();
	}
             
    public function create(Request $request)
	{
        $attributes = $request->all();

        return $this->userRepo->create($attributes);
	}
	public function read($id)
	{
        return $this->userRepo->find($id);
	}
 
	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->userRepo->update($id, $attributes);
	}
 
	public function delete($id)
	{
      return $this->userRepo->delete($id);
	}
}