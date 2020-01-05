<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Comment;
use App\Models\QuestionAnswer;
use App\Models\Author;
use App\Models\Translator;
use App\Models\PublishingCompany;
use App\Models\Publisher;
use App\Models\Language;
use App\Models\Age;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Order;
use App\Models\Advertiserment;

class PageController extends Controller
{
    public function homepage(){
        $books = Book::all();
        return view('client/homepage', compact('books'));
    }

    public function shop(){
        $viewname = "Cửa hàng";
        $books = Book::all();
        return view('client/list', compact('books', 'viewname'));
    }

    public function account(){
        return view('client/account');
    }

    public function detail($id){
        $book = Book::find($id);
        $related = $book->Topic[0]->Book;
        $comments = Comment::where('book_id', $id)->where('is_moderated', true)->get();
        $questions = QuestionAnswer::where('book_id', $id)->where('answer_details', '!=', 'null')->get();

        $commentsCount =($comments->count()==0) ? 1 : $comments->count();
        $oneStars = Comment::where('book_id', $id)->where('is_moderated', true)->where('stars', '>', '4')->get();
        $twoStars = Comment::where('book_id', $id)->where('is_moderated', true)->where('stars', '>', '3')->where('stars', '<=', '4')->get();
        $threeStars = Comment::where('book_id', $id)->where('is_moderated', true)->where('stars', '>', '2')->where('stars', '<=', '3')->get();
        $fourStars = Comment::where('book_id', $id)->where('is_moderated', true)->where('stars', '>', '1')->where('stars', '<=', '2')->get();
        $fiveStars = Comment::where('book_id', $id)->where('is_moderated', true)->where('stars', '<=', '1')->get();

        $bookRate = [
                        '1star'=>round(($oneStars->count() / $commentsCount)*100, 2), 
                        '2star'=>round(($twoStars->count() / $commentsCount)*100, 2), 
                        '3star'=>round(($threeStars->count() / $commentsCount)*100, 2),
                        '4star'=>round(($fourStars->count() / $commentsCount)*100, 2),
                        '5star'=>round(($fiveStars->count() / $commentsCount)*100, 2)
                    ];

        return view('client/bookdetail', compact('book', 'related', 'comments', 'questions', 'bookRate'));
    }

    public function getIndex(){
        $advs = Advertiserment::all();

    	$saleOffBook = Book::where('sale', '>', 0)->inRandomOrder()->take(3)->get();

    	$newBook = Book::orderBy('publishing_year', 'DESC')->take(16)->inRandomOrder()->get();

    	$bestSellerBooks = Book::where('inventory_number', '>', '0')
    			->join('book_order', 'book.id', '=','book_order.book_id')
    			->select('book.id', 'book.title','book.price', 'book.sale',
    					DB::raw('count(book_order.book_id) as sales_count'))
    			->groupBy('book_order.book_id', 'book.id', 'book.title','book.price', 'book.sale')
    			->orderBy('sales_count', 'desc')
    			->take(4)
    			->get();
        if(count($bestSellerBooks) == 0){
            $bestSellerBooks = Book::take(4)->get();
        }

    	$recommendBook = array();

    	if(Auth::check() && count(Order::where('user_id', Auth::user()->id)->get()) > 0){
    		//$purcharsedID: table(id, count(id))->orderBy(desc): lay ra record chua id xuat hien nhieu nhat trong hoa don, id o day co the la id cua Author, Topic, Category

    		$purcharsedAuthorID = DB::table('book')
    						->join('book_order', 'book.id', '=','book_order.book_id')
    						->join('order', 'order.id', '=', 'book_order.order_id')
    						->where('user_id', Auth::user()->id)
    						->select('book.id')
							->groupBy('book.id')
    						->join('author_book', 'book.id', '=', 'author_book.book_id')
    						->select('author_book.author_id', DB::raw('count(author_book.author_id) as book_count'))
    						->groupBy('author_book.author_id')
    						->orderBy('book_count', 'desc')
    						->first();
    		
    		$recommendAuthor = Author::with('Book')->where('id', $purcharsedAuthorID->author_id)->first();
    		
    		$purcharsedTopicID = DB::table('book')
    						->join('book_order', 'book.id', '=','book_order.book_id')
    						->join('order', 'order.id', '=', 'book_order.order_id')
    						->where('user_id', Auth::user()->id)
    						->select('book.id')
							->groupBy('book.id')
							->join('book_topic', 'book.id', '=', 'book_topic.book_id')
    						->select('book_topic.topic_id', DB::raw('count(book_topic.topic_id) as book_count'))
    						->groupBy('book_topic.topic_id')
    						->orderBy('book_count', 'desc')
    						->first();
    		$recommendTopic = Topic::with('Book')->where('id', $purcharsedTopicID->topic_id)->first();

    		$purcharsedCategoryID = DB::table('book')
    						->join('book_order', 'book.id', '=','book_order.book_id')
    						->join('order', 'order.id', '=', 'book_order.order_id')
    						->where('user_id', Auth::user()->id)
    						->select('book.id')
							->groupBy('book.id')
							->join('book_category', 'book.id', '=', 'book_category.book_id')
    						->select('book_category.category_id', DB::raw('count(book_category.category_id) as book_count'))
    						->groupBy('book_category.category_id')
    						->orderBy('book_count', 'desc')
    						->first();
    		$recommendCategory = Category::with('Book')->where('id', $purcharsedCategoryID->category_id)->first();

    		$recommendBook = array();
    		//merge 3 mang thanh 1 mang $recommendBook, luc nay mang bi trung lap nhieu
    		foreach($recommendAuthor->Book as $book){
    			array_push($recommendBook, $book);
    		}
    		foreach($recommendTopic->Book as $book){
    			array_push($recommendBook, $book);
    		}
    		foreach($recommendCategory->Book as $book){
    			array_push($recommendBook, $book);
    		}
    		//loc cac phan tu duplicate cua mang
    		$deleteArr = array();
    		for($i = 0; $i < count($recommendBook); $i++){
    			for($j = $i + 1; $j < count($recommendBook); $j++){
    				if($recommendBook[$i]->id == $recommendBook[$j]->id){
    					array_push($deleteArr, $j);
    				}
    			}
    		}
    		$deleteArr = array_unique($deleteArr);
    		
    		foreach($deleteArr as $id){
    			unset($recommendBook[$id]);
    		}	
    	}

      	return view('client\home', compact('saleOffBook', 'newBook', 'bestSellerBooks', 'recommendBook', 'advs'));
    }
}
