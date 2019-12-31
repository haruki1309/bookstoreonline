<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];
    
    public function Book(){
    	return $this->hasMany('App\Models\Book');
    }
}
