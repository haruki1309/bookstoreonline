<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Translator;

class TranslatorController extends Controller
{
    public function getIndex(){
    	$allTranslator = Translator::all();
    	return view('admin\book\book_translator_list', compact('allTranslator'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:translator,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên dịch giả',
            'value.unique'=>'Dịch giả đã tồn tại'
        ]);

    	$translator = new Translator;
    	$translator->name = $request->value;
    	$translator->save();
    	return redirect('admin/books/translator')->with('message', 'Thêm dịch giả thành công');
    }

    public function getEdit($id){
    	$allTranslator = Translator::all();
    	$edit_translator = Translator::where('id', $id)->first();
    	return view('admin\book\book_translator_edit', compact('edit_translator', 'allTranslator'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:translator,name'
        ], [
            'value.required'=>'Bạn chưa nhập tên dịch giả',
            'value.unique'=>'Dịch giả đã tồn tại'
        ]);

    	$translator = Translator::find($id);
    	$translator->name = $request->value;
    	$translator->save();
    	return redirect('admin/books/translator');
    }

    public function delete($id){
        $translator = Translator::find($id);
        $translator->delete();

        return redirect('admin/books/translator');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allTranslator = Translator::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_translator_list', compact('allTranslator'));
        }
        return redirect('admin/books/translator');
    }
    public function getSearch(){
        return redirect('admin/books/translator');
    }
}
