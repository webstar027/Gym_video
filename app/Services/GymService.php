<?php

namespace App\Services;
 
use App\Gym;
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
}