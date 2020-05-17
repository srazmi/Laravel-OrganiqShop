<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment_Gateway extends Model
{
    public $table= 'payment_gateway';

    public function Factor()
    {
        return $this->belongsToMany(Factor::class, 'Transaction');
    }
    public function Transaction()
    {
        return $this->hasMany('App\Model\Transaction','id','paymentgateway_id');
    }
}
