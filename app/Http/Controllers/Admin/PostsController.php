<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Model\Posts;
use App\Model\Photoes;
use App\Model\Category;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::with('category')->get();
        $category = Category::all();
        return view('layouts.Admin.Posts.ShowPosts',compact('posts','category'));
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
        $request->validate([
            'title'=>'required | string',
            'content_one'=>'required | string' , 
            'select_file'=>'required | image | mimes:jpeg,png,jpg,gif |max:2048'   
        ]);

        $posts = new Posts();
        $posts->title = $request->title;
        $posts->user_id = $request->user()->id;
        $posts->content_one = $request->content_one;
        $posts->content_blockqotoe = $request->content_blockqotoe;
        $posts->content_two = $request->content_two;
        $posts->category_id = $request->category_id;
// dd($posts);
        $posts->save();

        if ($request->file('select_file')) 
        {
            $files = $request->file('select_file');
            $imagename = $files->getClientOriginalName();
            $files->move('assets/images/posts/', $imagename);
            $posts->photoes()->create(['path' => 'assets/images/posts/' . $imagename, 'imageable_id' => $posts->id]);
        }

        $posts = Posts::with('photoes')->get();
        // dd($posts);
        $photos = array();
        $user = array();
        $category = array();
        foreach ($posts as $post)
        {
            // dd(Posts::where('id',$post->user_id)->first()->user()->name);
            array_push($photos, Photoes::where('imageable_id',$post->id)->first()->path);
            array_push($user, Posts::where('id',$post->user_id)->first()->user->name);
            array_push($category, Posts::where('id',$post->category_id)->first()->category()->first()->persian_name);
            
        }

        return response()->json(['posts'=>$posts,'photos'=>$photos, 'user'=>$user, 'category'=>$category]);
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
        $posts = Posts::find($id);
        $category = Category::all();

        return view('layouts.Admin.posts.postupdateform',compact('posts','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $posts = Posts::find($id);

        $posts->title = $request->input('title');
        $posts->content_one = $request->input('content_one');
        $posts->content_blockqotoe = $request->input('content_blockqotoe');
        $posts->content_two = $request->input('content_two');
        $posts->category_id = $request->input('category_id');

        if ($request->file('select_file')) 
        {
            $files = $request->file('select_file');
            $imagename = $files->getClientOriginalName();
            $files->move('assets/images/posts/', $imagename);
            $image = Photoes::where('imageable_type','App\Model\Posts')
                            ->where('imageable_id',$posts->id)
                            ->first();
            $image->path = 'assets/images/posts/' . $imagename;
            $image->save();
            // dd($image);
        }
        $posts->save();
        $posts = Posts::all();
// dd($posts);
        return redirect('posts');
        // $this->index();
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
        
        $posts= Posts::find($convertedPersianNums);
        // dd($posts);
        $posts->delete();

        return response()->json([$posts]);
    }
}
