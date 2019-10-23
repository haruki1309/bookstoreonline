<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;

class UsersController extends Controller
{
    public function getUser(){
    	$users = User::leftjoin('order', 'user.id', '=', 'order.user_id')
    				->leftjoin('book_order', 'order.id', '=', 'book_order.order_id')
    				->select('user.id', 'user.name', 'user.email', 'user.phone', DB::raw('count(book_order.book_id) as bought_count'))
    				->groupBy('user.id', 'user.name', 'user.email', 'user.phone')
    				->orderBy('bought_count', 'desc')
    				->get();

    	return view('admin\user\users', compact('users'));
    }
}
