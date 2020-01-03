@extends('admin.master')

@section('title')
Phân quyền
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
	Phân quyền {{$role->name}}
@stop


@section('content')
<form method="post" >
	 @csrf
	<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách chức năng</h6>
        <button type="submit" class="btn btn-primary" id="btn-save" value="create">
			Lưu
		</button>
    </div>
    <input type="hidden" name="id_" id="id_" value="{{$role->id}}">
    <div class="card-body">
        <div class="table-responsive">           
           <table class="table table-hover">
           	 <thead class="table-primary">
     		   <tr class="table-primary">
     		   	 	<th class="table-primary" align="center" style="text-align: center;">
             		   Chức năng
          		    </th>
          		    <th class="table-primary" align="center" style="text-align: center;">
             		   Quyền xem
          		    </th>
          		    <th class="table-primary" align="center" style="text-align: center;">
             		   Quyền thêm
          		    </th>
          		    <th class="table-primary" align="center" style="text-align: center;">
             		   Quyền sửa
          		    </th>
          		    <th class="table-primary" align="center" style="text-align: center;">
             		   Quyền xóa
          		    </th>
     		   </tr>
     		  </thead>
     		  <tbody>
     		  		@foreach($all as $menu)
     		  			<tr class="">
     		  				<td align="center">
     		  				{{$menu->des}}
     		  			</td>
     		  			<td align="center">
     		  				@if($menu->can_read==1)
     		  					<input type="checkbox" name="canread_{{$menu->id}}" checked="true">
     		  				@else
     		  					<input type="checkbox" name="canread_{{$menu->id}}">
     		  				@endif
     		  			</td>
     		  			<td align="center">
							@if($menu->can_create==1)
     		  					<input type="checkbox" name="cancreate_{{$menu->id}}" checked="true">
     		  				@else
     		  					<input type="checkbox" name="cancreate_{{$menu->id}}" >
     		  				@endif     		  			
     		  			</td>
     		  			<td align="center">

							@if($menu->can_edit==1)
     		  					<input type="checkbox" name="canedit_{{$menu->id}}" checked="true">
     		  				@else
     		  					<input type="checkbox" name="canedit_{{$menu->id}}" >
     		  				@endif     		  			
     		  			</td>
     		  			<td align="center">

							@if($menu->can_delete==1)
     		  					<input type="checkbox" name="candelete_{{$menu->id}}" checked="true">
     		  				@else
     		  					<input type="checkbox" name="candelete_{{$menu->id}}" >
     		  				@endif     		  			
     		  			</td>
     		  			</tr>  		  			
     		  		@endforeach

     		  </tbody> 
           </table>
        </div>
    </div>
</div>
	
</form>
@stop
