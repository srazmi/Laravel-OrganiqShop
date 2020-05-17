<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Backed_Product extends Model
{
    public function Product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public function Factor()
    {
        return $this->belongsTo('App\Model\Factor');   
    }
}
