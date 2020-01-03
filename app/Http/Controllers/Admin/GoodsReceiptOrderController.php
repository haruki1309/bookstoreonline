<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;
use App\Models\Supplier;
use App\Models\Book;
use DB;

class GoodsReceiptOrderController extends Controller
{
    public function index(){
    	return view('admin/bookorder/goods_receipt_order');
    }

    public function create_view(){
        $suppliers = Supplier::all();

    	return view('admin/bookorder/goods_receipt_order_create', compact('suppliers'));
    }

    public function create(Request $request){
        dd($request->listbook->data-stuff);
    }

    public function mapTable(Request $request){
    	if($request->ajax()){
    		$id = $request->get('selected');

    		$supplier = Supplier::find($id);

			$books = $supplier->Book;

			return datatables()->of($books)
            ->addColumn('action', function($books){
                $id = $books->id;
                return (string)view('admin/bookorder/action', compact('id'));
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    		
    	}
    	return view('admin/bookorder/goods_receipt_order_create');
    }

    public function addList(Request $request){
        if($request->ajax()){
            $book_id = $request->get('bookID');
            $supplier_id = $request->get('supplierID');
            //query data from book.id and supplier.id
            $book = DB::table('book')
                ->join('book_supplier', 'book.id', '=', 'book_supplier.book_id')
                ->select('book.*', 'book_supplier.order_price')
                ->where(['book.id'=>$book_id, 'book_supplier.supplier_id'=>$supplier_id])
                ->first();

            return Response::json(['id'=>$book->id, 'title'=>$book->title, 'unitPrice'=>$book->order_price]);
        }
        return view('admin/bookorder/goods_receipt_order_create');
    }
}
