<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Factor_State extends Model
{
    public $table= 'factor_state';

    public function Factor()
    {
        return $this->hasMany('App\Model\Factor','id','factorstate_id');
    }
}
