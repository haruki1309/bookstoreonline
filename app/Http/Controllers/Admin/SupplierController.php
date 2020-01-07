<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Book;

use DB;
use Redirect, Response;

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
        $can_create = $re->can_create;
        return view('admin\bookorder\supplier', compact('suppliers', 'can_read','can_edit','can_delete','can_create'));
    }

    public function createView(Request $re){
        if($re->can_read==0){
           //return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }

        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;

        $books = Book::all();

        return view('admin\bookorder\supplier_create', compact('books','can_read','can_edit','can_delete'));
    }

    public function getBookAndMapTable(Request $request){
        $book = Book::find($request->bookID);

        return Response::json(['id'=>$book->id, 'title'=>$book->title]);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'supplierName'=>'required',
            'supplierPhone'=>'required | numeric:10',
            'supplierEmail'=>'required | email',
            'supplierAddress'=>'required'
        ], [
            'supplierName.required'=>'Vui lòng nhập tên nhà cung cấp',
            'supplierPhone.required'=>'Vui lòng nhập số điện thoại cung cấp',
            'supplierPhone.numeric'=>'Vui lòng nhập đúng định dạng số điện thoại',
            'supplierEmail.required'=>'Vui lòng nhập email nhà cung cấp',
            'supplierEmail.email'=>'Vui lòng nhập đúng định dạng email',
            'supplierAddress.required'=>'Vui lòng nhập địa chỉ nhà cung cấp',
        ]);

        if($validator->fails()){
            if($request->ajax()){
                return response()->json(array(
                    'success' => false,
                    'message' => 'Nhập dữ liệu sai',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }
            $this->throwValidationException($request, $validator);
        }

        $supplierName = $request->supplierName; 
        $supplierPhone = $request->supplierPhone; 
        $supplierEmail = $request->supplierEmail; 
        $supplierAddress = $request->supplierAddress; 
        $supplierBookList = json_decode($request->supplierBookList);

        $supplier = new Supplier;
        $supplier->name = $supplierName;
        $supplier->phone = $supplierPhone;
        $supplier->email = $supplierEmail;
        $supplier->address = $supplierAddress;
        $supplier->save();

        foreach($supplierBookList as $book){
            //attach book id to pivot
            $supplier->Book()->attach($book->id, ['order_price'=>$book->orderPrice]);
        }
        return Response::json($request);
    }

    public function edit(Request $re, $id)
    {   
        if($re->can_read==0){
           //return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }

        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;

        $supplier = Supplier::find($id);

        return view('admin\bookorder\supplier_detail', compact('supplier', 'can_read','can_edit','can_delete'));
    }

    public function store(Request $request)
    {  
        
    }

    public function delete($id){
        
    }
}
