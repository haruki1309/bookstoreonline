<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    protected $table = 'translator';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsToMany('App\Book');
    }
}
