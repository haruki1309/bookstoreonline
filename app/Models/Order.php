<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = true;

    public function Book(){
    	return $this->belongsToMany('App\Book')->withPivot('amount', 'price');
    }

    public function Status(){
    	return $this->belongsTo('App\Status');
    }

    public function User(){
    	return $this->belongsTo('App\User');
    }

    public function MethodDelivery(){
        return $this->belongsTo('App\MethodDelivery');
    }
}
