<?php

namespace App\Repositories;
 
use App\Video;
 
class VideoRepository
{
  
  protected $video;
 
  public function __construct(Video $video)
  {
    $this->video = $video;
  }
    public function create($attributes)
  {
    return $this->video->create($attributes);
  }
  
  public function all()
  {
    return $this->video->all();
  }
 
  public function find($id)
  {
    return $this->video->find($id);
  }
  
  public function update($id, array $attributes)
  {
    return $this->video->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
    return $this->video->find($id)->delete();
  }
}