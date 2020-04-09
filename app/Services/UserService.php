<?php

namespace App\Services;
 
use App\User;
use App\Gym;
use App\Video;
use App\Repositories\UserRepository;
use App\Repositories\GymRepository;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class UserService
{

	public function __construct(UserRepository $userRepo, GymRepository $gymRepo, ActivityRepository $activityRepo)
	{
		$this->userRepo = $userRepo ;
		$this->gymRepo = $gymRepo ;
		$this->activityRepo = $activityRepo;
	}
 
	public function getGymSummary($id)
	{
		$u = $this->userRepo->find($id);
		
		$gym = $this->gymRepo->getGymByOwner($id);
		$owner = $gym->owner;
		$members = $gym->members;
		$active = $gym->activeMembers->sortBy('first_name');
		$pending = $gym->pendingMembers->sortBy('first_name');
        $videos = $gym->videos;

        $data = [
				"gym_id" => $gym->id,
				'gym' => $gym,
				'user'=> $u,
                "active_count" => $active->count(),
				"pending_count" => $pending->count(),
				"video_count" => $videos->count(),
                "active_members" => $active,
                "pending_members" => $pending,
                "videos" => $videos
			];
			
		return $data;
	}

	public function getGymOwner($gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$owner = $this->userRepo->find($gym->owner_id);
		return $owner;
	}

	public function getMembers($id)
	{
		$u = $this->userRepo->find($id);
		return $u->gyms;
	}

	public function isGymMember($user, $gym_id)
	{
		$gym = $this->gymRepo->find($gym_id);
		$members = $gym->members->where('id', $user->id);
		return $members->count();
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
	  $newPassword = $request->get('password');

        if(empty($newPassword)){
			$attributes = $request->except('password');
			return $this->userRepo->update($id, $attributes);
        }else{
			$attributes = $request->all();
			$attributes['password'] =  Hash::make($request->input('password'));
			return $this->userRepo->update($id, $attributes);
        } 
     
	}
 
	public function delete($id)
	{
      return $this->userRepo->delete($id);
	}

	public function getActivities()
	{
		return $this->activityRepo->all()->sortByDesc("created_at");
	}

	public function getGymActivities($gym_id, $user_id)
	{
		$activities = $this->activityRepo->all()->sortByDesc("created_at");

        $nactivites = collect();
        foreach($activities as $key =>$activity)
        {
            $causer = $activity->causer;
            $subject = $activity->subject;

			if ($causer == null || $subject == null) continue;
            if ($causer && $causer->id == $user_id)
            {
                $nactivites->push($activity); 
            }
            else
            {
                if ($this->isGymMember($causer, $gym_id)){
                    if ($subject instanceof Video && $subject->gym->id == $gym_id)
                    {
                        $nactivites->push($activity); 
                    }
                    else if ($subject instanceof Gym && $subject->id == $gym_id)
                    {
                        $nactivites->push($activity); 
                    }
                }
               
            }
		}
		
		return $nactivites;
	}

	public function getApprovedMembers($user)
	{
		$members = $user->approved_gyms;
        foreach($members as $key => $member)
        {
			$o = $this->read($member->owner_id);
			$member->posted_at = $member->updated_at;
			if ($member->videos != null &&  $member->videos->count() > 0)
			{
				$lastvideo = $member->videos->sortByDesc("updated_at")->first();
				$member->posted_at = $lastvideo->updated_at;
			}

            $member->owner = $o;
		}
		
		return $members;
	}
}