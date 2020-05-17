<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Factor;
use App\Model\Send_State;
use App\User;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $products = Product::with('category')->get();
        // dd($users);
        return view('layouts.Admin.Products.ShowProduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required | string',
            'description'=>'required | string' ,
            'price'=>'required',
            'number'=>'required',
            
        ]);
        $products= new Product;
        
        $products->id=$request->input('id');
        $products->name=$request->input('name');
        $products->description=$request->input('description');
        $products->category_id=$request->input('category');
        $products->price=$request->input('price');
        $products->number=$request->input('number');

        $products->save();

        return response()->json([$products]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $factors = Factor::with('send_state','user','factor_state')->get();
        
        // dd($factors);
        return view('layouts.Admin.Products.SendProduct',compact('factors'));
    }
    public function showstockroom()
    {
        $products = Product::with('category')->get();
        
        // dd($factors);
        return view('layouts.Admin.Products.StockRoom',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $id);  //Convert Persian Numbers to English Numbers
       
        $products= Product::find($convertedPersianNums);
        
        $category_id = Category::where('persian_name',$request->input('category'))->select("id")->get()->first()->id;
// dd($request);
        $products->name = $request->input('name');    
        $products->description = $request->input('description');
        $products->category_id = $category_id;
        $products->price = $request->input('price');
        $products->number = $request->input('number');

        $products->save();
        return response()->json([$products]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $request->id);  //Convert Persian Numbers to English Numbers
        
        $products= Product::find($convertedPersianNums);
        // dd($products);
        $products->delete();

        return response()->json([$products]);
        
    }
}
