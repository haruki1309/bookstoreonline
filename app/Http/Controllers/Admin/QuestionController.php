<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\QuestionAnswer;
use App\Models\Book;
use App\Models\Admin;
use DB;

class QuestionController extends Controller
{
    public function index(Request $re){
    	$all = QuestionAnswer::all();
        $viewname = 'bình luận';
        $books = Book::all();
        $admins = Admin::all();
        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_create = $re->can_create;
        $can_approve = $re->can_approve;
        $can_delete = $re->can_delete;

    	return view('admin\question\index', compact('all','viewname','can_read','can_edit','can_create','can_approve','can_delete','books','admins'));
    }

    public function edit(Request $request){
    	$admin = Auth::guard('admin')->user();
    	$question = QuestionAnswer::where('id', $request->id)->first();
    	$question->admin_id = $admin->id;
    	$question->time_answer = date('Y-m-d');
    	$question->answer_details = $request->answer_details;

    	$question->save();

    	return redirect()->back()->with('message', 'Chỉnh sửa thành công'); ;
    }
    public function deleteQuestion($id){
        $question = QuestionAnswer::where('id', $id)->first();
        $question->delete();

        return redirect()->back()->with('message', 'Đã xóa thành công'); ;
    }
}
