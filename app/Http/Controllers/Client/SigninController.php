<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class SigninController extends Controller
{
    public function postSignin(Request $request){
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->password = bcrypt($request->password);
        dd($request);
    	$user->save();

    	return redirect('/homepage');
    }

    public function checkEmailExisted(Request $request){
        $users = User::get();
        $notExist = true;

        foreach($users as $user){
            if($user->email == $request->email){
                $notExist = false;
                break;
            }
        }

        return response()->json($notExist);
    }

    public function checkPhoneExisted (Request $request){
        $users = User::get();
        $notExist = true;

        foreach($users as $user){
            if($user->phone == $request->phone){
                $notExist = false;
                break;
            }
        }

        return response()->json($notExist);
    }
}
