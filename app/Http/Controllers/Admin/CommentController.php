<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\Book;
use App\Models\Admin;
use DB;

class CommentController extends Controller
{
    public function index(Request $re){
    	$all = Comment::orderBy('created_at', 'desc')->get();
        $users = Admin::all();
        $books = Book::all();
        $viewname = 'bình luận';
        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_create = $re->can_create;
        $can_approve = $re->can_approve;
        $can_delete = $re->can_delete;
    	return view('admin/comment/index', compact('all','can_read','can_edit','can_create','can_approve','can_delete','users','books'));
    }

    public function edit(Request $re){
        $id = $re->id;
        $is_moderated = $re->is_moderated;
        $query = 'UPDATE `comment` SET is_moderated = ? WHERE id = ? ';
        DB::update($query, [$is_moderated,$id]);
        return redirect('admin\comments')->with('message', 'Đã cập nhật'); 
 
    }

    public function delete($id){
    	$comment = Comment::where('id', $id)->first();

    	$comment->delete();

    	$allComment = Comment::where('is_moderated', true)->where('book_id', $comment->book_id)->get();

    	$sum = 0;
    	foreach($allComment as $comment){
    		$sum += $comment->stars;
    	}
    	$score = 5;
    	if($sum > 0){
    		$score = round($sum / count($allComment));
    	}

    	$book = Book::where('id', $comment->book_id)->first();
    	$book->rating = $score;

    	$book->save();

    	return redirect()->back()->with('message', 'Đã cập nhật'); 
 ;

    }
}
