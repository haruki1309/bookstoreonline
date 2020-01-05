<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\Age;
use App\Models\Book;

class AgeController extends Controller
{
    public function index(Request $re){
          $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;
        if($re->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $viewName = "độ tuổi";
        if(request()->ajax()) {
            $ages = Age::select('*');

            return datatables()->of($ages)
            ->addColumn('action', function($ages){
                $id = $ages->id;
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
        $Age  = Age::where($where)->first();
        return Response::json($Age);
    }

    public function store(Request $request)
    {  
        $data = Age::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $Age = Age::where('id', '=', $id)->first();
        if(count($Age->Book) > 0){
            return Response::json("error");
        }
        $Age->delete();
        return Response::json("success");  
    }
}
