<?php

namespace App\Services;
 
use App\Gym;
use App\Gym_User;

use App\Repositories\UserRepository;
use App\Repositories\GymRepository;
use Illuminate\Http\Request;
 
class GymService
{
	public function __construct(UserRepository $userRepo, GymRepository $gymRepo)
	{
		$this->userRepo = $userRepo ;
		$this->gymRepo = $gymRepo ;
	}
 
	public function index()
	{
		return $this->gymRepo->all();
	}
			 
	public function getGymOwner($owner_id)
	{
		$owner = $this->userRepo->find($owner_id);
		return $owner;
	}

    public function create(Request $request)
	{
        $attributes = $request->all();

        return $this->gymRepo->create($attributes);
	}
	    
	public function read($id)
	{
        return $this->gymRepo->find($id);
	}
 
	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->gymRepo->update($id, $attributes);
	}
 
	public function delete($id)
	{
      return $this->gymRepo->delete($id);
	}

	public function approve_request($user_id, $gym_id)
	{
<<<<<<< HEAD
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->detach($user_id);
		$gym->members()->attach($user_id, ['status' => 1]);
=======
<<<<<<< HEAD
		$guser = Gym_User::where('user_id', $user_id)->where('gym_id', $gym_id)->update('status', 1);
=======
		$guser = Gym_User::where('user_id', $user_id)->where('gym_id', $gym_id);
		$guser->status = 1;
		$guser->save();

>>>>>>> 990eba93eb7cd6da5826027129ddb5caca227e2b
>>>>>>> 90056a4e3177cb4993a369a5cd06fe2ec84c14c8
	}

	public function denied_request($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->detach($user_id);
		$gym->members()->attach($user_id, ['status' => 3]);
	}

	public function access_request($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->attach($user_id, ['status' => 2]);
	}

	public function cancel_request($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->detach($user_id);
	}

	public function getVideosIncludeFavorite($gym_id, $user)
	{
		$favorite = $user->favorites();
		$videos = $this->read($gym_id)->videos;

		foreach($videos as $key => $video)
		{
			$video->favorite_count = $video->favorites()->count();
			if ($favorite->where('video_id', $video->id)->count() > 0)
			{
				$video->favorite = true;
			}
			else
			{
				$video->favorite = false;
			}
		}
	}
}