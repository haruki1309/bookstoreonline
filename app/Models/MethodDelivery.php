<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MethodDelivery extends Model
{
    protected $table = 'method_delivery';
    public $timestamps = false;

    public function Order(){
    	return $this->hasMany('App\Order');
    }
}
