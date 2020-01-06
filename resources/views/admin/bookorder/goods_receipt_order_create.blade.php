@extends('admin.master')

@section('title')
Phiếu nhập
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{url('vendor/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{url('vendor/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Page level custom scripts -->
<script>
$(document).ready(function() {
    //global object book list
    var orderBookList  = [Book];
    orderBookList.length = 0;
    function Book (_id, _title, _qty, _orderPrice){
        this.id = _id;
        this.title = _title;
        this.qty = _qty;
        this.orderPrice  = _orderPrice;
    };

    $('#dataTable').DataTable({
        columns: [
            {data: 'id', visible: false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            {data: 'title'},
            {data: 'inventory_number'},
            {data: 'pivot.order_price'},
            {data: 'action', orderable: false,searchable: false},
        ]
    });

    $('#supplier-name').change(function(){
        var tbl_length = orderBookList.length;
        var confirmStr = "Thao tác này sẽ xóa dữ liệu trong bảng Danh sách đầu sách, xác nhận tiếp tục?";

        if(tbl_length == 0 || (tbl_length > 0 && confirm(confirmStr))){

            var BASEURL =  window.location.origin+window.location.pathname;
            var selectedID = $('#receipt-form').find('select[name=supplierid]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: BASEURL + '/map-table',
                method: "POST",
                data: {selected: selectedID},
                success: function(data){ 
                    //refresh supplier table
                    $('#dataTable').DataTable().clear();
                    $('#dataTable').DataTable().rows.add(data.data).draw();
                    //clear books list table
                    $('#order-tbl > tbody').html("");
                     //clear array books list
                    orderBookList.length = 0;
                }
            });
        }
    });

    $('body').on('click', '#btn-fetch-data', function(){ 
        var BASEURL =  window.location.origin+window.location.pathname;
        var supplierID = $('#receipt-form').find('select[name=supplierid]').val();
        var bookID = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: BASEURL + '/add-list',
            traditional: true,
            method: "POST",
            data: {bookID: bookID, supplierID: supplierID},
            success: function(data){ 
                $('#bookInfoModal').find('input[name=formBookId]').val(data.id);
                $('#bookInfoModal').find('input[name=formBookTitle]').val(data.title);
                $('#bookInfoModal').find('input[name=formBookOrderPrice]').val(data.unitPrice);
                $('#bookInfoModal').modal('show');       
            }
        });
    });

    $('#btn-add-to-book-order').click(function(){
        var bookId = $('#book-modal-form').find('input[name=formBookId]').val();
        var bookTitle = $('#book-modal-form').find('input[name=formBookTitle]').val();
        var bookQty = $('#book-modal-form').find('input[name=formBookQty]').val();
        var bookOrderPrice = $('#book-modal-form').find('input[name=formBookOrderPrice]').val();

        var row = "<tr book-id="+bookId+"><td>"+bookTitle+"</td><td contenteditable='true'>"+bookOrderPrice+"</td><td>"+bookQty+"</td><td><a href='javascript:void(0);' class='delete btn btn-danger btn-circle ml-1 btn-sm delete-row'><i class='fas fa-trash'></i></a></td></tr>";

        const found = orderBookList.some(el => el.id === bookId);

        if(!found){
            $('#order-tbl > tbody').append(row);
            var book = new Book(bookId, bookTitle, bookQty, bookOrderPrice);
            orderBookList.push(book);
            console.log(orderBookList);
        }
        else{
            alert('"' + bookTitle + '" đã được thêm vào đơn đặt hàng');
        }     
    });

    $('body').on('click', '.delete-row', function(){
        var rowBookId = $(this).parent().parent().attr('book-id');

        for( var i = 0; i < orderBookList.length; i++){ 
            if ( orderBookList[i].id === rowBookId) {
                orderBookList.splice(i, 1); 
            }
        }
        console.log(orderBookList);
        $(this).parent().parent().remove();
    });

    $('#btn-submit-receipt-form').click(function(){
        var baseUrl = $('meta[name="base-url"]').attr('content');
        var receiptdate = $('#receipt-form').find('input[name=receiptdate]').val();
        var supplierid = $('#receipt-form').find('select[name=supplierid]').val();
        var sendOrderBooklist = JSON.stringify(orderBookList);
        
        console.log("client: "+receiptdate);
        console.log("client: "+supplierid);
        console.log("client: " + sendOrderBooklist);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: baseUrl + '/admin/goods-receipt-order/create-recept',
            method: "post",
            data: {receiptdate: receiptdate, supplierid: supplierid, orderBookList: sendOrderBooklist},
            dataType: "json",
            success: function(data){ 
                console.log("response: "+ data);
            }
        });
    });
});
</script>
@stop

@section('pageheader')
Tạo phiếu nhập hàng
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin phiếu nhập</h6>
        <button id="btn-submit-receipt-form" class="btn btn-primary btn-sm">
            Lưu phiếu nhập
        </button>
    </div>
    <div class="card-body">
        <form id="receipt-form" method="post" action="{{url('admin/goods-receipt-order/create-recept')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="date">Ngày nhập</label>
                    <input name="receiptdate" type="text" class="form-control" value="{{date('d/m/Y', time())}}" readonly>
                </div>
                <div class="form-group col-lg-6">
                    <label for="supplier-name">Nhà cung cấp</label>
                    <select name="supplierid" id="supplier-name" class="selectpicker form-control" data-live-search="true">
                        <option disabled selected value>-- Chọn nhà cung cấp --</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sách đang cung cấp</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>#</th>
                                <th>Tựa sách</th>
                                <th>SL tồn</th>
                                <th>Giá nhập</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách đầu sách</h6>
            </div>
            <div class="card-body">
                <form >
                    <div class="table-responsive">
                        <table id="order-tbl" class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tựa sách</th>
                                    <th>Giá nhập</th>
                                    <th>Số lượng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="bookInfoModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="display: inline-block;">Thông tin sách</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="book-modal-form" method="post">
                        <input type="hidden" name="formBookTitle">
                        <input type="hidden" name="formBookId">
                        <div class="form-group">
                            <label for="qty" class="col-form-label">Số lượng</label>
                            <input type="numberic" class="form-control" id="qty" name="formBookQty" required>
                        </div>
                        <div class="form-group">
                            <label for="orderPrice" class="col-form-label">Giá nhập</label>
                            <input type="numberic" class="form-control" id="orderPrice" name="formBookOrderPrice" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btn-add-to-book-order" class="btn btn-primary" data-dismiss="modal">Thêm vào phiếu nhập hàng</button>
                </div>
            </div>
        </div>
    </div>
@stop
