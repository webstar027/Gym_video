<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Favorite extends Model
{
    use LogsActivity;
    protected static $logAttributes = ['id','user_id','video_id'];
}
