@extends('admin.master')

@section('title')
{{$supplier->name}}
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/jquery/jquery.validate.min.js')}}"></script>
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#supplier-datatable').DataTable();
    });
</script>
@stop

@section('pageheader')
{{'Nhà cung cấp: '.$supplier->name}}
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
    </div>
    <div class="card-body">
        <form>
		    <div class="form-group">
		        <label for="name">Tên nhà cung cấp</label>
		        <input type="text" class="form-control" id="name" value="{{$supplier->name}}">
		    </div>
		    <div class="form-row">
		        <div class="form-group col-md-6">
		            <label for="phone">Số điện thoại</label>
		            <input type="text" class="form-control" id="phone" value="{{$supplier->phone}}">
		        </div>
		        <div class="form-group col-md-6">
		            <label for="email">Email</label>
		            <input type="email" class="form-control" id="email" value="{{$supplier->email}}">
		        </div>
		    </div>
		    <div class="form-group">
		        <label for="address">Địa chỉ</label>
		        <input type="text" class="form-control" id="address" value="{{$supplier->address}}">
		    </div>
		    <button type="submit" class="btn btn-primary">Lưu</button>
		</form>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sách cung cấp</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="supplier-datatable" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tựa sách</th>
                        <th>Giá bìa</th>
                        <th>Giá nhập</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@stop
