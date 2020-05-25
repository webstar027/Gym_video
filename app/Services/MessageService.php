<?php

namespace App\Services;
 
use App\Gym;
use App\Gym_User;
use App\Message;

use App\Repositories\UserRepository;
use App\Repositories\GymRepository;
use App\Repositories\PlaylistRepository;
use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use App\Requests\UpdateGymRequest;
use DateTime;
use DateInterval;

class MessageService
{   
    protected $userRepo;
    protected $gymRepo;
    protected $msgRepo;

    public function __construct(UserRepository $userRepo, GymRepository $gymRepo, MessageRepository $msgRepo)
	{
		$this->userRepo = $userRepo ;
		$this->gymRepo = $gymRepo ;
		$this->msgRepo = $msgRepo;
    }
    
    public function search_user($userId, $key){

        $users = $this->msgRepo->search_user($userId, $key);
        
        return $users;

    }
}