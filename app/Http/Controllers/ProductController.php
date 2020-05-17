<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Comments;
use App\Model\Product;
use App\Model\Tags;



class ProductController extends Controller
{
   
   public function RateToProduct(Request $request)
    {
        $CurrentUserid= $request->user()->id; 
        Product::RateToProduct($request->id,$CurrentUserid);
        return response()->json([$CurrentUserid]);

    }

    public function ShowTagProducts($id)
    {
        $tag=Tags::findOrFail($id);
        $products=$tag->Products()->simplepaginate(6 );
        $recentproducts=Product::orderBy('created_at','DESC')->take(3)->get();
        return view ('product.category',compact('products','recentproducts'));

    }

    
    public function SearchProducts(Request $request)
    {
        $SearchItem= $request->search_item; 
        $products=Product::where('name','LIKE',"%$SearchItem%")
        ->orWhere('description','LIKE',"%$SearchItem%")
        ->simplepaginate(6);
        $recentproducts=Product::orderBy('created_at','Desc')->take(3)->get();
        return view ('product.category',compact('products','recentproducts'));

    }
    
}
