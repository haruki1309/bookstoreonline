<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Topic;

class TopicController extends Controller
{
    public function getIndex(){
    	$allTopic = Topic::all();
    	return view('admin\book\book_topic_list', compact('allTopic'));
    }

    public function postIndex(Request $request){
        $this->validate($request, [
            'value'=>'required|unique:topic,name'
        ], [
            'value.required'=>'Bạn chưa nhập chủ đề',
            'value.required'=>'Chủ đề đã tồn tại'
        ]);

    	$topic = new Topic;
    	$topic->name = $request->value;
    	$topic->save();
    	return redirect('admin/books/topic')->with('message', 'Thêm chủ đề thành công');
    }

    public function getEdit($id){
    	$allTopic = Topic::all();
    	$edit_topic = Topic::where('id', $id)->first();
    	return view('admin\book\book_topic_edit', compact('edit_topic', 'allTopic'));
    }

    public function postEdit(Request $request, $id){
        $this->validate($request, [
            'value'=>'required|unique:topic,name'
        ], [
            'value.required'=>'Bạn chưa nhập chủ đề',
            'value.required'=>'Chủ đề đã tồn tại'
        ]);

    	$topic = Topic::find($id);
    	$topic->name = $request->value;
    	$topic->save();
    	return redirect('admin/books/topic');
    }

    public function delete($id){
        $topic = Topic::find($id);
        $topic->delete();

        return redirect('admin/books/topic');
    }

    public function search(Request $request){
        if($request->searchkey != ''){
            $allTopic = Topic::where('name', 'like', "%$request->searchkey%")->get();
            return view('admin\book\book_topic_list', compact('allTopic'));
        }
        return redirect('admin/books/topic');
    }
    public function getSearch(){
        return redirect('admin/books/topic');
    }
}
