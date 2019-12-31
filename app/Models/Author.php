<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];

    public function Book(){
    	return $this->belongsToMany('App\Models\Book');
    }
}
