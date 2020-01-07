<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Book;
use App\Models\GoodsReceiptOrder;

use DB;
use Redirect, Response;

class GoodsReceiptOrderController extends Controller
{
    public function index(Request $re){
        if($re->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }
        $goodsReceiptOrder = GoodsReceiptOrder::all();

        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;
        $can_create = $re->can_create;
    	return view('admin/bookorder/goods_receipt_order', compact('can_read','can_edit','can_delete','can_create'));
    }

    public function create_view(Request $re){
        if($re->can_read==0){
           return redirect('admin/warehouse')->with('message', 'Bạn không có quyền xem'); 
        }

        $can_read = $re->can_read;
        $can_edit = $re->can_edit;
        $can_delete = $re->can_delete;

        $suppliers = Supplier::all();

    	return view('admin/bookorder/goods_receipt_order_create', compact('suppliers', 'can_read','can_edit','can_delete'));
    }

    public function create(Request $request){
        $receptDate = $request->receiptdate;
        $supplier = Supplier::find($request->supplierid);
        $orderBooksList = json_decode($request->orderBookList);

        $goodsReceiptOrder = new GoodsReceiptOrder;
        $goodsReceiptOrder->supplier_id = $supplier->id;
        $goodsReceiptOrder->created_at = date('Y-m-d');
        $goodsReceiptOrder->total = 0;
        $goodsReceiptOrder->save();

        foreach($orderBooksList as $book){
            $goodsReceiptOrder->total += $book->orderPrice;
            //attach book id to pivot
            $goodsReceiptOrder->Book()->attach($book->id, ['qty'=>$book->qty, 'price'=>$book->orderPrice]);
            //update order price
            DB::table('book_supplier')
                ->where(['book_id'=>$book->id, 'supplier_id'=>$supplier->id])
                ->update(['order_price'=>$book->orderPrice]);

            // // //update book inventory
            $currentBook = Book::find($book->id);
            $currentBook->inventory_number += $book->qty;
            $currentBook->save();
        }

        $goodsReceiptOrder->save();
        //return redirect('admin/goods-receipt-order')->with('message', 'Thêm phiếu đặt hàng thành công!');
        return Response::json(':');
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

    public function viewReceipt(Request $request){

        $receipt = GoodsReceiptOrder::find($request->goodsReceiptOrderID);
        $modalView = (string)view('admin/bookorder/goodReceiptOrderQuickView', compact('receipt'));

        return Response::json($modalView);
    }
}
