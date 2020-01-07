<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    public $timestamps = false;

    public function Author(){
    	return $this->belongsToMany('App\Models\Author');
    }

    public function Translator(){
    	return $this->belongsToMany('App\Models\Translator');
    }

    public function Topic(){
    	return $this->belongsToMany('App\Models\Topic');
    }

    public function Category(){
    	return $this->belongsToMany('App\Models\Category');
    }

    public function Order(){
        return $this->belongsToMany('App\Models\Order')->withPivot('amount', 'price');
    }

    public function Advertiserment(){
        return $this->belongsToMany('App\Models\Advertiserment');
    }

    public function Age(){
    	return $this->belongsTo('App\Models\Age');
    }


    public function Publisher(){
    	return $this->belongsTo('App\Models\Publisher');
    }

    public function PublishingCompany(){
    	return $this->belongsTo('App\Models\PublishingCompany');
    }

    public function Language(){
    	return $this->belongsTo('App\Models\Language');
    }

    public function Picture(){
    	return $this->hasMany('App\Models\Picture');
    }

    public function Comment(){
        return $this->hasMany('App\Models\Comment');
    }

    public function QuestionAnswer(){
        return $this->hasMany('App\Models\QuestionAnswer');
    }

    public function Supplier(){
        return $this->belongsToMany('App\Models\Supplier')->withPivot('order_price');
    }

    public function GoodsReceiptOrder(){
        return $this->belongsToMany('App\Models\GoodsReceiptOrder')->withPivot('qty', 'price');
    }
}
