@extends('client.master')

@section('title')
Đăng nhập / Đăng ký
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
$(document).ready(function(){
    jQuery.validator.addMethod("phoneVN", function(phone_number, element){
        return this.optional(element) || /(03|05|08|07|09[0-9])+([0-9]{7})/.test(phone_number);
    }, "Sai định dạng số điện thoại");

    jQuery.validator.addMethod("checkEmail", function(value, element) {
        var result = false;
        var url = "{{url('signin/check-email')}}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"POST",
             async: false,
            url: url, // script to validate in server side
            data: {email: value},
            success: function(notExist) {
                result = notExist;
            }
        });
        return result; 
    });

    $('#create-account-form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true,
                checkEmail: true
            },
            phone: {
                required: true,
                phoneVN: true
            },
            password:{
                required: true,
                minLength: 4
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập họ tên"
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Vui lòng nhập đúng định dạng",
                checkEmail: "Email này đã đăng kí tài khoản"
            },
            phone: {
                required: "Vui lòng nhập số điện thoại",
                phoneVN: "Vui lòng nhập đúng định dạng"
            },
            password:{
                required: "Vui lòng nhập mật khẩu",
                minLength: "Mật khẩu chứa ít nhất {0} kí tự}"
            }
        }
    });
});
</script>
@stop

@section('content')
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>ĐĂNG KÍ TÀI KHOẢN MỚI</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Đăng kí</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Loging Area Start -->
<div class="login-account section-padding">
   <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{url('signin')}}" class="create-account-form" id="create-account-form" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h2 class="heading-title">
                        TẠO TÀI KHOẢN
                    </h2>
                    <p class="form-row">
                        <input name="name" type="text" placeholder="Họ và tên">
                    </p>
                    <p class="form-row">
                        <input name="email" type="email" placeholder="Email">
                    </p>
                    <p class="form-row">
                        <input name="phone" type="phone" placeholder="Số điện thoại">
                    </p>
                    <p class="form-row">
                        <input name="password" type="password" placeholder="Mật khẩu">
                    </p>
                    <div class="submit">                    
                        <button id="submitcreate" type="submit" class="btn-default">
                            <span>
                                <i class="fa fa-user left"></i>
                                Tạo tài khoản
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>               
   </div>
</div>
<!-- Loging Area End -->
@stop
