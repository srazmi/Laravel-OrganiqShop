<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photoes extends Model
{
    protected $fillable = [
        'path','imageable_id','imageable_type'
    ];
    public function Imageable()
    {
        return $this->morphTo();
    }

    

}
