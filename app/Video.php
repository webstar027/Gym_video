<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get the gyms subscribed to this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function Gym()
    {
        return $this->belongsTo('App\Gym');
    }
}
