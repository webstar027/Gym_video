<?php

namespace App;

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
}
