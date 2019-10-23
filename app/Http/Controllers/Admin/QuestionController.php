<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\QuestionAnswer;

class QuestionController extends Controller
{
    public function getQuestionList(){
    	$questions = QuestionAnswer::where('answer_details', 'null')->get();

    	return view('admin\question\question', compact('questions'));
    }

    public function postAnswer(Request $request, $id){
    	$admin = Auth::guard('admin')->user();
    	
    	$question = QuestionAnswer::where('id', $id)->first();
    	$question->admin_id = $admin->id;
    	$question->time_answer = date('Y-m-d');
    	$question->answer_details = $request->answer;

    	$question->save();

    	return redirect()->back();
    }
    public function deleteQuestion($id){
        $question = QuestionAnswer::where('id', $id)->first();
        $question->delete();

        return redirect()->back();
    }
}
