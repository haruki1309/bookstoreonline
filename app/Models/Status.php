<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'status';
    public $timestamps = false;

    public function Order(){
    	return $this->hasMany('App\Models\Order');
    }
}
