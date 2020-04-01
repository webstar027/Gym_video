<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Video extends Model
{
    /**
     * Get the gyms subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    protected $fillable = [
        'gym_id','video_url','video_title', 'description','tag', 'status',
    ];

    public function Gym()
    {
        return $this->belongsTo('App\Gym');
    }

    
    /**
     * Get the favorate subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'video_id', 'user_id')->withTimestamps();
    }

       
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->orderBy('created_at','desc');
    }
}
