<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\language;
use App\Models\Book;

class LanguageController extends Controller
{
	public function index(){
        $viewName = "ngôn ngữ";
        if(request()->ajax()) {
            $languages = Language::select('*');

            return datatables()->of($languages)
            ->addColumn('action', function($languages){
                $id = $languages->id;
                return (string)view('admin/bookinfo/action', compact('id'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin\bookinfo\bookinfo', compact('viewName'));
    }
      
    public function edit($id)
    {   
        $where = array('id' => $id);
        $language  = Language::where($where)->first();
        return Response::json($language);
    }

    public function store(Request $request)
    {  
        $data = Language::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $language = Language::where('id', '=', $id)->first();

        if(count($language->Book) > 0){
            return Response::json("error");
        }
        $language->delete();
        return Response::json("success");  
    }
}
