<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    protected $fillable = [
        'owner_id', 'gym_name', 'gym_address_1', 'gym_address_2', 'city', 'state_province', 'country', 'website', 'zip_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'owner_id'
    ];

    /**
     * Get the videos belong to this gym.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    /**
     * Get the owner of this gym.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'owner_id');
    }

    /**
     * Get the members that have requests.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function members()
    {
        return $this->belongsToMany('App\User', 'gym_user', 'gym_id', 'user_id')->withPivot('status');
    }

    /**
     * Get the members that approved by gym owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function activeMembers()
    {
        return $this->belongsToMany('App\User', 'gym_user', 'gym_id', 'user_id')->wherePivot('status', 1);
    }

    
    /**
     * Get the members that have pending status.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function pendingMembers()
    {
        return $this->belongsToMany('App\User', 'gym_user', 'gym_id', 'user_id')->wherePivot('status', 2);
    }
}