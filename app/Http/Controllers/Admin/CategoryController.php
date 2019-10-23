<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function getIndex(){
    	$allCategory = Category::all();
    	return view('admin\book\book_category_list', compact('allCategory'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:category,name'
        ], [
            'value.required'=>'Bạn chưa nhập thể loại',
            'value.unique'=>'Thể loại đã tồn tại'
        ]);

    	$category = new Category;
    	$category->name = $request->value;
    	$category->save();
    	return redirect('admin/books/category')->with('message', 'Thêm thể loại thành công');
    }

    public function getEdit($id){
    	$allCategory = Category::all();
    	$edit_category = Category::where('id', $id)->first();
    	return view('admin\book\book_category_edit', compact('edit_category', 'allCategory'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:category,name'
        ], [
            'value.required'=>'Bạn chưa nhập thể loại',
            'value.unique'=>'Thể loại đã tồn tại'
        ]);

    	$category = Category::find($id);
    	$category->name = $request->value;
    	$category->save();
    	return redirect('admin/books/category');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('admin/books/category');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allCategory = Category::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_category_list', compact('allCategory'));
        }
        return redirect('admin/books/category');
    }
    public function getSearch(){
        return redirect('admin/books/category');
    }
}
