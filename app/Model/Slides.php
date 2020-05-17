<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    public function photoes()
    {
        return $this->morphMany("App\Model\Photoes","imageable");
    }
}
