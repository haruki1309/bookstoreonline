<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect,Response;
use App\Models\Translator;
use App\Models\Book;

class TranslatorController extends Controller
{
   public function index(){
        $viewName = "dịch giả";
        if(request()->ajax()) {
            $translators = Translator::select('*');

            return datatables()->of($translators)
            ->addColumn('action', function($translators){
                $id = $translators->id;
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
        $Translator  = Translator::where($where)->first();
        return Response::json($Translator);
    }

    public function store(Request $request)
    {  
        $data = Translator::updateOrCreate(['id'=>$request->id], ['name'=>$request->name]);   
        return Response::json($data);
    }

    public function delete($id){
        $Translator = Translator::where('id', '=', $id)->first();

        if(count($Translator->Book) > 0){
            return Response::json("error");
        }
        $Translator->delete();
        return Response::json("success");  
    }
}
