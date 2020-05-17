<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table='category';

    public function Product()
    {
        return $this->hasMany('App\Model\Product','id','category_id');
    }
    public function Subcategory()
    {
        return $this->hasMany('App\Model\Subcategory','id','category_id');
    }
    public function Posts()
    {
        return $this->hasMany('App\Model\Posts','id','category_id');
    }
}
