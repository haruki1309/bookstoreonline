<?php
namespace App\Http\Controllers\Admin;

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

class BookController extends Controller
{
    public function getIndex(){ 	
    	$books = Book::all();

    	return view('admin/bookwarehouse', compact('books'));
    }

    public function getAddBook(){
    	$publishingCompany = PublishingCompany::all();
    	$publisher = Publisher::all();
    	$language = Language::all();
    	$age = Age::all();
    	$author = Author::all();
        $translator = Translator::all();
    	$topic = Topic::all();
    	$category = Category::all();

    	return view('admin/book/book_new', 
    		compact('publishingCompany', 'publisher', 
    			'language', 'age', 'author', 'translator', 'topic', 'category'));
    }

    public function postAddBook(Request $request){
        $this->validate($request, [
            'title'=>'required | max:100',
            'publishingCompany'=>'required',
            'publisher'=>'required',
            'language'=>'required',
            'cover'=>'required',
            'year'=>'required | numeric',
            'size'=>'required',
            'pages'=>'required | numeric | min:1',
            'age'=>'required',
            'inventory'=>'required | numeric |min:1',
            'intro'=>'required',
            'price'=>'required | numeric | min:0',
            'sale'=>'required | numeric | min:0 | max:100',
            'author'=>'required',
            'topic'=>'required',
            'category'=>'required',
            'image'=>'required'
        ], [
            'title.required'=>'Bạn chưa nhập tên sách',
            'title.max'=>'Tên sách không được dài hơn 100 kí tự',

            'publishingCompany.required'=>'Bạn chưa nhập tên Nhà Xuất Bản',
            'publisher.required'=>'Bạn chưa nhập tên Nhà Phát Hành',

            'language.required'=>'Bạn chưa nhập loại ngôn ngữ',

            'cover.required'=>'Bạn chưa nhập loại bìa',

            'year.required'=>'Bạn chưa nhập năm xuất bản',
            'year.numeric'=>'Năm xuất bản phải là chữ số',

            'size.required'=>'Bạn chưa nhập kích thước quyển sách',

            'pages.required'=>'Bạn chưa nhập số trang',
            'pages.numeric'=>'Số trang phải là chữ số',
            'pages.min'=>'Số trang phải lớn hơn 1',

            'age.required'=>'Bạn chưa nhập độ tuổi',

            'inventory.required'=>'Bạn chưa nhập số lượng sách',
            'inventory.numeric'=>'Số lượng sách phải là chữ số',
            'inventory.min'=>'Số lượng sách phải lớn hơn 1',

            'intro.required'=>'Bạn chưa nhập giới thiệu',

            'price.required'=>'Bạn chưa nhập giá bìa',
            'price.numeric'=>'Giá bìa phải là chữ số',
            'price.min'=>'Giá bìa phải lớn hơn 0',

            'sale.required'=>'Bạn chưa nhập mức giảm giá',
            'sale.numeric'=>'Mức giảm giá cần là chữ số',
            'sale.min'=>'Mức giảm giá cần lớn hơn hoặc bằng 0',
            'sale.max'=>'Mức giảm giá cần nhỏ hơn hoặc bằng 100',

            'author.required'=>'Bạn chưa nhập tên tác giả',

            'topic.required'=>'Bạn chưa nhập chủ đề',

            'category.required'=>'Bạn chưa nhập thể loại',

            'image.required'=>'Bạn chưa chọn hình ảnh'
        ]);

        $book = new Book;

        $book->title = $request->title;

        //nha xuat ban, nha phat hanh, ngon ngu la moi quan he 1 - n

        $publishingCompany = PublishingCompany::where('name', $request->publishingCompany)->first();

        $book->publishing_company_id = $publishingCompany->id;

        $publisher = Publisher::where('name', $request->publisher)->first();

        $book->publisher_id = $publisher->id;

        $language = Language::where('name', $request->language)->first();

        $book->language_id = $language->id;

        $age = Age::where('name', $request->age)->first();

        $book->age_id = $age->id;

        $book->book_cover = $request->cover;

        $book->publishing_year = $request->year;

        $book->book_cover_size = $request->size;

        $book->introduction = $request->intro;

        $book->number_of_pages = $request->pages;

        $book->inventory_number = $request->inventory;

        $book->price = $request->price;

        $book->sale = $request->sale;

        $book->save();

        for($i = 0; $i < count($request->author); $i++){
            $author = Author::where('name', $request->author[$i])->first();

            $book->Author()->attach($author->id);
        }

        for($i = 0; $i < count($request->translator); $i++){
            if(strcmp($request->translator[$i], 'None') != 0){
                $translator = Translator::where('name', $request->translator[$i])->first();
                $book->Translator()->attach($translator->id);
            }
        }

        for($i = 0; $i < count($request->topic); $i++){
            $topic = Topic::where('name', $request->topic[$i])->first();

            $book->Topic()->attach($topic->id);
        }

        for($i = 0; $i < count($request->category); $i++){
            $category = Category::where('name', $request->category[$i])->first();

            $book->Category()->attach($category->id);
        }

        if($request->hasFile('image')){
            for($i = 0; $i < count($request->image); $i++){
                $file = $request->file('image');
                $imageName = $file[$i]->getClientOriginalName();

                $savedName = str_random(4)."_".$imageName;

                while(file_exists('1234_db_img/'.$savedName)){
                    $savedName = str_random(4)."_".$imageName;
                }

                $file[$i]->move('1234_db_img', $savedName);

                $image = new Picture;
               
                $image->book_id = $book->id;
                $image->link = $savedName;

                $image->save();
            }
        }

        return redirect('admin/books/new')->with('message', 'Thêm sách thành công');
    }

