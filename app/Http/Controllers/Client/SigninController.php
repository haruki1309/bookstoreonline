<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;

class SigninController extends Controller
{
    public function getSigninPage(){
        return view('client/signin');    
    }
    
    public function postSignin(Request $request){
    	$user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        
        if(strcmp($user->email, $request->email) == 0){
            $user->email = $request->email;
        }
        else{
            return redirect()->back()->with('message', 'Email đã đăng kí tài khoản');
        }

        $user->password = $request->password;

        //$user->save();
        return redirect('homepage')->with('message', 'Đăng kí thành công');
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
