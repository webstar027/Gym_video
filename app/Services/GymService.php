<?php

namespace App\Services;
 
use App\Gym;
use App\Repositories\gymRepository;
use Illuminate\Http\Request;
 
class GymService
{
	public function __construct(GymRepository $gym)
	{
		$this->gym = $gym ;
	}
 
	public function index()
	{
		return $this->gym->all();
	}
			 


    public function create(Request $request)
	{
        $attributes = $request->all();

        return $this->gym->create($attributes);
	}
	    
	public function read($id)
	{
        return $this->gym->find($id);
	}
 
	public function update(Request $request, $id)
	{
	  $attributes = $request->all();
	  
      return $this->gym->update($id, $attributes);
	}
 
	public function delete($id)
	{
      return $this->gym->delete($id);
	}
}