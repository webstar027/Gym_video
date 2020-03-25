<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    //   
    public function Gym()
    {
        return $this->belongTo('App\Gym');
    }
}
