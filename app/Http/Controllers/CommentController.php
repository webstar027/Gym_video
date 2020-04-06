<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Services\VideoService;
use App\Repositories\UserRepository;

class CommentController extends Controller
{
    protected $videoservice;
    protected $userRepo;
    public function __construct(VideoService $videoservice, UserRepository $userRepo)
	{
        $this->videoservice = $videoservice;
        $this->userRepo = $userRepo ;
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $user = auth()->user();
        $input['user_id'] = $user->id;
    
        $comment = Comment::create($input);
        $user = $this -> userRepo -> find($comment->user_id);
        $comment -> user_avatar = $this->videoservice->getGravatar($user->email);
        $comment -> first_name = $user->first_name;
        $comment -> last_name = $user->last_name;
        $comment -> diff = $comment->created_at->diffForHumans();

        $video = $this->videoservice->read($comment->video_id);
        
		activity()
			->performedOn($video)
			->causedBy($user)
			->log('comment_video');


        return $comment;
    }
    
}
