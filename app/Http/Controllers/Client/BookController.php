<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\QuestionAnswer;
use App\Models\Comment;


class BookController extends Controller
{
    public function getIndex($id){
    	
    	$book = Book::where('id', $id)->first();
        $comments = Comment::where(['book_id'=>$id, 'is_moderated'=>1])->get();
        $questions = QuestionAnswer::where('book_id', $id)->where('answer_details', '!=', 'null')->get();
    	return view('client\detail', compact('book', 'comments', 'questions'));
    }

    public function postQuestion(Request $request, $id){
    	$question = new QuestionAnswer;
        $question->book_id = $id;
        $question->user_id = Auth::user()->id;
        $question->time_ask = date('Y/m/d');
        $question->ask_details = $request->question;
        $question->admin_id = -1;
        $question->time_answer = date('Y/m/d');
        $question->answer_details = "null";
        $question->save();

        return redirect()->back()->with('notify', 'Câu hỏi đã được gửi, vui lòng chờ xét duyệt');
    }

    public function postComment(Request $request, $id){
    	$comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->book_id = $id;
        $comment->stars = $request->commentRating;
        $comment->title = $request->commentTitle;
        $comment->comment = $request->commentContent;
        $comment->created_at = date('Y/m/d');
        $comment->is_moderated = false;
        $comment->save();

        return redirect()->back()->with('notify', 'Bình luận đã được gởi, vui lòng chờ xét duyệt');
    }
}
