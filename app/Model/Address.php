<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    public $table='address';
    public function Users()
    {
        return $this->belongsTo('App\Model\Users');
    }
    public function Faktor()
    {
        return $this->hasMany('App\Model\Faktor');
    }
}