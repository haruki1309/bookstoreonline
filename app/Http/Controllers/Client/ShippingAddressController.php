<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Address;

class ShippingAddressController extends Controller
{
    public function getView(){
    	$user = Auth::user();
    	$address = $user->Address;

    	return view('client\checkout', compact('address'));
    }

    public function saveAddress(Request $request){
    	$user = Auth::user();

    	$listAddress = $user->Address;

    	if($request->addressID == 0){
    		//them moi
    		$address = new Address;
	    }
    	else{
    		//sua
    		$address = Address::where('id', $request->addressID)->first();
    	}

	    $address->user_id = $user->id;
    	$address->receiver_name = $request->receivername;
    	$address->address = $request->address;
    	$address->phone_number = $request->sdt;

    	if($request->isDefault == "on"){
    		$address->default = true;

    		if(count($listAddress) > 0){
    			foreach($listAddress as $item){
    				$item->default = 0;
    				$item->save();
    			}
    		}
    	}
    	else{
    		$address->default = 0;
    	}
    	$address->save();
    	return redirect()->back();
    }

    public function deleteAddress($id){
    	$address = Address::where('id', $id)->first();
    	$address->delete();

    	return redirect()->back();
    }
}