    public function getEditBook($id){
        $publishingCompany = PublishingCompany::all();
        $publisher = Publisher::all();
        $language = Language::all();
        $age = Age::all();
        $author = Author::all();
        $translator = Translator::all();
        $topic = Topic::all();
        $category = Category::all();

        $book = Book::where('id', $id)->first();

        return view('admin/book/book_edit', 
            compact('publishingCompany', 
                'publisher', 
                'language', 
                'age', 
                'author', 
                'translator', 
                'topic', 
                'category',
                'book'
            ));
    }

    public function postEditBook(Request $request, $id){
        $this->validate($request, [
            'title'=>'required | max:100',
            'publishingCompany'=>'required',
            'publisher'=>'required',
            'language'=>'required',
            'cover'=>'required',
            'year'=>'required | numeric',
            'size'=>'required',
            'pages'=>'required | numeric | min:1',
            'age'=>'required',
            'inventory'=>'required | numeric |min:1',
            'intro'=>'required',
            'price'=>'required | numeric | min:0',
            'sale'=>'required | numeric | min:0 | max:100',
            'author'=>'required',
            'topic'=>'required',
            'category'=>'required'
        ], [
            'title.required'=>'Bạn chưa nhập tên sách',
            'title.max'=>'Tên sách không được dài hơn 100 kí tự',

            'publishingCompany.required'=>'Bạn chưa nhập tên Nhà Xuất Bản',
            'publisher.required'=>'Bạn chưa nhập tên Nhà Phát Hành',

            'language.required'=>'Bạn chưa nhập loại ngôn ngữ',

            'cover.required'=>'Bạn chưa nhập loại bìa',

            'year.required'=>'Bạn chưa nhập năm xuất bản',
            'year.numeric'=>'Năm xuất bản phải là chữ số',

            'size.required'=>'Bạn chưa nhập kích thước quyển sách',

            'pages.required'=>'Bạn chưa nhập số trang',
            'pages.numeric'=>'Số trang phải là chữ số',
            'pages.min'=>'Số trang phải lớn hơn 1',

            'age.required'=>'Bạn chưa nhập độ tuổi',
        
            'inventory.required'=>'Bạn chưa nhập số lượng sách',
            'inventory.numeric'=>'Số lượng sách phải là chữ số',
            'inventory.min'=>'Số lượng sách phải lớn hơn 1',

            'intro.required'=>'Bạn chưa nhập giới thiệu',

            'price.required'=>'Bạn chưa nhập giá bìa',
            'price.numeric'=>'Giá bìa phải là chữ số',
            'price.min'=>'Giá bìa phải lớn hơn 0',

            'sale.required'=>'Bạn chưa nhập mức giảm giá',
            'sale.numeric'=>'Mức giảm giá cần là chữ số',
            'sale.min'=>'Mức giảm giá cần lớn hơn hoặc bằng 0',
            'sale.max'=>'Mức giảm giá cần nhỏ hơn hoặc bằng 100',

            'author.required'=>'Bạn chưa nhập tên tác giả',

            'topic.required'=>'Bạn chưa nhập chủ đề',

            'category.required'=>'Bạn chưa nhập thể loại'
        ]);

        $book = Book::find($id);

        $book->title = $request->title;

        //nha xuat ban, nha phat hanh, ngon ngu la moi quan he 1 - n
        //Neu truy van da ton tai record trong cac ban thi lay id do luu vao sach
        //Nguoc lai thi tao moi record roi luu id vao sach

        $publishingCompany = PublishingCompany::where('name', $request->publishingCompany)->first();
        $book->publishing_company_id = $publishingCompany->id;

        $publisher = Publisher::where('name', $request->publisher)->first();
        $book->publisher_id = $publisher->id;

        $language = Language::where('name', $request->language)->first();
        $book->language_id = $language->id;

        $age = Age::where('name', $request->age)->first();
        $book->age_id = $age->id;

        $book->book_cover = $request->cover;

        $book->publishing_year = $request->year;

        $book->book_cover_size = $request->size;

        $book->introduction = $request->intro;

        $book->number_of_pages = $request->pages;

        $book->inventory_number = $request->inventory;

        $book->price = $request->price;

        $book->sale = $request->sale;

        $book->save();

        $book->Author()->detach();
        for($i = 0; $i < count($request->author); $i++){
            $author = Author::where('name', $request->author[$i])->first();
            $book->Author()->attach($author->id);
        }

        $book->Translator()->detach();
        for($i = 0; $i < count($request->translator); $i++){
            if(strcmp($request->translator[$i], 'None') != 0){
                $translator = Translator::where('name', $request->translator[$i])->first();
                $book->Translator()->attach($translator->id);
            }     
        }

        $book->Topic()->detach();
        for($i = 0; $i < count($request->topic); $i++){
            $topic = Topic::where('name', $request->topic[$i])->first();
            $book->Topic()->attach($topic->id);
        }

        $book->Category()->detach();
        for($i = 0; $i < count($request->category); $i++){
            $category = Category::where('name', $request->category[$i])->first();
            $book->Category()->attach($category->id);
        }

        if($request->hasFile('image')){
            //neu co chon file thi cap nhat lai list pic
            //1. xoa het list
            for($i = 0; $i < count($book->Picture); $i++){
                unlink('1234_db_img/'.$book->Picture[$i]->link);
                $book->Picture[$i]->delete();   
            }
            //2. add lai
            for($i = 0; $i < count($request->image); $i++){
                $file = $request->file('image');
                $imageName = $file[$i]->getClientOriginalName();

                $savedName = str_random(4)."_".$imageName;

                while(file_exists('1234_db_img/'.$savedName)){
                    $savedName = str_random(4)."_".$imageName;
                }

                $file[$i]->move('1234_db_img', $savedName);

                $image = new Picture;
               
                $image->book_id = $book->id;
                $image->link = $savedName;

                $image->save();
            }
        }

        return redirect('admin/books/edit/'.$id)->with('message', 'Sửa sách thành công');
    }

    public function getSearch(){
        return redirect('admin/books');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allBook = Book::where('title', 'like', "%$request->searchkey%")->get();

            return view('admin\book\book_list', compact('allBook'));
        }
        return redirect('admin/books');
    }
}
