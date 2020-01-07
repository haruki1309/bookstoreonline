<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Advertiserment;

class AdvController extends Controller
{
    public function index(Request $re){
    	$all = Advertiserment::orderBy('endDate', 'desc')->get();
        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete =$re->can_delete;
        $can_create =$re->can_create;
        $viewname = 'quảng cáo';

    	return view('admin\ads\index', compact('all','can_read','can_edit','can_delete','can_create'));
    }
    public function getCreate(){
    	return view('admin\adv\adv_create');
    }

    public function ajaxSearch(Request $request){
    	$key = $request->keysearch;
    	$books = Book::where('title', 'like', "%$key%")->get();
    	$books_arr = array();

    	foreach($books as $book){
    		$books_arr[] = array('id'=>$book->id
    							,'title'=>$book->title
    							,'author'=>$book->Author[0]->name
    							,'publishing_com'=>$book->PublishingCompany->name
    							,'publisher'=>$book->Publisher->name
    							,'discount'=>$book->sale);
    	}

    	return response()->json($books_arr);
    }

    public function edit(Request $request){
        
        if($request->type == 'edit'){
            AdvController::postEdit($request,$request->id);
        }else
        if($request->type=='create'){
            AdvController::postAdvertiserment($request,$request->id);
        }
    }

    public function postAdvertiserment(Request $request){
    	$this->validate($request, [
            'title'=>'required | max:100',
            'detail'=>'required | max:100',
            'startDate'=>'required | date_format:Y-m-d',
            'endDate'=>'required | date_format:Y-m-d',
            'image'=>'required'
        ], [
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.max'=>'Tiêu đề không được dài hơn 100 kí tự',

            'title.required'=>'Bạn chưa nhập mô tả',
            'title.max'=>'Mô tả không được dài hơn 100 kí tự',

            'startDate.required'=>'Bạn chưa nhập ngày bắt đầu',
            'startDate.date_format' =>'Sai định dạng ngày bắt đầu (Y-m-d)',

            'endDate.required'=>'Bạn chưa nhập ngày kết thúc',
            'endDate.date_format' =>'Sai định dạng ngày kết thúc (Y-m-d)',

            'image.required'=>'Chưa chọn hình ảnh',
        ]);

        if(!$request->bookID){
        	return redirect()->back()->with('bookerror', 'Chưa chọn sách');
        }
        else if(count($request->bookID) > 0){
        	$ad = new Advertiserment;

        	$ad->title = $request->title;
        	$ad->detail =  $request->detail;
        	$ad->startDate = $request->startDate;
        	$ad->endDate = $request->endDate;

        	if($request->hasFile('image')){
	            $file = $request->file('image');
                $imageName = $file->getClientOriginalName();

                $savedName = str_random(4)."_".$imageName;

                while(file_exists('1234_db_img/advertiserment'.$savedName)){
                    $savedName = str_random(4)."_".$imageName;
                }

                $file->move('1234_db_img/advertiserment', $savedName);
                $ad->image_link = $savedName;
	        }

	        $ad->save();

	        for($i = 0; $i < count($request->bookID); $i++){
	        	$ad->Book()->attach($request->bookID[$i]);
	        }

	        return redirect()->back()->with('message', 'Thêm quảng cáo thành công');
        }
    }

    public function getEdit($id){
    	$adv = Advertiserment::where('id', $id)->first();

    	return view('admin\adv\adv_edit', compact('adv'));
    }

    public function postEdit(Request $request, $id){
    	$this->validate($request, [
            'title'=>'required | max:100',
            'detail'=>'required | max:100',
            'startDate'=>'required | date_format:Y-m-d',
            'endDate'=>'required | date_format:Y-m-d'
        ], [
            'title.required'=>'Bạn chưa nhập tiêu đề',
            'title.max'=>'Tiêu đề không được dài hơn 100 kí tự',

            'title.required'=>'Bạn chưa nhập mô tả',
            'title.max'=>'Mô tả không được dài hơn 100 kí tự',

            'startDate.required'=>'Bạn chưa nhập ngày bắt đầu',
            'startDate.date_format' =>'Sai định dạng ngày bắt đầu (Y-m-d)',

            'endDate.required'=>'Bạn chưa nhập ngày kết thúc',
            'endDate.date_format' =>'Sai định dạng ngày kết thúc (Y-m-d)',
        ]);

        if(!$request->bookID){
        	return redirect()->back()->with('bookerror', 'Chưa chọn sách');
        }
        else if(count($request->bookID) > 0){
        	$ad = Advertiserment::where('id', $id)->first();

        	$ad->title = $request->title;
        	$ad->detail =  $request->detail;
        	$ad->startDate = $request->startDate;
        	$ad->endDate = $request->endDate;

        	if($request->hasFile('image')){
	            $file = $request->file('image');
                $imageName = $file->getClientOriginalName();

                unlink('1234_db_img/advertiserment/'.$ad->image_link);

                $savedName = str_random(4)."_".$imageName;

                while(file_exists('1234_db_img/advertiserment'.$savedName)){
                    $savedName = str_random(4)."_".$imageName;
                }

                $file->move('1234_db_img/advertiserment', $savedName);
                $ad->image_link = $savedName;
	        }

	        $ad->save();

	        $ad->Book()->detach();
	        for($i = 0; $i < count($request->bookID); $i++){
	        	$ad->Book()->attach($request->bookID[$i]);
	        }

	        return redirect()->back()->with('message', 'Sửa quảng cáo thành công');
        }

    }
    public function getDelete($id){
        $adv = Advertiserment::where('id', $id)->first();

        //$adv->delete();

        return redirect()->back();
    }
}
