<?php

namespace App\Http\Controllers\Admin;
use Redirect,Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Publisher;
use App\Models\Book;

class NPHController extends Controller
{
    public function index(Request $request){
        $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        $can_create = $request->can_create;
        if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $viewName = "nhà phát hành";
        if(request()->ajax()) {
            $publishers = Publisher::select('*');
            
            return datatables()->of($publishers)
            ->addColumn('action', function($publishers){
                $id = $publishers->id;
                return (string)view('admin/bookinfo/action', compact('id'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);

        }
        return view('admin\bookinfo\bookinfo', compact('viewName','can_edit','can_delete','can_create'));
    }
      
    public function edit($id)
    {   
        $where = array('id' => $id);
        $publisher  = Publisher::where($where)->first();
        return Response::json($publisher);
    }

    public function store(Request $request)
    {  
        $data = Publisher::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $publisher = Publisher::where('id', '=', $id)->first();

        if(count($publisher->Book) > 0){
            return Response::json("error");
        }
        $publisher->delete();
        return Response::json("success");  
    }
}
