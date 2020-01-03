<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publisher';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];

    public function Book(){
    	return $this->hasMany('App\Models\Book');
    }
}
