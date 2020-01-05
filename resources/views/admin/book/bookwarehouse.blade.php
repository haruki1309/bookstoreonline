@extends('admin.master')

@section('title')
Kho sách
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
Kho sách
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Dữ liệu đầu sách</h6>
        <a href="{{url('admin/books/new')}}" class="btn btn-primary btn-circle btn-sm" id="create-new">
            <i class="fas fa-plus"></i>
        </a> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Số lượng</th>
                        <th>Giá bìa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($books as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td>{{$book->Author[0]->name}}</td>
                        <td>{{$book->inventory_number}}</td>
                        <td>@money($book->price)</td>
                        <td>
                        	<a href="{{url('admin/books/'.$book->id.'/edit')}}" class="btn btn-circle btn-sm bg-primary text-gray-100">
                        		<i class="far fa-edit"></i>
                        	</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
