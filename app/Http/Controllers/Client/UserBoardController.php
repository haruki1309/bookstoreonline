<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\Order;

class UserBoardController extends Controller
{
    public function getOrder(){
    	$user = Auth::user();
    	$order = Order::where('user_id', $user->id)->get();

    	return view('client\account_order', compact('order'));
    }

    public function getAccountEdit(){
    	$user = Auth::user();

    	return view('client\account_edit', compact('user'));
    }

    public function postAccountEdit(Request $request){
    	$user = Auth::user();

    	$user->name = $request->name;
    	$user->phone = $request->phone;

    	if($request->chk_ChangePass == "check"){
    		if(Hash::check($request->oldPass, $user->password)){
    			$this->validate($request, [
		            'oldPass' => 'required',
		            'newPass' => 'required|min:8',
		            'confirmPass' => 'required'
		        ],[
		        	'oldPass.required' => 'Chưa nhập mật khẩu cũ',
		        	'newPass.min' => "Mật khẩu mới cần có ít nhất 8 kí tự",
		        	'newPass.required' =>"Chưa nhập mật khẩu mới",
		        	'confirmPass.required' => "Chưa xác nhận mật khẩu"
		        ]);

    			if(strcmp($request->newPass, $request->confirmPass) == 0){
    				$user->password = encrypt($request->newPass);
    			}
    			else{
    				return redirect()->back()->with('error', 'Xác nhận mật khẩu không chính xác');
    			}
    		}
    		else{
    			return redirect()->back()->with('error', 'Sai mật khẩu');
    		}
    	}

    	$user->save();
    	return redirect()->back()->with('notify', 'Thay đổi thông tin thành công');
    }

    public function getPurcharsedBook(){
        $user = Auth::user();

        $orders = Order::with('Book')->where('user_id', $user->id)->where('status_id', 3)->get();
        $books = array(); 

        foreach($orders as $order){
            foreach($order->Book as $book_item){
                array_push($books, $book_item);
            }
        }
        return view('client\account_purcharsed_book', compact('books'));
    }
}
