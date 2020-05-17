<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Query extends Model
{
    public static function BestSoldeAllProducts()
    {
        return DB::table('factor')->where('factorstate_id', '=', 2)
            ->leftJoin('factor_product','factor.id','=','factor_product.factor_id')
            ->selectRaw('factor_product.product_id, COALESCE(sum(factor_product.num),0) total')
            ->groupBy('factor_product.product_id')
            ->orderBy('total','desc')
            ->take(6)
            ->get();
    }
    public static function BestSoldeselectedCategory($id)
    {
        return DB::table('factor')->where('factorstate_id', '=', 2)
            ->leftJoin('factor_product','factor.id','=','factor_product.factor_id')
            ->leftJoin('products','factor_product.product_id','products.id')->where('products.category_id',$id)
            ->selectRaw('factor_product.product_id, COALESCE(sum(factor_product.num),0) total')
            ->groupBy('factor_product.product_id')
            ->orderBy('total','desc')
            ->take(6)
            ->get();
    }
    
    public static function MostPopularAllProduct()
    {
        return DB::table('rates')
            // ->leftJoin('factor_product','factor.id','=','factor_product.factor_id')
            ->selectRaw('rates.rateable_id, COALESCE(sum(rates.rate),0) total')
            ->groupBy('rates.rateable_id')
            ->orderBy('total','desc')
            ->take(6)
            ->get();
    }
}
