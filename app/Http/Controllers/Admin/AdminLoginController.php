<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;

use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function getIndex(){
    	return view('admin\login\login');
    }
    public function postIndex(Request $request){
    	// $this->validate($request,['username'=>'required','password'=>'required|min:6'],[
    	//     'username.required'=>'Bạn chưa nhập tài khoản',
    	//     'password.required'=>'Bạn chưa nhập mật khẩu',
    	// 	'password.min'=>'Mật khẩu không được nhỏ hơn 6 ký tự']);

    	if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password]))
    	{
    		return redirect('admin/books');
    	}
    	else
    	{
    		return redirect('admin/login');
    	}
    }
}
