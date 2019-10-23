<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Book;

class CommentController extends Controller
{
    public function getCommentList(){
    	$comments = Comment::orderBy('created_at', 'desc')->get();

    	return view('admin\comment\comment', compact('comments'));
    }

    public function acceptComment($id){
    	$comment = Comment::where('id', $id)->first();
    	$comment->is_moderated = true;
    	$comment->save();

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

    	return redirect()->back();
    }

    public function deleteComment($id){
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

    	return redirect()->back();

    }
}
