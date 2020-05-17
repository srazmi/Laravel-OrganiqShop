<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Baskets extends Model
{
    public $timestamps=false;
    
    protected $fillable=['num','product_id','user_id','created_at','updated_at'];

    public function Product()
    {
        return $this->belongsTo('App\Model\Product');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }

    //add new product to basket table 
    public static function AddToBasket($product_id,$user_id,$num)
    {
        $result=Baskets::where('user_id','=',$user_id)->where('product_id','=',$product_id)->first();
        $product=Product::where('id',$product_id)->first();
        if($num<$product->number)    
        {    if($result)
            {            
                $result->num+=$num;
                $result->updated_at=now();
                $result->save();
            }
            else
            {
                $addproduct=new Baskets;
                $addproduct->product_id=$product_id;
                $addproduct->user_id=$user_id;
                $addproduct->num=$num;
                $addproduct->created_at=now();
                $addproduct->save();
            }
            $product->number-=$num;
            $product->save();
            return 1;
        }
        else
        {
            return 0;
        }
    }

    //returns all the products of current user from basket
    public static function getcontent($user_id)
    {
        $basket=Baskets::with('Product')->where('user_id',$user_id)->get();
        return $basket;
    }



    //decreasing a row or mines num of product
    public static function editbasket($product_id,$user_id,$num)
    {
        $result=Baskets::where('user_id','=',$user_id)->where('product_id','=',$product_id)->first();
            $product=Product::where('id',$product_id)->first();
            $diff=$result->number-$num;
            if($diff<0)
             {  if(abs($diff)<$product->number)
                {
                    $product->number-=abs($diff);
                    $result->num=$num;
                    $result->save();
                    $product->save();
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            elseif($diff>0)
            {
                    $product->number+=abs($diff);
                    $result->num=$num;
                    $result->save();
                    $product->save();
                    return 1;
            }

            
                 
    }
    //delete a row from basket table
    public static function DeleteFromBasket($product_id,$user_id)
    {
  
        $result=Baskets::where('user_id','=',$user_id)->where('product_id','=',$product_id)->first();
        $product=Product::where('id',$product_id)->first();
        $product->number+=$result->num;
        $product->save();
        $result->delete();  
    }
    
}
