<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $table = 'age';
    public $timestamps = false;
    protected $fillable = ['id', 'name'];
    
    public function Book(){
    	return $this->hasMany('App\Models\Book');
    }
}
