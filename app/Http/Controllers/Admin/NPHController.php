<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Publisher;

class NPHController extends Controller
{
    public function getIndex(Request $request){
          $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
    	$allNPH = Publisher::all();
    	return view('admin\book\book_nph_list', compact('allNPH','can_edit','can_delete'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:publisher,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên nhà phát hành',
            'value.unique'=>'Nhà phát hành đã tồn tại'
        ]);

    	$nph = new Publisher;
    	$nph->name = $request->value;
    	$nph->save();
    	return redirect('admin/books/nph')->with('message', 'Thêm nhà phát hành thành công');
    }

    public function getEdit($id){
    	$allNPH = Publisher::all();
    	$edit_nph = Publisher::where('id', $id)->first();
    	return view('admin\book\book_nph_edit', compact('edit_nph', 'allNPH'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:publisher,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên nhà phát hành',
            'value.unique'=>'Nhà phát hành đã tồn tại'
        ]);

    	$nph = Publisher::find($id);
    	$nph->name = $request->value;
    	$nph->save();
    	return redirect('admin/books/nph');
    }

    public function delete($id){
        $nph = Publisher::find($id);
        $nph->delete();

        return redirect('admin/books/nph');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allNPH = Publisher::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_nph_list', compact('allNPH'));
        }
        return redirect('admin/books/nph');
    }
    public function getSearch(){
        return redirect('admin/books/nph');
    }
}
