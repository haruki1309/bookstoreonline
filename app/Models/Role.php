<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Role extends Model
{
    protected $table = 'role';
    public $timestamps = false;
    //protected $fillable = ['id', 'name'];

    public function Menu(){
    	return $this->belongsToMany('App\Models\Menu')->withPivot('can_read','can_edit','can_create','can_delete','can_approve');
    }
}
