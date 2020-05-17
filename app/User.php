<?php

namespace App;

use App\Model\Roles;
use App\Model\Comments;
use App\Model\Product;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    protected $data=['deleted_at'];
    public $table= 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;
    
    public function Gender()
    {
        return $this->belongsTo('App\Models\Gender','gender_id','id');
    }

    public function Posts()
    {
        return $this->belongsTo('App\Models\Posts');
    }

    public function Product()
    {
        return $this->belongsToMany(Product::class, 'basket');
    }

    public function Comments()
    {
        return $this->hasMany('App\Models\Comments');
    }
    public function photoes()
    {    
        return $this->morphMany('App\Model\Photoes','imageable');
    }

    public function Address()
    {
        return $this->hasMany('App\Models\Address');
    }
    
    public function Roles()
    {
        return $this->belongsToMany(Roles::class, 'Roles_User');
    }

    public function Factor()
    {
        return $this->hasMany('App\Model\Factor','id','user_id');
    }

    public function isAdmin()
    {
        if (isset($this->Roles[0])&&$this->Roles[0]->name=='admin'){
            return true; 
        }else{
            return false;
        }

    }
}
