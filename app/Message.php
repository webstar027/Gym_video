<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    // Sender
    public function sender(){
        return $this->belongsTo("App\User", "sender");
    }

    // Receiver
    public function receiver(){
        return $this->belongTo("App\User", "receiver");
    }

}
