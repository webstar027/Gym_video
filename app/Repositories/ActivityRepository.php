<?php

namespace App\Repositories;
 
use App\Activity;
 
class ActivityRepository
{
  protected $activity;
 
  public function __construct(Activity $activity)
  {
    $this->activity = $activity;
  }
    
  public function create($attributes)
  {
    return $this->activity->create($attributes);
  }

  public function all()
  {
    return $this->activity->all();
  }
 
  public function find($id)
  {
    return $this->activity->find($id);
  }
  
  public function update($id, array $attributes)
  {
    return $this->activity->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
    return $this->activity->find($id)->delete();
  }
}