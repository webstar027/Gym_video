<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Services\VideoService;
use App\Requests\CommentRequest;

class CommentController extends Controller
{
    protected $videoservice;

    public function __construct(VideoService $videoservice)
	{
        $this->videoservice = $videoservice;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
  
        $input = $request->all();
        $user = auth()->user();
        $input['user_id'] = $user->id;
    
        $comment = $this->videoservice->createComment($request);
        $video = $this->videoservice->read($comment->video_id);
        
		activity()
			->performedOn($video)
			->causedBy($user)
			->log('comment_video');

        return $comment;
    }
    
}
