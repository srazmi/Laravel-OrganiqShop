<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\Category;
use App\Model\Product;
use App\Model\Gender;
use App\Model\Baskets;
use App\User;

use Illuminate\Support\Facades\DB;

class ChannelsComposer
{
    public function compose(View $view)
    {
        $category=Category::all();
        $Product=Product::with('category')->get();
        $genders=Gender::all();
        if(auth()->user())
        {
            $curentuserid=auth()->user()->id;
            $basket=Baskets::getcontent($curentuserid);
            $Temp['basket']= $basket;
        }
        else
        $Temp['basket']= null;
        // $price=0;
        // foreach($basket as $item)
        // {
        //     $price=$price + $item->num* $item->Product()->get()->first()->price;
        // }
        // dd($price);die;

        $Temp['category']=$category;
        $Temp['Product']= $Product;
        $Temp['genders']= $genders;
        
        // $Temp['price']=$price;
        
        $view->with('Temp',$Temp);
    }
}
