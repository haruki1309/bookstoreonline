@extends('admin.master')

@section('title')
Nhập hàng
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script type="text/javascript">
$(document).ready(function() {
    var baseUrl = $('meta[name="base-url"]').attr('content');

    $('.view').click(function(){
        var id = $(this).parent().attr('data-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: baseUrl + '/admin/goods-receipt-order/view',
            method: "POST",
            data: {goodsReceiptOrderID: id},
            success: function(data){ 
                $('#receipt-quick-view-modal .modal-body').html(data);
                $('#receipt-quick-view-modal').modal('show');
            }
        });
    });
});
</script>
@stop

@section('pageheader')
Phiếu nhập hàng
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách phiếu nhập hàng</h6>
        <a href="{{url('admin/goods-receipt-order/create')}}" class="btn btn-primary btn-circle btn-sm" id="create-new">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày nhập</th>
                        <th>Tổng số tiền</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($goodsReceiptOrder as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->Supplier->name}}</td>
                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                        <td>{{$item->total}}</td>
                        <td data-id="{{$item->id}}">
                            <a href="javascript:void(0);" class="view btn btn-success btn-circle ml-1 btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="receipt-quick-view-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông tin phiếu nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>
@stop
