@extends('admin.master')

@section('title')
Quyền
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
Quyền
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách quyền</h6>
        <a href="" class="btn btn-primary btn-circle btn-sm" id="create-new">
            <i class="fas fa-plus"></i>
        </a> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Quyền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($all as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                        	<a href="role/edit/{{$role->id}}" class="btn btn-circle btn-sm bg-primary text-gray-100">
                        		<i class="far fa-edit"></i>
                        	</a>

                        	<a href="role/delete/{{$role->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
                        		<i class="fas fa-trash"></i>
                        	</a>

                          {{--   <a href="role/views/{{$role->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
                                <i class="far fa-views"></i>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
