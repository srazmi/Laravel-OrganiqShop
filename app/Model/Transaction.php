<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table= 'transaction';
    
    public function Payment_Gateway()
    {
        return $this->belongsTo('App\Models\Payment_Gateway','paymentgateway_id','id');
    }
    
}
