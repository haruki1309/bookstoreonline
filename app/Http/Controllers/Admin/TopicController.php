<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\Topic;
use App\Models\Book;

class TopicController extends Controller
{
    public function index(Request $request){
        $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        $can_create = $request->can_create;
        if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $viewName = "chủ đề";
        if(request()->ajax()) {
            $topics = Topic::select('*');

            return datatables()->of($topics)
            ->addColumn('action', function($topics){
                $id = $topics->id;
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
        $topic  = Topic::where($where)->first();
        return Response::json($topic);
    }

    public function store(Request $request)
    {  
        $data = Topic::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $topic = Topic::where('id', '=', $id)->first();

        if(count($topic->Book) > 0){
            return Response::json("error");
        }
        $topic->delete(); 
        return Response::json("success");  
    }
}
