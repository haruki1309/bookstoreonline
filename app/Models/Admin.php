<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Admin extends Model
{
	protected $table = 'admin';
    protected $guarded = ['id'];
    protected $hidden = 
    ['password', 'remember_token'];
    public $timestamps = false;

    
    public function getAuthPassword()
    {
    	return $this->password;
    }

    public function Role(){
    	return $this->belongsTo('App\Models\Role');
    }
}
