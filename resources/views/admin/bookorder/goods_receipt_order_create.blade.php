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
        var tbl_length = $('#receipt-form input[name="listbook[]"]').length;
        var confirmStr = "Thao tác này sẽ xóa dữ liệu trong bảng Danh sách đầu sách, xác nhận tiếp tục?";
        if(tbl_length == 0 || (tbl_length > 0 && confirm(confirmStr))){
            var BASEURL =  window.location.origin+window.location.pathname;
            var selectedID = $(this).children("option:selected").attr('supplier-id');
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
                   
                }
            });
        }
    });

    $('body').on('click', '#btn-fetch-data', function(){ 
        var BASEURL =  window.location.origin+window.location.pathname;
        var supplierID = $("#supplier-name").children("option:selected").attr('supplier-id');
        var bookID = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: BASEURL + '/add-list',
            method: "POST",
            data: {bookID: bookID, supplierID: supplierID},
            success: function(data){ 
                var row = "<tr book-id="+data.id+"><td>"+data.title+"</td><td contenteditable='true'>"+data.unitPrice+"</td><td contenteditable='true'></td><td><a href='javascript:void(0);' id='delete-row' class='delete btn btn-danger btn-circle ml-1 btn-sm'><i class='fas fa-trash'></i></a></td></tr>";

                if(true){
                    $('#order-tbl > tbody').append(row);
                    $('#receipt-form').append('<input type="hidden" name="listbook[]" value="'+data.id+'"/>')
                }
                else{
                    alert('"' + data.title + '" đã được thêm vào đơn đặt hàng');
                }            
            }
        });
    });

    $('body').on('click', '#delete-row', function(){
        $(this).parent().parent().remove();
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
        <button class="btn btn-primary btn-circle btn-sm" type="submit" form="receipt-form">
            <i class="fas fa-plus"></i>
        </button>

    </div>
    <div class="card-body">
        <form id="receipt-form" method="post" action="{{url('admin/goods-receipt-order/create-recept')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="listbook[]">
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
                        <option supplier-id="{{$supplier->id}}">{{$supplier->name}}</option>
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
@stop
