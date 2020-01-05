@extends('client.master')

@section('title')
Theo dõi đơn hàng
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript" src="{{url('js/client/bookreviewmodal.js')}}"></script>
<script type="text/javascript" src="{{url('js/client/cart.js')}}"></script>
<script type="text/javascript">
    $('#changepass').click(function(){
        $('input[name=oldpassword]').attr('required', $(this).is(':checked'));
        $('input[name=oldpassword]').attr('readonly', !$(this).is(':checked'));

        $('input[name=newpassword]').attr('required', $(this).is(':checked'));
        $('input[name=newpassword]').attr('readonly', !$(this).is(':checked'));

        $('input[name=confirmpassword]').attr('required', $(this).is(':checked'));
        $('input[name=confirmpassword]').attr('readonly', !$(this).is(':checked'));
    });
</script>
@stop

@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Thông tin cá nhân</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Thông tin cá nhân</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">QUẢN LÝ TÀI KHOẢN</h2>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="{{url('account/order')}}">
                                        Đơn hàng                                    
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('account/information')}}">
                                        Tài khoản                                  
                                    </a>
                                </li>
                                <li>
                                    
                                    <a href="{{url('account/purcharsed-books')}}">
                                        Nhận xét sản phẩm đã mua                                  
                                    </a>
                                </li>
                            </ul>
                        </aside>                             
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div id="noti-wrapper">
                    @if(count($errors) > 0)
                        <div class="errors">
                            <ul>
                                @foreach($errors->all() as $err)
                                    <li>{{$err}}</li><br>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="notifications">
                            {{session('message')}}<br>
                        </div>
                    @endif
                </div>
                <form action="{{url('/account/information/update')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="oldpassword">Mật khẩu cũ</label>
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label for="newpassword">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmpassword">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="checkbox" name="changepass" id="changepass">
                                <label for="changepass">Thay đổi mật khẩu</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
