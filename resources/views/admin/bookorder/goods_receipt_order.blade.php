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
@stop

@section('pageheader')
Phiếu nhập hàng
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách phiếu nhập hàng</h6>
        @if($can_create==1)
                <a href="{{url('admin/goods-receipt-order/create')}}" class="btn btn-primary btn-circle btn-sm" id="create-new">
            <i class="fas fa-plus"></i>
        </a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày nhập</th>
                        <th>Tổng số tiền</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
