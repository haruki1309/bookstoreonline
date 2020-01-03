<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

use App\Models\Book;
use Cart;

class CartController extends Controller
{
    public function addtocart(Request $request){
        $id = $request->book_id;
        $book = Book::find($id);
        $cartCount = 0;
        $data = [];

        if($request->qty <= $book->inventory_number){
            $user = Auth::user();
            $price = $book->price * (1 - $book->sale/100);
            Cart::restore($user->id);
            Cart::add([
                'id'=>$book->id, 
                'name'=>$book->title, 
                'qty'=>$request->qty, 
                'price'=>$price, 
                'weight'=>1,
                'options'=>[
                    'oldprice'=>$book->price,
                    'sale'=>$book->sale,
                    'img'=>$book->Picture[0]->link,
                    'author'=>$book->Author[0]->name
                ]]);
            Cart::store($user->id);
            $cartCount = Cart::count();
            $cartContent = Cart::content();
            $cartview = (string)view('client/smallcartelement', compact('cartContent'))->render();
            $data = ['cartCount'=>$cartCount, 'cartView'=>$cartview]; 
        }

        return response()->json($data);
    }

    public function getCartView(){
    	return view('client\cart');
    }

    public function update(Request $request){
        $user = Auth::user();
        Cart::restore($user->id);     
        
        // if($request->qty <= $book->inventory_number){
            
        // }

        Cart::update($request->itemid, $request->qty);

        Cart::store($user->id);

        $cartCount = Cart::count();
        $cartTotal = Cart::total();
        $cartContent = Cart::content();
        $cartview = (string)view('client/smallcartelement', compact('cartContent'))->render();

        $data = ['cartView'=>$cartview, 'cartCount'=>$cartCount, 'cartTotal'=>$cartTotal];

        return response()->json($data);
    }

    public function delete(Request $request){
        $user = Auth::user();
        Cart::restore($user->id);     
        Cart::remove($request->itemid);
        Cart::store($user->id);

        $cartCount = Cart::count();
        $cartTotal = Cart::total();
        $cartContent = Cart::content();
        $cartview = (string)view('client/smallcartelement', compact('cartContent'))->render();

        $data = ['cartView'=>$cartview, 'cartCount'=>$cartCount, 'cartTotal'=>$cartTotal];

        return response()->json($data);
    }

    public function showBookInModal($id){
        $book = Book::find($id);

        $data = ['id'=>$book->id, 'title'=>$book->title, 'introduction'=>$book->introduction,'price'=>$book->price, 'img'=>$book->Picture[0]->link];

        $modalView = (string)view('client/quickviewmodal', compact('book'));

        return Response::json($modalView);
    }
}
