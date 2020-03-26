<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'owner_id','gym_name','gym_address_1', 'gym_address_2','city', 'state_province','country','website','zip_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'owner_id', 'remember_token',
    ];

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'owner_id');
    }
    public function members()
    {
        return $this->belongsToMany('App\User', 'gym_user', 'gym_id', 'user_id')->withPivot('status');
    }
    public function activeMembers()
    {
        return $this->belongsToMany('App\User', 'gym_user', 'gym_id', 'user_id')->wherePivot('status', 1);
    }
    public function pendingMembers()
    {
        return $this->belongsToMany('App\User', 'gym_user', 'gym_id', 'user_id')->wherePivot('status', 2);
    }
}
