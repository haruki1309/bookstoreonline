<?php

namespace App\Http\Controllers\Admin;
use Redirect,Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\PublishingCompany;
use App\Models\Book;

class NXBController extends Controller
{
    public function index(Request $request){
        $can_edit = $request->can_edit;
        $can_delete = $request->can_delete;
        if($request->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $viewName = "nhà xuất bản";
        if(request()->ajax()) {
            $publishingCompanies = PublishingCompany::select('*');
            
            return datatables()->of($publishingCompanies)
            ->addColumn('action', function($publishingCompanies){
                $id = $publishingCompanies->id;
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
        $publishingCompany  = PublishingCompany::where($where)->first();
        return Response::json($publishingCompany);
    }

    public function store(Request $request)
    {  
        $data = PublishingCompany::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $publishingCompany = PublishingCompany::where('id', '=', $id)->first();

        if(count($publishingCompany->Book) > 0){
            return Response::json("error");
        }
        $publishingCompany->delete();
        return Response::json("success");  
    }
}
