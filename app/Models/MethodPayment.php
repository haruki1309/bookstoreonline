<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MethodPayment extends Model
{
    protected $table = 'method_payment';
    public $timestamps = false;

    public function Order(){
    	return $this->hasMany('App\Models\Order');
    }
}
