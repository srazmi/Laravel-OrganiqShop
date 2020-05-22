<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Photoes;
use App\Model\Baskets;
use App\Model\Address;
use App\Model\Factor;
use App\Model\Factor_Product;
use Carbon\Carbon;
use App\User;



class BasketController extends Controller
{
    public function cart()
    {
       
        return view ("basket.cart");
    }

    public function AddToCart(Request $request)
    {
        $CurrentUserid= $request->user()->id; 
        if($request->num)
            $num=$request->num;
            else
            $num=1;
        $result=Baskets::AddToBasket($request->id,$CurrentUserid,$num);
        $basket= Baskets::getcontent($CurrentUserid);
        $path=array();
        $i=0;

        foreach($basket as $item)
        {
            $path[$i]=Photoes::Where('imageable_id',$item->Product->id)->first()->path;
            $i++;
        }
        session(['factor_id' =>null]);
        if($result)
        {
            return response()->json(array('basket'=>$basket,'path'=>$path));
        }

        
        else
        {
            $Message="تعداد درخواستی شما بیش از تعداد موجود در انبار است!";
            return response()->json(array('basket'=>$basket,'path'=>$path,'message'=>$Message));
        }

    }
    
    public function RemoveFromBasket(Request $request)
    {
        $CurrentUserid= $request->user()->id; 
        Baskets::DeleteFromBasket($request->id, $CurrentUserid);
        $basket= Baskets::getcontent($CurrentUserid);
        $path=array();
        $i=0;

        foreach($basket as $item)
        {
            $path[$i]=Photoes::Where('imageable_id',$item->Product->id)->first()->path;
            $i++;
        }
        session(['factor_id' =>null]);
        return response()->json(array('basket'=>$basket,'path'=>$path));

    }

    public function EditBasket(Request $request)
    {
        $CurrentUserid= $request->user()->id;
        
        $result=Baskets::EditBasket($request->id,$CurrentUserid,$request->num);
        $basket= Baskets::getcontent( $CurrentUserid);
        $path=array();
        $i=0;

        foreach($basket as $item)
        {
            $path[$i]=Photoes::Where('imageable_id',$item->Product->id)->first()->path;
            $i++;
        }
        session(['factor_id' =>null]);
        if($result)
        {
            return response()->json(array('basket'=>$basket,'path'=>$path));
        }
       
        else
        {
            $Message="تعداد درخواستی شما بیش از تعداد موجود در انبار است!";
            return response()->json(array('basket'=>$basket,'path'=>$path,'message'=>$Message));
        }


    }





    public function scheduleremove()
    {
        $results=Baskets::where('created_at', '<=', Carbon::now()->subDay())->get();
        
        foreach($results as $result)
         {  
             $product=Product::where('id',$result->product_id)->first();
            $product->number+=$result->num;
            $product->save();
            $result->delete();  
         }
    }


    
}
