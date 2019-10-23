<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Author;


class AuthorController extends Controller
{
    public function getIndex(){
    	$allAuthor = Author::all();
    	return view('admin\book\book_author_list', compact('allAuthor'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:author,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên tác giả',
            'value.unique'=>'Tác giả đã tồn tại'
        ]);

    	$author = new Author;
    	$author->name = $request->value;
    	$author->save();
    	return redirect('admin/books/author')->with('message', 'Thêm tác giả thành công');
    }

    public function getEdit($id){
    	$allAuthor = Author::all();
    	$edit_author = Author::where('id', $id)->first();
    	return view('admin\book\book_author_edit', compact('edit_author', 'allAuthor'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:author,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên tác giả',
            'value.unique'=>'Tác giả đã tồn tại'
        ]);

    	$author = Author::find($id);
    	$author->name = $request->value;
    	$author->save();
    	return redirect('admin/books/author');
    }

    public function delete($id){
        $author = Author::find($id);
        $author->delete();

        return redirect('admin/books/author');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allAuthor = Author::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_author_list', compact('allAuthor'));
        }
        return redirect('admin/books/author');
    }
    public function getSearch(){
        return redirect('admin/books/author');
    }
}
