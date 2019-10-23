<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Language;

class LanguageController extends Controller
{
	public function getIndex(){
    	$allLanguage = Language::all();
    	return view('admin\book\book_language_list', compact('allLanguage'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:language,name'
        ], [
            'value.required'=>'Bạn chưa nhập ngôn ngữ',
            'value.unique'=>'Ngôn ngữ đã tồn tại'
        ]);

    	$language = new Language;
    	$language->name = $request->value;
    	$language->save();
    	return redirect('admin/books/language')->with('message', 'Thêm ngôn ngữ thành công');
    }

    public function getEdit($id){
    	$allLanguage = Language::all();
    	$edit_language = Language::where('id', $id)->first();
    	return view('admin\book\book_language_edit', compact('edit_language', 'allLanguage'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:language,name'
        ], [
            'value.required'=>'Bạn chưa nhập ngôn ngữ',
            'value.unique'=>'Ngôn ngữ đã tồn tại'
        ]);

    	$language = Language::find($id);
    	$language->name = $request->value;
    	$language->save();
    	return redirect('admin/books/language');
    }

    public function delete($id){
        $language = Language::find($id);
        $language->delete();

        return redirect('admin/books/language');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allLanguage = Language::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_language_list', compact('allLanguage'));
        }
        return redirect('admin/books/language');
    }
    public function getSearch(){
        return redirect('admin/books/language');
    }
}
