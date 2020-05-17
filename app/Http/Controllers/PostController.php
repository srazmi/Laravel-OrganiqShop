<?php

namespace App\Http\Controllers;
use App\Model\Posts;
use App\Model\Tags;
use App\Model\Taggables;



use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index()
    {
        $posts=Posts::simplepaginate(3);
        $recentposts=Posts::orderBy('created_at','DESC')->take(3)->get();
        return view ("weblog",compact('posts','recentposts'));   
    }

    public function SimplePostShow($title,$id)
    {
        $post=Posts::where('id',$id)->first();
        $recentposts=Posts::orderBy('created_at','DESC')->take(3)->get();
        $relatedposts=Posts::where('category_id',$post->category_id)->get();

        return view ("weblog-single",compact('post','recentposts','relatedposts'));   
    }

    
    public function ShowTagPosts($id)
    {
        $tag=Tags::findOrFail($id);
        $posts=$tag->posts()->simplepaginate(3);
        $recentposts=Posts::orderBy('created_at','DESC')->take(3)->get();
        return view ("weblog",compact('posts','recentposts'));   
    }

    public function SearchPosts(Request $request)
    {
        $SearchItem= $request->search_item; 
        $posts=Posts::where('title','LIKE',"%$SearchItem%")
        ->orWhere('content_one','LIKE',"%$SearchItem%")
        ->orWhere('content_two','LIKE',"%$SearchItem%")
        ->simplepaginate(6);
        $recentposts=Posts::orderBy('created_at','DESC')->take(3)->get();
        return view ("weblog",compact('posts','recentposts'));   

    }
}
