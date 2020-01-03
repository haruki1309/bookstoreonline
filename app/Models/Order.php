<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = true;

    public function Book(){
    	return $this->belongsToMany('App\Models\Book')->withPivot('amount', 'price');
    }

    public function Status(){
    	return $this->belongsTo('App\Models\Status');
    }

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }

    public function MethodDelivery(){
        return $this->belongsTo('App\Models\MethodDelivery');
    }
}
