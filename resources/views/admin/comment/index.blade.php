@extends('admin.master')

@section('title')
Bình luận về sản phẩm
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{url('vendor/bootstrap/css/select2.min.css')}}" rel="stylesheet">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/select2.min.js')}}"></script>
<!-- Page level custom scripts -->
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var is_moderated = button.data('is_moderated') 
  var id = button.data('id') 

  var modal = $(this)
  modal.find('.modal-title').text('Thông tin bình luận')
  modal.find('#is_moderated').val(is_moderated)
  modal.find('#id').val(id)



});
</script>
@stop

@section('pageheader')
Bình luận
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
       
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tài khoản</th>
                        <th>Sách</th>
                        <th>Đánh giá</th>
                        <th>Tiêu đề</th>
                        <th>Bình luận</th>
                        <th>Tạo lúc</th>
                        <th>Phê duyệt</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($all as $cmt)
                    <tr>
                        <td>{{$cmt->id}}</td>
                        <td>{{$users->find($cmt->user_id)->username}}</td>
                        <td>{{$books->find($cmt->book_id)->title}} </td>
                        <td>{{$cmt->stars}} sao </td>
                        <td>{{$cmt->title}} </td>
                        <td>{{$cmt->comment}} </td>
                        <td>{{$cmt->created_at}} </td>
                        <td>
                          @if($cmt->is_moderated==1)
                            Đã duyệt
                          @else
                            Chưa duyệt
                          @endif
                        </td>
                        <td>
                          {{--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                          @if($can_edit==1)
                             <a class="edit btn btn-success btn-circle btn-sm edit-row"  data-toggle="modal" data-target="#exampleModal" data-is_moderated="{{$cmt->is_moderated}}"  data-id = "{{$cmt->id}}" >
                                  <i class="fas fa-edit"></i>
                            </a>  
                          @endif
                          
                          @if($can_delete==1)
                            <a href="comments/delete/{{$cmt->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
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
      <form method="post" action="comments/edit" >
        @csrf
        <div class="modal-body">
          <input type="hidden" name="type" id="type">
          <input type="hidden" name="id" id="id">
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quyền:</label>
            <select class="form-control select2" name ="is_moderated" id="is_moderated">
                <option value="1">Phê duyệt</option>
                <option value="0">Chưa phê duyệt</option>
            </select>
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
