<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Supplier extends Model
{
    protected $table = 'supplier';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'phone', 'email', 'address'];

    public function Book(){
    	return $this->belongsToMany('App\Models\Book')->withPivot('order_price');
    }

    public function GoodsReceiptOrder(){
        return $this->hasMany('App\Models\GoodsReceiptOrder');
    }
}
