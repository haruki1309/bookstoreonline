<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\Author;
use App\Models\Translator;
use App\Models\PublishingCompany;
use App\Models\Publisher;
use App\Models\Language;
use App\Models\Age;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Picture;
use App\Models\Advertiserment;

class SearchController extends Controller
{
    public function postSearch(Request $request){
    	$key = $request->searchField;

    	$viewName = 'Kết quả tìm kiếm: '.$key;

    	if($key == ''){
    		//reload current page
    		return redirect()->back();
    	}

    	$book = Book::where('title', 'like', "%$key%")->get();
        $authors = Author::where('name', 'like', "%$key%")->get();
        $publishers = Publisher::where('name', 'like', "%$key%")->get();
        $publishingComs = PublishingCompany::where('name', 'like', "%$key%")->get();

        // if(count($authors) > 0){
        //     foreach ($authors as $author) {
        //         $book = array_merge($book->toArray(), $author->Book->toArray());
        //     }
        // }

        // if(count($publishers) > 0){
        //     foreach ($publishers as $publisher) {
        //         $book = array_merge($book->toArray(), $publisher->Book->toArray());
        //     }
        // }

        // if(count($publishingComs) > 0){
        //     foreach ($publishingComs as $publishingCom) {
        //         $book = array_merge($book->toArray(), $publishingCom->Book->toArray());
        //     }
        // }

        return view('client\result', compact('viewName', 'book'));
    }

    public function getSearch(){
    	return redirect('/homepage');
    }

    public function searchByObject($object, $id){

    	switch ($object) {
    		case 'author':
    			$author = Author::where('id', $id)->first();
    			$books = $author->Book;
    			$viewname = 'Tác giả: '.$author->name;
    			break;

    		case 'translator':
    			$translator = Translator::where('id', $id)->first();
    			$books = $translator->Book;
    			$viewname = 'Dịch giả: '.$translator->name;
    			break;

    		case 'publisher':
    			$publisher = Publisher::where('id', $id)->first();
    			$books = $publisher->Book;
    			$viewname = 'Nhà phát hành: '.$publisher->name;
    			break;

    		case 'publishingcom':
    			$publishingcom = PublishingCompany::where('id', $id)->first();
    			$books = $publishingcom->Book;
    			$viewname = 'Nhà xuất bản: '.$publishingcom->name;
    			break;

    		case 'language':
    			$language = Language::where('id', $id)->first();
    			$books = $language->Book;
    			$viewname = 'Ngôn ngữ: '.$language->name;
    			break;

    		case 'age':
    			$age = Age::where('id', $id)->first();
    			$books = $age->Book;
    			$viewname = 'Độ tuổi: '.$age->name;
    			break;

    		case 'topic':
    			$topic = Topic::where('id', $id)->first();
    			$books = $topic->Book;
    			$viewname = 'Chủ đề: '.$topic->name;
    			break;

    		case 'category':
    			$category = Category::where('id', $id)->first();
    			$books = $category->Book;
    			$viewname = 'Thể loại: '.$category->name;
    			break;

            case 'advertiserment':
                $adv = Advertiserment::where('id', $id)->first();
                $books = $adv->Book;
                $viewname = $adv->title;
                break;

    		default:
    			# code...
    			break;
    	}

    	return view('client\list', compact('viewname', 'books'));
    }

    public function getSaleOff(){
        $book = Book::where('sale', '>', '0')->orderBy('sale', 'DESC')->get();
        $viewName = 'Sách đang khuyến mãi';

        return view('client\result', compact('viewName', 'book'));
    }
}
