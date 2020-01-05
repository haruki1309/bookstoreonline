<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

use App\Models\Order;
use App\Models\Book;


class UserBoardController extends Controller
{
    public function getOrder(){
    	$user = Auth::user();
    	$orders = Order::where('user_id', $user->id)->get();

    	return view('client\account_order', compact('orders'));
    }

    public function getBook(){
        return view('client\account_comment');
    }

    public function deleteOrder($id){       
        $user = Auth::user();
        $order = Order::where(['user_id'=>$user->id, 'id'=>$id])->first();
        $order->Book()->detach();
        $order->delete();
        return redirect()->back();
    }

    public function getAccountEdit(){
    	$user = Auth::user();

    	return view('client\account_info', compact('user'));
    }

    public function postAccountEdit(Request $request){
    	$user = Auth::user();
    	$user->name = $request->name;
    	$user->phone = $request->phone;

    	if($request->changepass){
    		if(Hash::check($request->oldpassword, $user->password)){
    			$this->validate($request, [
		            'oldpassword' => 'required',
		            'newpassword' => 'required|min:8',
		            'confirmpassword' => 'required'
		        ],[
		        	'oldpassword.required' => 'Chưa nhập mật khẩu cũ',
		        	'newpassword.min' => "Mật khẩu mới cần có ít nhất 8 kí tự",
		        	'newpassword.required' =>"Chưa nhập mật khẩu mới",
		        	'confirmpassword.required' => "Chưa xác nhận mật khẩu"
		        ]);

    			if(strcmp($request->newpassword, $request->confirmpassword) == 0){
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
    	return redirect()->back()->with('message', 'Thay đổi thông tin thành công');
    }

    public function getPurcharsedBook(){
        $user = Auth::user();

        $orders = Order::with('Book')->where('user_id', $user->id)->where('status_id', 3)->get();
        $books = array(); 

        foreach($orders as $order){
            foreach($order->Book as $book_item){
                $book = [
                    'id'=>$book_item->id,
                    'title'=>$book_item->title,
                    'img'=>$book_item->Picture[0]->link,
                    'order_id'=>$order->id,
                    'receiveDate'=>date('d-m-Y', strtotime($order->created_at.'+'.$order->MethodDelivery->es_date.'days'))
                ];

                array_push($books, $book);
            }
        }
        return view('client\account_purcharsed_book', compact('books'));
    }
}
