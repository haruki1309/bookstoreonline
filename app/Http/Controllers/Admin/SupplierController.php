<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Book;


class SupplierController extends Controller
{
    public function index(){   
        $suppliers = Supplier::all();

        return view('admin\bookorder\supplier', compact('suppliers'));
    }

    public function edit($id)
    {   
        $supplier = Supplier::find($id);

        return view('admin\bookorder\supplier_detail', compact('supplier'));
    }

    public function store(Request $request)
    {  
        
    }

    public function delete($id){
        
    }
}
