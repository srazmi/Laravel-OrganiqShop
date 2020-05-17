<?php

namespace App\Model;
use App\Model\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Model\Rates;

class Product extends Model
{
    public $timestamps = false;
    public $table= 'products';
    public function Users()
    {
        return $this->belongsToMany(Users::class, 'baskets');
    }

    public function Category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }

    public function Comments()
    {
        return $this->morphMany('App\Model\Comments','commentable');
    }

    public function Baskets()
    {
        return $this->hasMany('App\Model\Baskets');
    }

    public function Factor()
    {
        return $this->belongsToMany(Factor::class, 'Factor_Product');
    }

    public function Factor_Product()
    {
        return $this->hasMany('App\Model\Factor_Product');
    }
    
    public function Backed_Product()
    {
        return $this->hasMany('App\Model\Backed_Product');
    }

    public function photoes()
    {    
        return $this->morphMany('App\Model\Photoes','imageable');
    }
    public function Rates()
    {    
        return $this->morphMany('App\Model\Rates','rateable');
    }

    public function tags()
    {
        return $this->morphtoMany("App\Model\Tags","taggable");
    }

    public function getShortDescription()
    {
        return Str::limit($this->description, 15, '...');
    }
    
    public static function RateToProduct($rate_id,$user_id)
    {
        $RateToProduct=new Rates;
        $RateToProduct->rateable_id=$rate_id;
        $RateToProduct->user_id=$user_id;
        $RateToProduct->rate=1;
        $RateToProduct->created_at=now();
        $RateToProduct->updated_at=now();
        $RateToProduct->save();
    } 
}
    
    

