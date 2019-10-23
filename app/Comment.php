<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsTo('App\Book');
    }

    public function User(){
    	return $this->belongsTo('App\User');
    }
}
