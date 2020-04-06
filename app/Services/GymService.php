<?php

namespace App\Services;
 
use App\Gym;
use App\Gym_User;

use App\Repositories\UserRepository;
use App\Repositories\GymRepository;
use App\Repositories\PlaylistRepository;
use Illuminate\Http\Request;
use App\Requests\UpdateGymRequest;
use DateTime;
use DateInterval;

class GymService
{
	public function __construct(UserRepository $userRepo, GymRepository $gymRepo, PlaylistRepository $playlistRepo)
	{
		$this->userRepo = $userRepo ;
		$this->gymRepo = $gymRepo ;
		$this->playlistRepo = $playlistRepo;
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

    public function create(UpdateGymRequest $request)
	{
        $attributes = $request->all();

        return $this->gymRepo->create($attributes);
	}

	public function read($id)
	{
        return $this->gymRepo->find($id);
	}
 
	public function update(UpdateGymRequest $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->gymRepo->update($id, $attributes);
	}
 
	public function delete($id)
	{
      return $this->gymRepo->delete($id);
	}

	public function approveRequest($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->detach($user_id);
		$gym->members()->attach($user_id, ['status' => 1]);

		return $gym;
	}


	public function deniedRequest($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->detach($user_id);
		$gym->members()->attach($user_id, ['status' => 3]);

		return $gym;
	}

	public function accessRequest($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->attach($user_id, ['status' => 2]);
		return $gym;
	}

	public function cancelRequest($user_id, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$gym->members()->detach($user_id);

		return $gym;
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
		return $videos;
	}


	public function getPlaylist($id)
	{
		return $this->playlistRepo->find($id);
	}

	public function getAllGymWithDetail($user)
	{
        $all = $this->gymRepo->all();

        $sub_gyms = $user->gyms;

        $current = new DateTime();
        foreach($all as $key=> $gym)
        {
            $sub = $sub_gyms->find($gym->id);
            
            if ($sub)
            {
                $gym->status = $sub->pivot->status;
                if ($gym->status == 3)
                {
                    $last = $sub->pivot->updated_at->add(new DateInterval('P1D'));
                    $diff = $current->diff($last);
                    if ($diff->d < 1 && $diff->h < 24)
                    {
                        $gym->time = str_pad($diff->h, 2, '0', STR_PAD_LEFT).':'.str_pad($diff->i, 2, '0', STR_PAD_LEFT).':'.str_pad($diff->s, 2, '0', STR_PAD_LEFT).' wait time';
                    }
                    else
                    {
                        $this->cancelRequest($user->id, $gym->id);
                        $gym->status = 0;
                    }
                }
            }

            $gym->owner = $this->getGymOwner($gym->owner_id);
        }

		return $all;
	}
}