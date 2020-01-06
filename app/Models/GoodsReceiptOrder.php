<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsReceiptOrder extends Model
{
    protected $table = 'goodsreceiptorder';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];
    
    public function Book(){
        return $this->hasMany('App\Models\Book');
    }
}
