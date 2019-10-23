<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publisher';
    public $timestamps = false;

    public function Book(){
    	return $this->hasMany('App\Book');
    }
}
