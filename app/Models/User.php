<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';
    public $timestamps = false;

    public function Address(){
    	return $this->hasMany('App\Models\Address');
    }

    public function Order(){
    	return $this->hasMany('App\Models\Order');
    }

    public function Comment(){
    	return $this->hasMany('App\Models\Comment');
    }

    public function QuestionAnswer(){
        return $this->hasMany('App\Models\QuestionAnswer');
    }
}
