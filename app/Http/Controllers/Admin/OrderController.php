<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order;
use App\User;

class OrderController extends Controller
{
    public function getOrder(){
    	$waitingOrder = Order::where('status_id', 1)->get();
    	$shippingOrder = Order::where('status_id', 2)->get();
    	$succeedOrder = Order::where('status_id', 3)->get();
    	$canceledOrder = Order::where('status_id', 4)->get();

    	return view('admin\order\order', compact('waitingOrder', 'shippingOrder', 'succeedOrder', 'canceledOrder'));
    }

    public function getOrderDetail($id){
    	
    	$order = Order::where('id', $id)->first();
    	return view('admin\order\order_detail', compact('order'));
    }

    public function postShipping($id){
    	$order = Order::where('id', $id)->first();
    	$order->status_id = 2;
    	$order->save();
    	return redirect('admin/orders');
    }

    public function postSucceed($id){
    	$order = Order::where('id', $id)->first();
    	$order->status_id = 3;
    	$order->save();
    	return redirect('admin/orders');
    }
}
