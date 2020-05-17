<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Comments extends Model
{
 
    protected $fillable=['comment','user_id'];
    
    public function Users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function Product()
    {
        return $this->belongsTo('App\Model\Product');
    }

    public function Commentable()
    {
        return $this->morphTo();
    }

    public static function StoreScore($user_id,$product_id,$score)
    {
        $result=Comments::where('user_id',$user_id)->where('commentable_id',$product_id)->first();
        if($result)
            {
                $result->score=$score;
                $result->save();
            }
        else
            {
                $newscore=new Comments();
                $newscore->user_id=$user_id;
                $newscore->commentable_id=$product_id;
                $newscore->score=$score;
                $newscore->save();
            }
        
    }
    //save score for a product in Comment table
    public static function StoreComment($user_id,$product_id,$comment)
    {
        $result=Comments::where('user_id',$user_id)->where('commentable_id',$product_id)->where('Comment','==',null)->first();
        if($result)
        {    
            $result->Comment=$comment;
            $result->state=0;
            $result->save();
        }
        else
            {
                $newcomment=new Comments();
                $newcomment->user_id=$user_id;
                $newcomment->commentable_id=$product_id;
                $newcomment->commentable_type='App\Model\Product';
                $newcomment->comment=$comment;
                $newcomment->state=0;
                $newcomment->save();
            }
        
    }

    public function getShortContent($num)
    {
        return Str::limit($this->comment, $num, '...');
    }
    
}
