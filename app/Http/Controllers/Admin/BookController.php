<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

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
     // public function login(){
     //    Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password]);
     //    return redirect('admin/book/warehouse');
     // }

    public function getIndex(Request $request){
        Auth::guard('admin')->attempt(['username'=>'admin','password'=>'admin']);
        $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        $can_create = $request->can_create;
    	$books = Book::all();

    	return view('admin/book/bookwarehouse', compact('books','can_edit','can_delete','can_create'));
    }

    public function getAddBook(Request $request){
    	$publishingCompany = PublishingCompany::all();
    	$publisher = Publisher::all();
    	$language = Language::all();
    	$age = Age::all();
    	$author = Author::all();
        $translator = Translator::all();
    	$topic = Topic::all();
    	$category = Category::all();

        $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;

    	return view('admin/book/addbook', 
    		compact('publishingCompany', 'publisher', 
    			'language', 'age', 'author', 'translator', 'topic', 'category', 'can_edit','can_delete'));
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

            'author.required'=>'Bạn chưa nhập tên tác giả',

            'topic.required'=>'Bạn chưa nhập chủ đề',

            'category.required'=>'Bạn chưa nhập thể loại',

            'image.required'=>'Bạn chưa chọn hình ảnh'
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->publishing_company_id = $request->publishingCompany;
        $book->publisher_id = $request->publisher;
        $book->language_id = $request->language;
        $book->age_id = $request->age;
        $book->book_cover = $request->cover;
        $book->publishing_year = $request->year;
        $book->book_cover_size = $request->size;
        $book->introduction = $request->intro;
        $book->number_of_pages = $request->pages;
        $book->inventory_number = $request->inventory;
        $book->price = $request->price;
        $book->sale = 0;
        $book->created_at = date("Y-m-d");
        $book->save();

        $book->Author()->attach($request->author);
        $book->Translator()->attach($request->translator);
        $book->Topic()->attach($request->topic);
        $book->Category()->attach($request->category);

        if($request->hasFile('image')){ 
            $files = $request->file('image');

            foreach($files as $file){
                $imageName = $file->getClientOriginalName();

                $savedName = Str::random(4)."_".$imageName;

                while(file_exists('1234_db_img/'.$savedName)){
                    $savedName = Str::random(4)."_".$imageName;
                }

                $file->move('1234_db_img', $savedName);

                $image = new Picture;
               
                $image->book_id = $book->id;
                $image->link = $savedName;

                $image->save();
            }   
        }

        return redirect()->back()->with('message', "Thêm sách thành công");
    }

    public function getEditBook(Request $request, $id){
        $publishingCompany = PublishingCompany::all();
        $publisher = Publisher::all();
        $language = Language::all();
        $age = Age::all();
        $author = Author::all();
        $translator = Translator::all();
        $topic = Topic::all();
        $category = Category::all();

        $book = Book::find($id);

        $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;

        return view('admin/book/editbook', 
            compact('publishingCompany', 
                'publisher', 
                'language', 
                'age', 
                'author', 
                'translator', 
                'topic', 
                'category',
                'book',
                'can_edit',
                'can_delete'
            ));
    }

    public function postEditBook(Request $request, $id){
        $this->validate($request, [
            'title'=>'required | max:100',
            'sale'=>'required|numeric|min:0|max:100',
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
            'author'=>'required',
            'topic'=>'required',
            'category'=>'required'
        ], [
            'title.required'=>'Bạn chưa nhập tên sách',
            'title.max'=>'Tên sách không được dài hơn 100 kí tự',

            'sale.required'=>'Bạn chưa nhập mức giảm giá',
            'sale.numeric'=>'Mức giảm giá cần là chữ số',
            'sale.min'=>'Mức giảm giá cần lớn hơn hoặc bằng 0',
            'sale.max'=>'Mức giảm giá cần nhỏ hơn hoặc bằng 100',

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

            'author.required'=>'Bạn chưa nhập tên tác giả',

            'topic.required'=>'Bạn chưa nhập chủ đề',

            'category.required'=>'Bạn chưa nhập thể loại'
        ]);
        
        $book = Book::find($id);

        $book->title = $request->title;
        $book->publishing_company_id = $request->publishingCompany;
        $book->publisher_id = $request->publisher;
        $book->language_id = $request->language;
        $book->age_id = $request->age;
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
        $book->Author()->attach($request->author);

        $book->Translator()->detach();
        $book->Translator()->attach($request->translator);

        $book->Topic()->detach();
        $book->Topic()->attach($request->topic);

        $book->Category()->detach();
        $book->Category()->attach($request->category);

        if($request->hasFile('image')){
            //neu co chon file thi cap nhat lai list pic
            //1. xoa het list
            for($i = 0; $i < count($book->Picture); $i++){
                unlink('1234_db_img/'.$book->Picture[$i]->link);
                $book->Picture[$i]->delete();   
            }
            //2. add lai
            $files = $request->file('image');

            foreach($files as $file){
                $imageName = $file->getClientOriginalName();

                $savedName = Str::random(4)."_".$imageName;

                while(file_exists('1234_db_img/'.$savedName)){
                    $savedName = Str::random(4)."_".$imageName;
                }

                $file->move('1234_db_img', $savedName);

                $image = new Picture;
               
                $image->book_id = $book->id;
                $image->link = $savedName;

                $image->save();
            }   
        }

        return redirect()->back()->with('message', 'Sửa sách thành công');
    }
}
