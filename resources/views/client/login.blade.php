@extends('client.master')

@section('title')
Đăng nhập / Đăng ký
@stop

@section('css')
@stop

@section('js')
@stop

@section('content')
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>LOGIN/REGISTER</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="index.html">Home</a>
                        </li>
                        <li>Login</li>
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
            <div class="col-md-6 col-sm-6">
                <form action="#" class="create-account-form" method="post">
                    <h2 class="heading-title">
                        CREATE AN ACCOUNT
                    </h2>
                    <p class="form-row">
                        <input type="email" placeholder="Email address">
                    </p>
                    <div class="submit">                    
                        <button name="submitcreate" id="submitcreate" type="submit" class="btn-default">
                            <span>
                                <i class="fa fa-user left"></i>
                                Create an account
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-6">
               <form action="#" class="create-account-form" method="post">
                    <h2 class="heading-title">
                        ALREADY RESIGTERED?
                    </h2>
                    <p class="form-row">
                        <input type="email" placeholder="Email address">
                    </p>
                    <p class="form-row">
                        <input type="password" placeholder="Password">
                    </p>
                    <p class="lost-password form-group">
                        <a href="#" rel="nofollow">Forgot your password?</a>
                    </p> 
                    <div class="submit">                    
                        <button name="submitcreate" id="submitcreate" type="submit" class="btn-default">
                            <span>
                                <i class="fa fa-user left"></i>
                                SING IN
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
