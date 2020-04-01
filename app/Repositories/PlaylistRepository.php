<?php

namespace App\Repositories;
 
use App\PlayList;
 
class PlaylistRepository
{
  
  protected $playlist;
 
  public function __construct(PlayList $playlist)
  {
    $this->playlist = $playlist;
  }
    public function create($attributes)
  {
    return $this->playlist->create($attributes);
  }
  
  public function all()
  {
    return $this->playlist->all();
  }
 
  public function find($id)
  {
    return $this->playlist->find($id);
  }
  
  public function update($id, array $attributes)
  {
    return $this->playlist->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
    return $this->playlist->find($id)->delete();
  }
}