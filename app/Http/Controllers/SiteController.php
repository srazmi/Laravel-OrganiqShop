<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Model\Category;
use App\Model\Product;
use App\Model\Photoes;
use App\Model\Factor_Product;
use App\Model\Factor;
use App\Model\Taggables;
use App\Query;
use App\User;
use App\Model\Roles;
use App\Model\Posts;
use App\Model\Comments;


use Illuminate\Support\Facades\DB;



class SiteController extends Controller
{
    public function ShowHomepage()
    {
        $BestSoldProduct_id = Query::BestSoldeAllProducts();
        $BestSoldProduct=array();
            
        foreach($BestSoldProduct_id as $product_id)
        {
            array_push($BestSoldProduct,Product::with('category')->where('id',$product_id->product_id)->first()); 
        }
        // dd($BestSoldProduct);
        $MostPopularProduct_id = Query::MostPopularAllProduct();
        $MostPopularProduct=array();
            
        foreach($MostPopularProduct_id as $product_id)
        {
            array_push($MostPopularProduct,Product::with('category')->where('id',$product_id->rateable_id)->first()); 
        }

        $Posts=Posts::orderBy('created_at','DESC')->take(3)->get();

        $Comments=Comments::where('state','2')->take(3)->get();
        return view('home',compact('BestSoldProduct','MostPopularProduct','Posts','Comments'));
    }
//=====================================================================================

    //Best Sold Products Based On Category
    public function SortByCategory(Request $request)
    {    
        $BestSoldeselectedCategory_id=array();
        $products=array();
     
            if($request->id!=null)
            { 
                $BestSoldeselectedCategory_id=Query::BestSoldeselectedCategory($request->id);

                foreach($BestSoldeselectedCategory_id as $product_id)
                {
                    $product=Product::with('category')->where('id',$product_id->product_id)->where('category_id','=',$request->id)->first();

                    if($product)
                        array_push($products,$product); 
                }
            }
            elseif($request->id==null)
            {
                
                $BestSoldeselectedCategory_id=Query::BestSoldeAllProducts();

                foreach($BestSoldeselectedCategory_id as $product_id)
                {
                    $product=Product::with('category')->where('id',$product_id->product_id)->first();

                    if($product)
                        array_push($products,$product); 
                }
            }
            $path=array();
            $i=0;
            foreach($products as $item)
            {
                $path[$i]=Photoes::Where('imageable_id',$item->id)->first()->path;
                $i++;
            }

            foreach($products as $item)
            {
                $category[$i]=Category::Where('id',$item->category_id)->first()->name;
                $i++;
            }
           
        return response()->json(array('result'=>$products,'path'=>$path, 'category'=>$category));
    }

//=====================================================================================

    public function ShowCategory($name , $id)
    {    
        $products=Product::where('category_id', $id)->simplepaginate(6);
        $recentproducts=Product::orderBy('created_at','Desc')->take(3)->get();
        return view ('product.category',compact('products','recentproducts'));
    }

//=====================================================================================

    public function ShowSubcategory($category ,$name ,$id)
    {
        $product=Product::with('category')->where('id', $id)->first();
        $recentproducts=Product::orderBy('created_at','Desc')->take(3)->get();
        $relatedproducts=Product::where('category_id',$product->category_id)->get();

        return view ('Product.subcategory',compact('product','recentproducts','relatedproducts'));
    }
//========================================================================================
    public function aboutus()
    {
        $Comments=Comments::where('state','2')->take(3)->get();
        return view ("aboutus",compact('Comments'));   
    }
    //=====================================================================================
    public function contactus()
    {
        $Comments=Comments::where('state','2')->take(3)->get();
        return view ("contactus",compact('Comments'));   
    }
//=========================================================================================

    public function ShowStore()
    {
        $products=Product::with('category')->simplepaginate(6);
        $recentproducts=Product::orderBy('created_at','Desc')->take(3)->get();

        return view ('Product.store',compact('products','recentproducts'));
    }
    
}
