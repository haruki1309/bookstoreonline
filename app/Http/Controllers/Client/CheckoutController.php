<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;
use App\Models\MethodDelivery;
use App\Models\MethodPayment;
use App\Models\Order;
use Cart;

class CheckoutController extends Controller
{
    public function information(){
        $user = Auth::user();
        $userAddress = $user->Address;
        $methodDelivery = MethodDelivery::all();
        $methodPayment = MethodPayment::all();
        $cart = Cart::content();
        $cartTotal = (float)Cart::total(2, ',', '');

        return view('client/checkout', compact('methodDelivery', 'userAddress', 'methodPayment', 'cart', 'cartTotal'));
    }

    public function storeOrder(Request $request){
        $order = new Order;
        $user = Auth::user();
        $address = Address::find($request->address);

        if($request->address == 0){
            $newAddress = new Address;
            $newAddress->user_id = $user->id;
            $newAddress->receiver_name = $request->receiverName;
            $newAddress->address = $request->receiverAddress;
            $newAddress->phone_number = $request->receiverPhone;
            $newAddress->default = 0;
            $newAddress->save();

            $address = Address::find($newAddress->id);
        }
        
        $delivery_method = MethodDelivery::find($request->delivery);
        $cartTotal = (float)Cart::total(2, ',', '');

        $order->total_money = $cartTotal + $delivery_method->delivery_fee;
        $order->user_id = $user->id;
        $order->receiver_name = $address->receiver_name;
        $order->delivery_address = $address->address;
        $order->phone_number = $address->phone_number;
        $order->status_id = 1;
        $order->method_delivery_id = $request->delivery;
        $order->method_payment_id = $request->payment;

        $order->save();

        foreach(Cart::content() as $item){
            $order->Book()->syncWithoutDetaching([$item->id => ['amount' => $item->qty, 'price' => $item->price]]);
        }

        Cart::restore($user->id);
        Cart::destroy();

        return redirect('homepage');
    }
}
