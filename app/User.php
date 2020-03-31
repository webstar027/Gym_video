<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username', 'email','role_id', 'password',
    ];
    //email notification
    public function routeNotificationForMail($notification)
    {
      return $this->email_address;
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role of user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function role()
    {
        return $this->hasOne('App\role');
    }

    /**
     * Get the gyms subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function gyms()
    {
        return $this->belongsToMany('App\Gym')->withPivot("status")->withTimestamps();
    }

    /**
     * Get the approved gyms subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function approved_gyms()
    {
        return $this->belongsToMany('App\Gym')->withPivot("status")->withTimestamps()->wherePivot('status', 1);;
    }

    /**
     * Get the favorate subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function favorites()
    {
        return $this->belongsToMany(Video::class, 'favorites')->withTimestamps();
    }

}
