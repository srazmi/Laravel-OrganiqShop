<?php

namespace App\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title','content'
    ];
    
    public function User()
    {
        return $this->hasMany('App\User','id','user_id');
    }

    public function Comments()
    {
        return $this->morphMany('App\Model\Comments','commentable');
    }
    public function photoes()
    {
        return $this->morphMany("App\Model\Photoes","imageable");
    }

    public function tags()
    {
        return $this->morphtoMany("App\Model\Tags","taggable");
    }

    public function Category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }

    public function getShortContent($num)
    {
        return Str::limit($this->content_one, $num, '...');
    }
}
