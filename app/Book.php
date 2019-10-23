<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    public $timestamps = false;

    public function Author(){
    	return $this->belongsToMany('App\Author');
    }

    public function Translator(){
    	return $this->belongsToMany('App\Translator');
    }

    public function Topic(){
    	return $this->belongsToMany('App\Topic');
    }

    public function Category(){
    	return $this->belongsToMany('App\Category');
    }

    public function Order(){
        return $this->belongsToMany('App\Order')->withPivot('amount', 'price');
    }

    public function Advertiserment(){
        return $this->belongsToMany('App\Advertiserment');
    }

    public function Age(){
    	return $this->belongsTo('App\Age');
    }


    public function Publisher(){
    	return $this->belongsTo('App\Publisher');
    }

    public function PublishingCompany(){
    	return $this->belongsTo('App\PublishingCompany');
    }

    public function Language(){
    	return $this->belongsTo('App\Language');
    }

    public function Picture(){
    	return $this->hasMany('App\Picture');
    }

    public function Comment(){
        return $this->hasMany('App\Comment');
    }

    public function QuestionAnswer(){
        return $this->hasMany('App\QuestionAnswer');
    }
}
