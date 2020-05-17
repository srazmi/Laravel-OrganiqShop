<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Factor_Product extends Model
{
    public $table= 'factor_product';
    // protected $fillable = [
    //     'kala_id','faktor_id','num',
    // ];

    public function Factor()
    {
        return $this->belongsTo('App\Model\Factor');
    }

    public function Product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
