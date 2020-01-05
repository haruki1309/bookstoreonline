<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\PublishingCompany;

class NXBController extends Controller
{
    public function getIndex(Request $request){
          $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
    	$allNXB = PublishingCompany::all();
    	return view('admin\book\book_nxb_list', compact('allNXB','can_edit','can_delete'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:publishing_company,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên nhà xuất bản',
            'value.unique'=>'Nhà xuất bản đã tồn tại'
        ]);

    	$nxb = new PublishingCompany;
    	$nxb->name = $request->value;
    	$nxb->save();
    	return redirect('admin/books/nxb')->with('message', 'Thêm nhà xuất bản thành công');
    }

    public function getEdit($id){
    	$allNXB = PublishingCompany::all();
    	$edit_nxb = PublishingCompany::where('id', $id)->first();
    	return view('admin\book\book_nxb_edit', compact('edit_nxb', 'allNXB'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:publishing_company,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên nhà xuất bản',
            'value.unique'=>'Nhà xuất bản đã tồn tại'
        ]);

    	$nxb = PublishingCompany::find($id);
    	$nxb->name = $request->value;
    	$nxb->save();
    	return redirect('admin/books/nxb');
    }

    public function delete($id){
        $nxb = PublishingCompany::find($id);
        $nxb->delete();

        return redirect('admin/books/nxb');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allNXB = PublishingCompany::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_nxb_list', compact('allNXB'));
        }
        return redirect('admin/books/nxb');
    }
    public function getSearch(){
        return redirect('admin/books/nxb');
    }
}
