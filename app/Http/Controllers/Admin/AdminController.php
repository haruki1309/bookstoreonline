<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use DB;


class AdminController extends Controller{

	public function index(Request $request){
		$all = Admin::all();
		$roles = Role::all();
		return view('admin\admin\index', compact('all','roles'));
	}

	public function getEdit(Request $request,$id){
		$id = $request->id;
		$admin = Admin::find($id);
		return view('admin\admin\edit',compact('admin'));	
	}

	public function postEdit(Request $request){
		$id = $request->id;
		$name = $request->name;
		$roleid = $request->roleid;
		$pass = $request->password;
		$type = $request->type;
		// $result = Admin::updateOrCreate(['id'=>$id],['username'=>(string)$name,'role_id'=>$roleid]);
		// dd($result->all());	
		if($type=="create"){
			$admin = new Admin;
			$admin->username = $name;
			$admin->role_id = $roleid;
			$admin->password =bcrypt($pass);
			$admin->save();
		}else{
			$query = 'UPDATE `admin` SET `username`= ? ,`role_id`= ? WHERE id = ?';
			$result =  DB::update($query, [$name,$roleid,$id]);
		}

		
	 	return redirect('admin/admin')->with('message', 'Chỉnh sửa thành công');
	}
}