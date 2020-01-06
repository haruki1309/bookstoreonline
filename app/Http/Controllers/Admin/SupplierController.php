<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Book;


class SupplierController extends Controller
{
    public function index(Request $re){   
        if($re->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $suppliers = Supplier::all();

        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;

        return view('admin\bookorder\supplier', compact('suppliers', 'can_read','can_edit','can_delete'));
    }

    public function edit(Request $re, $id)
    {   
        if($re->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }

        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;

        $supplier = Supplier::find($id);

        return view('admin\bookorder\supplier_detail', compact('suppliers', 'can_read','can_edit','can_delete'));
    }

    public function store(Request $request)
    {  
        
    }

    public function delete($id){
        
    }
}
