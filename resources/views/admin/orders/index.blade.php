@extends('admin.master')

@section('title')
Đơn đặt hàng
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
  var user_id = button.data('user_id') 
  var receiver_name = button.data('receiver_name') 
  var delivery_address = button.data('delivery_address') 
  var phone_number = button.data('phone_number') 
  var status_id = button.data('status_id') 
  var method_payment_id = button.data('method_payment_id') 
  var method_delivery_id = button.data('method_delivery_id') 
  var total_money = button.data('total_money') 

  var modal = $(this)
  modal.find('.modal-title').text('Thông tin đơn hàng')
  modal.find('#id').val(id)
  modal.find('#user_id').val(user_id)
  modal.find('#receiver_name').val(receiver_name)
  modal.find('#delivery_address').val(delivery_address)
  modal.find('#phone_number').val(phone_number)
  modal.find('#status_id').val(status_id)
  modal.find('#method_payment_id').val(method_payment_id)
  modal.find('#method_delivery_id').val(method_delivery_id)
  modal.find('#total_money').val(total_money)


});
</script>
@stop

@section('pageheader')
Danh sách đơn đặt hàng
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Các đơn đặt hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khách hàng</th>
                        <th>Tên người nhận </th>
                        <th>Địa chỉ nhận</th>
                        <th>Số điện thoại </th>
                        <th>Trạng thái</th>
                        <th>Phương thức thanh toán</th>
                        <th>Phương thức vận chuyển</th>
                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($all as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$users->find($order->user_id)->username}}</td>
                        <td>{{$order->receiver_name}}</td>
                        <td>{{$order->delivery_address}}</td>
                        <td>{{$order->phone_number}}</td>
                        <td>{{$status->find($order->status_id)->status_name}}</td>
                        <td>{{$methodpayment->find($order->method_payment_id)->method_name}}</td>
                        <td>{{$methoddeliver->find($order->method_delivery_id)->method_name}}</td>
                        <td>{{$order->total_money}}</td>
{{--                         <td>{{$roles->find($user->role_id)->name}} </td>
 --}}   
                        <td>
                          {{--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                          @if($can_edit==1)
                                <a class="delete btn btn-danger btn-circle ml-1 btn-sm"  data-toggle="modal" data-target="#exampleModal" data-id="{{$order->id}}"  data-user_id="{{$order->user_id}}" data-receiver_name="{{$order->receiver_name}}" data-delivery_address="{{$order->delivery_address}}"  data-phone_number="{{$order->phone_number}}" data-status_id="{{$order->status_id}}" data-method_payment_id="{{$order->method_payment_id}}" data-method_delivery_id="{{$order->method_delivery_id}}"  data-total_money="{{$order->total_money}}">
                                <i class="fas fa-edit"></i>
                            </a>  
                          @endif
                          
                        {{--   @if($can_delete==1)
                            <a href="admin/delete/{{$order->id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm" >
                            <i class="fas fa-trash"></i>
                          </a>

                          @endif
 --}}         
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

      <form method="post" action="orders/edit" >
        @csrf
        <div class="modal-body">
          <input type="hidden" name="type" id="type">
          <input type="hidden" name="id" id="id">

          {{-- <div class="form-group">
            <label  class="col-form-label">Tên khách hàng:</label>
            <input type="text" class="form-control" name = "user_id" id="user_id">
          </div>

          <div class="form-group">
            <label  class="col-form-label">Tên người nhận:</label>
            <input type="text" class="form-control" name = "receiver_name" id="receiver_name">
          </div>

          <div class="form-group">
            <label class="col-form-label">Địa chỉ nhận:</label>
            <input type="text" class="form-control" name = "delivery_address" id="delivery_address">
          </div>

          <div class="form-group">
            <label class="col-form-label">Số điện thoại:</label>
            <input type="text" class="form-control" name = "phone_number" id="phone_number">
          </div>
 --}}
          <div class="form-group">
            <label class="col-form-label">Trạng thái:</label>
             <select class="form-control" name= "status_id" id="status_id" >
                @foreach ($status as $stt)
                   <option value="{{$stt->id}}">{{$stt->status_name}}</option>
                @endforeach
            </select>
          </div>
{{-- 
          <div class="form-group">
            <label  class="col-form-label">Phương thức thanh toán:</label>
            <input type="text" class="form-control" name = "method_payment_id" id="method_payment_id">
          </div>


           <div class="form-group">
             <label class="col-form-label">Phương thức vận chuyển:</label>
              <input type="text" class="form-control"  name= "method_delivery_id" id="method_delivery_id">
            </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Quyền:</label>
    
            <select class="form-control" name= "roleid" id="roleid" >
                @foreach ($roles as $role)
                   <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
          </div>
         --}}
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
