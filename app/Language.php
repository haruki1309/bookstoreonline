<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    public $timestamps = false;

    public function Book(){
    	return $this->hasMany('App\Book');
    }
}
