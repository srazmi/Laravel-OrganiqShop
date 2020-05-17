<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function User()
    {
        return $this->hasMany('App\User','id','gender_id');
    }
}
