<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    public $timestamps = false;

    public function User(){
    	return belongsToMany('App\Models\User');
    }
}
