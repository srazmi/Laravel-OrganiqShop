<?php

namespace Berkayoztunc\LaravelProfile\Model;

use Illuminate\Database\Eloquent\Model;

class UserActivitys extends Model
{
    protected $table = 'user_activitys';

    public $timestamps = true;

    protected $fillable = [
        'ip','action','user_id','record_name'
    ];
}
