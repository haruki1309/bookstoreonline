@extends('admin.master')

@section('title')
{{'Thông tin sách - '.ucfirst($viewName)}}
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/jquery/jquery.validate.min.js')}}"></script>
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('js/admin/datatable.js')}}"></script>
@stop

@section('pageheader')
{{'Thông tin '.$viewName}}
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{'Danh sách '.$viewName}}</h6>
        <a href="javascript:void(0)" class="btn btn-primary btn-circle btn-sm" id="create-new">
    		<i class="fas fa-plus"></i>
    	</a> 
    </div>
    <div class="card-body">
        <div class="table-responsive"> 
            <table class="table table-bordered" id="datatable" width="100%">
                <thead>
                    <tr>
                    	<th>id</th>
                        <th>#</th>
                        <th>{{ucfirst($viewName)}}</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="ajax-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		    <div class="modal-body">
		        <form id="infoform" name="infoform" class="form-horizontal" method="post">
		        	<input type="hidden" name="_token" value="{{csrf_token()}}">
		           	<input type="hidden" name="id" id="id" value="-1">
		            <div class="form-group">
		                <label for="name" class="col-sm-2 control-label">Tên</label>
		                <div class="col-sm-12">
		                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" value="" maxlength="50" required="">
		                </div>
		            </div> 
		            <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" id="btn-save" value="create">
							Lưu
						</button>
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</div>
@stop
