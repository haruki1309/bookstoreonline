<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsTo('App\Models\Book');
    }

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }
}
