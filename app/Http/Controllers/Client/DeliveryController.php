<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Address;
use App\MethodDelivery;
use App\MethodPayment;
use App\Order;

class DeliveryController extends Controller
{
    public function getDelivery($id){
    	$address = Address::where('id', $id)->first();
    	$cart = Cart::content();
    	$methodPayment = MethodPayment::get();
    	$methodDelivery = MethodDelivery::get();

    	return view('client\delivery', 
    		compact('address', 'cart', 'methodDelivery', 'methodPayment'));
    }

    public function postOrder(Request $request, $id){
    	$order = new Order;
    	$user = Auth::user();
    	$address = Address::where('id', $id)->first();
    	$delivery_method = MethodDelivery::where('id', $request->deliveryfieldset)->first();

    	$order->total_money = Cart::total() * 1000 + $delivery_method->delivery_fee;
    	$order->user_id = $user->id;
    	$order->receiver_name = $address->receiver_name;
    	$order->delivery_address = $address->address;
    	$order->phone_number = $address->phone_number;
    	$order->status_id = 1;
    	$order->method_delivery_id = $request->deliveryfieldset;
    	$order->method_payment_id = $request->paymentfieldset;

    	$order->save();

    	foreach(Cart::content() as $item){
    		$order->Book()->syncWithoutDetaching([$item->id => ['amount' => $item->qty, 'price' => $item->price]]);
    	}

        Cart::restore($user->id);
        Cart::destroy();

    	return redirect('homepage')->with('notify', 'Đặt hàng thành công');
    }	

}
