<?php

namespace App\Services;
 
use App\Video;
use App\Playlist;
use App\Repositories\VideoRepository;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\PublishedVideoNotification;

class VideoService
{
	public function __construct(VideoRepository $video)
	{
		$this->video = $video ;
	}
 
	public function index()
	{
		return $this->video->all();
	}
             
    public function create(Request $request)
	{
		$attributes = $request->all();
		$video = $this->video->create($attributes);
		if($video != null && array_key_exists('status', $attributes) && $attributes['status'] == 1)
		{
			$this->publish_notify($video->id);
		}
        return $video;
	}
	    
	public function read($id)
	{
        return $this->video->find($id);
	}
 
	public function update(Request $request, $id)
	{
		$attributes = $request->all();
		$oldvideo = $this->video->find($id);
		$video = $this->video->update($id, $attributes);
		if($video != null && $oldvideo->status != 1 && $video->status == 1)
		{
			$this->publish_notify($id);
		}
		return $video;
	}
 
	public function getGymId($id)
	{
		return $video = $this->video->find($id)->gym_id;
	}
	
	public function getPlaylist($video_id, $name){

		$video = $this->read($video_id);
		$gym = $video->Gym;
		if ($name == null || $name == "")
		{
			if ($video->playlists->count() > 0)
			{
				$old = $video->playlists->first();
				{
					$video->playlists()->detach($old->id);
				}
			}

			return;
		}
		
		$gym_playlists = $gym->playlists->where('name', $name);
		if ($gym_playlists->count() > 0)
		{
			$gym_playlist = $gym_playlists->first();
		}
		else
		{
			$gym_playlist = new Playlist;
			$gym_playlist->gym_id = $gym->id;
			$gym_playlist->name = $name;
			$gym_playlist->save();
		}

		if ($video->playlists->count() > 0)
        {
            $old = $video->playlists->first();
            if ($old->name != $name)
            {
				$video->playlists()->detach($old->id);
				$video->playlists()->attach($gym_playlist->id);
			}
        }
		else{
			$video->playlists()->attach($gym_playlist->id);
		}
	}


	public function WithPlaylist($video)
	{
		$p = $video->playlists;
		if ($p->count() > 0)
		{
			$video->playlist = $p->first()->name;
		}
		else
		{
			$video->playlist = "";
		}
		return $video;
	}

	public function publish($id)
	{
		$this->publish_notify($id);
		return $this->video->publish($id);
	}
	
	public function publish_notify($video_id){
		$video = $this->video->find($video_id);
		$gym = $video->Gym;

		$active_users = $gym->activeMembers;

		foreach($active_users as $key=> $member)
		{
			Notification::send($member, new PublishedVideoNotification($gym, $video_id));
		}
	}

	public function delete($id)
	{
      return $this->video->delete($id);
	}

	public function favorite($user, $id)
	{
		if($this->hasFavorite($user->id, $id))
		{
			$this->video->find($id)->favorites()->detach($user->id);
			return 0;
		}
		else
		{
			$this->video->find($id)->favorites()->attach($user->id);
			return 1;
		}
	}

	public function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}
	
	public function hasFavorite($user_id, $video_id)
	{
		return $this->video->find($video_id)->favorites()->where('user_id', $user_id)->count() > 0;
	}
}