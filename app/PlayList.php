<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    //
        /**
     * Get the gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gym()
    {
        return $this->belongsTo('App\Gym');
    }
    
    /**
     * Get the gyms subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function videos()
    {
        return $this->belongsToMany('App\Video')->withTimestamps();
    }
}
