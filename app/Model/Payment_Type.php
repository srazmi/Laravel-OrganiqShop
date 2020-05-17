<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Peyment_Type extends Model
{
    public function Factor()
    {
        return $this->hasMany('App\Model\Factor');
    }
}
