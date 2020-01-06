<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Book;
use App\Models\User;
use Cart;

class LoginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt( ['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            Cart::restore($user->id);
            Cart::store($user->id);
            return redirect()->back()->with('user', $user);
        }
        else{
            return redirect()->back();
        }
    }

    public function logout(){
        $user = Auth::user();
        Cart::restore($user->id);
        Cart::store($user->id);
        Auth::logout();
        foreach(Cart::content() as $item){
            Cart::remove($item->rowId);
        }
        return redirect('homepage');
    }
}
