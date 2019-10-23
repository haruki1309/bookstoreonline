<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'book_picture';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsTo('App\Book');
    }
}
