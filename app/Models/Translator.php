<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    protected $table = 'translator';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];

    public function Book(){
    	return $this->belongsToMany('App\Models\Book');
    }
}
