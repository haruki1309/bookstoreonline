<?php

namespace App\Models;
use App\Models\Role;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;
    //protected $fillable = ['id', 'name'];

    public function Role(){
    	return $this->belongsToMany('App\Models\Role')->withPivot('can_read','can_edit','can_create','can_delete','can_approve');
    }
}
