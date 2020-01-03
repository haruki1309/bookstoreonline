<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    public function index(Request $re){
        $viewName = "tác giả";
        if($re->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
    	if(request()->ajax()) {
            $authors = Author::select('*');
                
            return datatables()->of($authors)
            ->addColumn('action', function($authors){
                $id = $authors->id;
                return (string)view('admin/bookinfo/action', compact('id'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    	return view('admin\bookinfo\bookinfo', compact('viewName'));
    }
      
    public function edit( $id)
    {   
      
        $where = array('id' => $id);
        $author  = Author::where($where)->first();
        return Response::json($author);
    }

    public function store(Request $request)
    {  
        $data = Author::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id,Request $re){
        if($re->can_read==0){
           return redirect('admin/author')->with('message', 'Bạn không có quyền xóa'); 
        }
        $author = Author::where('id', '=', $id)->first();

        if(count($author->Book) > 0){
            return Response::json("error");
        }
        $author->delete();
        return Response::json("success");  
    }
}
