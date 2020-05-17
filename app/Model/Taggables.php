<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Taggables extends Model
{
    //
    public static function test()
    {
       
            
        
        $tags=Taggables::all()->groupby('taggable_id');

        // foreach($tags as $tag)
        // {
        //     $tags[]
        // }
        
        return $tags;
    }
    
}
