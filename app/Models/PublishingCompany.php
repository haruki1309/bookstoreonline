<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublishingCompany extends Model
{
    protected $table = 'publishing_company';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];

    public function Book(){
    	return $this->hasMany('App\Models\Book');
    }
}
