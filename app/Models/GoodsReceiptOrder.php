<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Supplier;

class GoodsReceiptOrder extends Model
{
    protected $table = 'goodsreceiptorder';
    public $timestamps = false;
    protected $fillable = ['id', 'supplier_id', 'total', 'created_at'];
    
    public function Book(){
        return $this->belongsToMany('App\Models\Book')->withPivot('qty', 'price');
    }

    public function Supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }
}
