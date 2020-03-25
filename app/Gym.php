<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    //
    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function owner()
    {
        return $this->belongTo('App\User', 'foreign_key', 'owner_id');
    }

    public function members()
    {
        return $this->belongToMany('App\User', 'gym_user', 'gym_id', 'user_id') ->withPivot('status')->withTimestamps();
    }
}
