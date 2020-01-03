<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $table = 'question_answer';
    public $timestamps = false;

    public function Book(){
    	return $this->belongsTo('App\Models\Book');
    }

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }
}
