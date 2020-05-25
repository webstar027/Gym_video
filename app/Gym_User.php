<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym_User extends Model
{
    //
    protected $table = "gym_user";

    public function users(){
        return  $this->belongsTo("App\User", "user_id", "id");
    }
}
