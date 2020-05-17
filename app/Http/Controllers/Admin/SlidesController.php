<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slides;
use App\Model\Photoes;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slides::all();
        return view('layouts.Admin.Slides.ShowSlides',compact('slides'));
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
        // dd($request);

        $slides = new Slides();
        // $slides->id = $request->id;
        $slides->name = $request->name;
   
        $slides->save();

        if ($request->file('select_file')) 
        {
            $files = $request->file('select_file');
            $imagename = $files->getClientOriginalName();
            $files->move('assets/images/slides/', $imagename);
            $slides->photoes()->create(['path' => 'assets/images/slides/' . $imagename, 'imageable_id' => $slides->id]);
        }

        $slides = Slides::all();
        // dd($posts);
        $photos = array();

        foreach ($slides as $slide)
        {
            array_push($photos, Photoes::where('imageable_id',$slide->id)->first()->path);           
        }

        return response()->json(['slides'=>$slides,'photos'=>$photos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request);
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $request->id);  //Convert Persian Numbers to English Numbers
        
        $slides= Slides::find($convertedPersianNums);
        // dd($slides);
        $slides->delete();

        return response()->json([$slides]);
    }
}
