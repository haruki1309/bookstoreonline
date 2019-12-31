<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Admin extends Model
{
	protected $table = 'admin';
    protected $guarded = ['id'];
    protected $hidden = 
    ['password', 'remember_token'];
    public function getAuthPassword()
    {
    	return $this->password;
    }
}
