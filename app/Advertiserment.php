<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertiserment extends Model
{
    protected $table = 'advertiserment';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsToMany('App\Book');
    }
}
