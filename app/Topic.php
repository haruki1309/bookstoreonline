<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topic';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsToMany('App\Book');
    }
}
