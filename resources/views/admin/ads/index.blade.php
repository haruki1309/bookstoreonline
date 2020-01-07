@extends('admin.master')

@section('title')
Giảm giá
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
  var title = button.data('title') 
  var detail = button.data('detail') 
  var startDate = button.data('startDate') 
  var endDate = button.data('endDate') 
  var image_link = button.data('image_link') 
  var type = button.data('type') 

  var modal = $(this)
  modal.find('.modal-title').text('Thông tin tài khoản')
  modal.find('#id').val(id)
  modal.find('#title').val(title)
  modal.find('#detail').val(detail)
  modal.find('#startDate').val(startDate)
  modal.find('#endDate').val(endDate)
  modal.find('#image_link').val(image_link)
  modal.find('#type').val(type)

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
          @if($can_create)
            <a class="delete btn btn-danger btn-circle ml-1 btn-sm"  data-toggle="modal" data-target="#exampleModal" data-id=""  data-title="" data-detail="" data-startDate=""  data-endDate=""  data-image_link="" data-type="create">
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
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc </th>
                        <th>Hình ảnh</th>
                        <th>  </th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($all as $ads)
                    <tr>
                        <td>{{$ads->id}}</td>
                        <td>{{$ads->title}}</td>
                        <td>{{$ads->detail}} </td>
                        <td>{{$ads->startDate}}</td>
                        <td>{{$ads->endDate}}</td>
                        <td>{{$ads->image_link}}</td>

                        <td>
                          {{--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                          @if($can_edit==1)
                                <a class="edit btn btn-success btn-circle btn-sm edit-row"  data-toggle="modal" data-target="#exampleModal" data-id="{{$ads->id}}"  data-title="{{$ads->title}}" data-detail="{{$ads->detail}}" data-startDate="{{$ads->startDate}}"  data-endDate="{{$ads->endDate}}"  data-image_link="{{$ads->image_link}}" data-type="edit">
                                <i class="fas fa-edit"></i>
                            </a>  
                          @endif
                          
                          @if($can_delete==1)
                            <a href="admin/delete/{{$ads->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
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
      <form method="post" action="advertiserment/edit" >
        @csrf
        <div class="modal-body">
          <input type="hidden" name="type" id="type">
          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tiêu đề :</label>
            <input type="text" class="form-control" name = "title" id="title">
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nội dung :</label>
            <input type="text" class="form-control" name = "detail" id="detail">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ngày bắt đầu</label>
            <input type="text" class="form-control" name = "startDate" id="startDate">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ngày kết thúc</label>
            <input type="text" class="form-control" name = "endDate" id="endDate">
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hình ảnh</label>
            <input type="text" class="form-control" name = "image_link" id="image_link">
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
