<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\Category;
use App\Models\Book;

class CategoryController extends Controller
{
    public function index(Request $request){
          $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $viewName = "thể loại";
        if(request()->ajax()) {
            $categories = Category::select('*');

            return datatables()->of($categories)
            ->addColumn('action', function($categories){
                $id = $categories->id;
                return (string)view('admin/bookinfo/action', compact('id'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin\bookinfo\bookinfo', compact('viewName','can_edit','can_delete'));
    }
      
    public function edit($id)
    {   
        $where = array('id' => $id);
        $Category  = Category::where($where)->first();
        return Response::json($Category);
    }

    public function store(Request $request)
    {  
        $data = Category::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $Category = Category::where('id', '=', $id)->first();

        if(count($Category->Book) > 0){
            return Response::json("error");
        }
        $Category->delete();
        return Response::json("success");  
    }
}
