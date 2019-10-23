<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsToMany('App\Book');
    }
}
