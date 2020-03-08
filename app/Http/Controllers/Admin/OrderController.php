<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\MethodDelivery;
use App\Models\MethodPayment;
use App\Models\Status;
use DB;
class OrderController extends Controller
{
    public function index(Request $re){
        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_create = $re->can_create;
        $can_approve = $re->can_approve;
        $can_delete = $re->can_delete;

        $all = Order::all();
        $users = User::all();
        $admin = Admin::all();
        $methoddeliver = MethodDelivery::all();
        $methodpayment = MethodPayment::all();
        $status = Status::all();

        $viewname = 'order';
    	return view('admin/orders/index', compact('all','can_edit','can_create','can_delete','admin','users','methoddeliver','methodpayment','status'));
    }

   public function edit(Request $re){
        $id = $re->id;
        $status_id = $re->status_id;
        $query = 'UPDATE `order` SET `status_id`= ? WHERE id = ? ';
        $result = DB::update($query, [$status_id,$id]);
        return redirect('admin/orders/')->with('message', 'Đã update'); 
   }
}
