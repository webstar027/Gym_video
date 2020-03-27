<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    
    public function Gym()
    {
        return $this->belongTo('App\Gym');
    }
}
