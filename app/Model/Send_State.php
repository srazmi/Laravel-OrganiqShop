<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Send_State extends Model
{
    public $table= 'send_state';

    public function Factor()
    {
        return $this->hasMany('App\Models\Factor','id','sendstate_id');
    }
}
