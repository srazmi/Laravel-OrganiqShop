<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function posts()
    {
        return $this->morphedByMany("App\Model\Posts","taggable");
    }

    public function videos()
    {
        return $this->morphedByMany("App\Model\Videos","taggable");
    }

    public function Products()
    {
        return $this->morphedByMany("App\Model\Product","taggable");
    }
}
