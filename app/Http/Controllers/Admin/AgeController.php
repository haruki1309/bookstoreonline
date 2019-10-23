<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Age;

class AgeController extends Controller
{
    public function getIndex(){
    	$allAge = Age::all();
    	return view('admin\book\book_age_list', compact('allAge'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:age,name'
        ], [
            'value.required'=>'Bạn chưa nhập độ tuổi',
            'value.unique'=>'Độ tuổi đã tồn tại'
        ]);

    	$age = new Age;
    	$age->name = $request->value;
    	$age->save();
    	return redirect('admin/books/age')->with('message', 'Thêm độ tuổi thành công');
    }

    public function getEdit($id){
    	$allAge = Age::all();
    	$edit_age = Age::where('id', $id)->first();
    	return view('admin\book\book_age_edit', compact('edit_age', 'allAge'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:age,name'
        ], [
            'value.required'=>'Bạn chưa nhập độ tuổi',
            'value.unique'=>'Độ tuổi đã tồn tại'
        ]);

    	$age = Age::find($id);
    	$age->name = $request->value;
    	$age->save();
    	return redirect('admin/books/age');
    }

    public function delete($id){
        $age = Age::find($id);
        $age->delete();

        return redirect('admin/books/age');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allAge = Age::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_age_list', compact('allAge'));
        }
        return redirect('admin/books/age');
    }
    public function getSearch(){
        return redirect('admin/books/age');
    }
}
