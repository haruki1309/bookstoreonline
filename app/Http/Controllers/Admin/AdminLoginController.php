<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function getIndex(){
    	return view('admin\login');
    }
    public function postIndex(Request $request){
    	if(Auth::guard('admin')->attempt(['username'=>$request->username,'password'=>$request->password]))
    	{
    		return redirect('admin/warehouse');
    	}
    	else
    	{
    		return redirect('admin/login');
    	}
    }
}
