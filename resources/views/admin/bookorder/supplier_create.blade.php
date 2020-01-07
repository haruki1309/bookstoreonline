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
<script>
$(document).ready(function() {
    $('#book-table').DataTable();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //global object book list
    var supplierBookList  = [Book];
    supplierBookList.length = 0;
    function Book (_id, _title, _orderPrice){
        this.id = _id;
        this.title = _title;
        this.orderPrice  = _orderPrice;
    };

    if(supplierBookList.length == 0){
        $('#btn-submit-suppler-form').attr('disabled', true);
    }

    $('.btn-fetch-data').click(function(){
        var baseUrl = $('meta[name="base-url"]').attr('content');
        var bookID = $(this).data('id');
        
        $.ajax({
            url: baseUrl + '/admin/supplier/mapping-data',
            traditional: true,
            method: "POST",
            data: {bookID: bookID},
            success: function(data){ 
                $('#bookInfoModal').find('input[name=formBookId]').val(data.id);
                $('#bookInfoModal').find('input[name=formBookTitle]').val(data.title);       
                $('#bookInfoModal').modal('show');       
            }
        });
    });

    $('#btn-add-to-book-order').click(function(){
        var bookId = $('#book-modal-form').find('input[name=formBookId]').val();
        var bookTitle = $('#book-modal-form').find('input[name=formBookTitle]').val();
        var bookOrderPrice = $('#book-modal-form').find('input[name=formBookOrderPrice]').val();

        var row = "<tr book-id="+bookId+"><td>"+bookTitle+"</td><td contenteditable='true'>"+bookOrderPrice+"</td><td><a href='javascript:void(0);' class='delete btn btn-danger btn-circle ml-1 btn-sm delete-row'><i class='fas fa-trash'></i></a></td></tr>";

        const found = supplierBookList.some(el => el.id === bookId);

        if(!found){
            $('#order-tbl > tbody').append(row);
            var book = new Book(bookId, bookTitle, bookOrderPrice);
            supplierBookList.push(book);
            
            $('#btn-submit-suppler-form').attr('disabled', false);
        }
        else{
            alert('"' + bookTitle + '" đã được thêm vào đơn đặt hàng');
        }     
    });

    $('#btn-submit-suppler-form').click(function(){
        var baseUrl = $('meta[name="base-url"]').attr('content');

        var supplierName = $('#supplier-form').find('input[name=name]').val();
        var supplierPhone = $('#supplier-form').find('input[name=phone]').val();
        var supplierEmail = $('#supplier-form').find('input[name=email]').val();
        var supplierAddress = $('#supplier-form').find('input[name=address]').val();

        var sendSupplierBookList = JSON.stringify(supplierBookList);
        $.ajax({
            url: baseUrl + '/admin/supplier/create',
            method: "post",
            data: {
                supplierName: supplierName, 
                supplierPhone: supplierPhone, 
                supplierEmail: supplierEmail, 
                supplierAddress: supplierAddress, 
                supplierBookList: sendSupplierBookList
            },
            dataType: "json",
            success: function(data){
                console.log(data);
                $('#notify-modal').find('.modal-title').html('Thông báo');
                $('#notify-modal').find('.modal-body').html('Thêm nhà cung cấp thành công');
                $('#notify-modal').modal('show');
            },
            error: function(jqXhr, json, errorThrown){
                var response = jqXhr.responseJSON;
                var errorsHtml = '<ul>';
                $.each(response['errors'], function(index, value){
                    errorsHtml += '<li>' + value + '</li>'
                });
                errorsHtml += '</ul>'
                $('#notify-modal').find('.modal-title').html(response['message']);
                $('#notify-modal').find('.modal-body').html(errorsHtml);
                $('#notify-modal').modal('show');
                console.log(response);
            }
        });
    });
});
</script>
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin nhà cung cấp</h6>
        <button id="btn-submit-suppler-form" class="btn btn-primary">Lưu</button>
    </div>
    <div class="card-body">
        <form action="{{url('admin/supplier/create')}}" method="post" id="supplier-form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="name">Tên nhà cung cấp</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" name="address">
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sách đang có trong database</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="book-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tựa sách</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $index => $book)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$book->title}}</td>
                                <td>
                                    <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$book->id}}" data-original-title="Edit" class="btn btn-success btn-circle btn-sm btn-fetch-data">
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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
                <h5 class="modal-title" style="display: inline-block;">Thêm sách vào danh sách cung cấp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="book-modal-form" method="post">
                    <input type="hidden" name="formBookId">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Đầu sách</label>
                        <input type="text" class="form-control" id="title" name="formBookTitle" disabled>
                    </div>
                    <div class="form-group">
                        <label for="orderPrice" class="col-form-label">Giá nhập</label>
                        <input type="numberic" class="form-control" id="orderPrice" name="formBookOrderPrice" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btn-add-to-book-order" class="btn btn-primary" data-dismiss="modal">Thêm</button>
            </div>
        </div>
    </div>
</div>
@stop
