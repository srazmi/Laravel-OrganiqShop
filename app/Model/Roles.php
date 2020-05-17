<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function User()
    {
        return $this->belongsToMany(User::class, 'Roles_User');
    }
}
