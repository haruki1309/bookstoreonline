@extends('admin.master')

@section('title')
Danh sách người dùng
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

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('whatever') 
  var name = button.data('whatever2') 
  var role = button.data('whatever3') 
  var type = button.data('whatever4') 
  var modal = $(this)
  modal.find('.modal-title').text('Thông tin tài khoản')
  modal.find('#id').val(id)
  modal.find('#name').val(name)
  modal.find('#roleid').val(role)
  modal.find('#type').val(type)

});
</script>
@stop

@section('pageheader')
Danh sách
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
        <a class="btn btn-primary btn-circle btn-sm" id="create-new"  data-toggle="modal" data-target="#exampleModal" data-whatever=""  data-whatever2="" data-whatever3="" data-whatever4="create" >
            <i class="fas fa-plus"></i>
        </a> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Quyền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($all as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$roles->find($user->role_id)->name}} </td>
                        <td>
                          {{--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                          @if($can_edit==1)
                                <a class="delete btn btn-danger btn-circle ml-1 btn-sm"  data-toggle="modal" data-target="#exampleModal" data-whatever="{{$user->id}}"  data-whatever2="{{$user->username}}" data-whatever3="{{$user->role_id}}" data-whatever4="edit"  >
                                <i class="fas fa-edit"></i>
                            </a>  
                          @endif
                          
                          @if($can_delete==1)
                            <a href="admin/delete/{{$user->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
                            <i class="fas fa-trash"></i>
                          </a>

                          @endif
         
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo tài khoản mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="admin/edit" >
        @csrf
        <div class="modal-body">
          <input type="hidden" name="type" id="type">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên :</label>
            <input type="text" class="form-control" name = "name" id="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quyền:</label>
    
            <select class="form-control" name= "roleid" id="roleid" >
                @foreach ($roles as $role)
                   <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mật khẩu mới:</label>
            <input type="text" class="form-control"  name= "password" id="password">
          </div>
       </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
       </form>
    </div>
  </div>
</div>



@stop
