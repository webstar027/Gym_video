<?php

namespace App\Repositories;
 
use App\Gym;
 
class GymRepository
{
  protected $gym;
 
  public function __construct(Gym $gym)
  {
    $this->gym = $gym;
  }
    
  public function create($attributes)
  {
    return $this->gym->create($attributes);
  }

  public function getGymByOwner($id)
	{
		return $this->gym->all()->where('owner_id', $id)->first();
  }
  
  public function all()
  {
    return $this->gym->all();
  }
 
  public function find($id)
  {
    return $this->gym->find($id);
  }
  
  public function update($id, array $attributes)
  {
    return $this->gym->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
    return $this->gym->find($id)->delete();
  }
}