<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $table = 'age';
    public $timestamps = false;

    public function Book(){
    	return $this->hasMany('App\Book');
    }
}
