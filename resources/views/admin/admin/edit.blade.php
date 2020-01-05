{{-- @extends('admin.master')

@section('title')
    Thông tin người dùng
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>
@stop

@section('pageheader')
	Thông tin {{$admin->username}}
@stop


@section('content')
<form method="post" >
	 @csrf
	<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách chức năng</h6>
        <button type="submit" class="btn btn-primary" id="btn-save" value="">
			Lưu
		</button>
    </div>
    <input type="hidden" name="id_" id="id_" value="{{$admin->id}}">
    <div class="card-body">
        <div class="table-responsive">    

            <div class="form-group">
                <label class="col-md-4 control-label" for="service_status">Tên</label>
                <div class="col-md-4">
                    <input type="text" name="name" class= "form-control " id="name" value="{{$admin->username}}">                 
                </div>
              </div>       
            
            <div class="form-group">
                <label class="col-md-4 control-label" for="service_status">Quyền</label>
                <div class="col-md-4">
                    <input type="text" name="role" class= "form-control " id="role" value="{{$admin->role_id}}">                 
                </div>
              </div>  
            <div class="form-group">
                <label class="col-md-4 control-label" for="service_status">Mật khẩu mới</label>
                <div class="col-md-4">
                    <input type="text" name="newpass" class= "form-control " id="newpass">                 
                </div>
              </div>  
        </div>
    </div>
</div>
	
</form>
@stop
 --}}