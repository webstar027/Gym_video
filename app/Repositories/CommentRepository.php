<?php

namespace App\Repositories;
 
use App\Comment;
 
class CommentRepository
{
  protected $comment;
 
  public function __construct(Comment $comment)
  {
    $this->comment = $comment;
  }
    
  public function create($attributes)
  {
    return $this->comment->create($attributes);
  }

  public function all()
  {
    return $this->comment->all();
  }
 
  public function find($id)
  {
    return $this->comment->find($id);
  }
  
  public function update($id, array $attributes)
  {
    return $this->comment->find($id)->update($attributes);
  }
 
  public function delete($id)
  {
    return $this->comment->find($id)->delete();
  }
}