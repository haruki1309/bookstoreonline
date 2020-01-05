@extends('admin.master')

@section('title')
Thắc mắc về sản phẩm
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
  var id = button.data('id') 
  var answer_details = button.data('answer_details') 
 

  var modal = $(this)
  modal.find('.modal-title').text('Thông tin tài khoản')
  modal.find('#id').val(id)
  modal.find('#answer_details').val(answer_details)
  

});
</script>
@stop

@section('pageheader')
Quảng cáo
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách quảng cáo</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sách</th>
                        <th>Người dùng</th>
                        <th>Thời gian hỏi</th>
                        <th>Chi tiết câu hỏi </th>
                        <th>Admin</th>
                        <th>Thời gian trả lời</th>
                        <th>Chi tiết câu trả lời</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($all as $qus)
                    <tr>
                        <td>{{$qus->id}}</td>
                        <td>{{$books->find($qus->book_id)->title}}</td>
                        <td>{{$admins->find($qus->user_id)->username}} </td>
                        <td>{{$qus->time_ask}}</td>
                        <td>{{$qus->ask_details}}</td>
                        <td>{{$admins->find($qus->admin_id)->username}}</td>
                        <td>{{$qus->time_answer}}</td>
                        <td>{{$qus->answer_details}}</td>
                        <td>
                          {{--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                          @if($can_edit==1)
                                <a class="edit btn btn-success btn-circle btn-sm edit-row"  data-toggle="modal" data-target="#exampleModal" data-id="{{$qus->id}}"  data-answer_details="{{$qus->answer_details}}">
                                <i class="fas fa-edit"></i>
                            </a>  
                          @endif
                          
                          @if($can_delete==1)
                            <a href="questions/delete/{{$qus->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
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
        <h5 class="modal-title" id="exampleModalLabel">Thông tin bình luận</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="questions/edit" >
        @csrf
        <div class="modal-body">
          <input type="hidden" name="type" id="type">
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Câu trả lời:</label>
            <input type="text" class="form-control" name = "answer_details" id="answer_details">
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
