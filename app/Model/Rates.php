<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $fillable = [
        'rate','rateable_id','rateable_type','user_id','created_at'
    ];
    public function Rateable()
    {
        return $this->morphTo();
    }
}
