<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="asset" content="{{url('/')}}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Tag icon --> 
    <link rel="shortcut icon" type="image/x-icon" href="{{url('asset/favicon.ico')}}">
    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">

    <!-- Library CSS -->
    <link rel="stylesheet" href="{{url('css/client/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{url('css/client/animate.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{url('css/client/jquery-ui.min.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{url('css/client/meanmenu.min.css')}}">
    <!-- Font-Awesome css -->
    <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{url('css/client/font-awesome.min.css')}}">
    <!-- pe-icon-7-stroke css -->
    <link rel="stylesheet" href="{{url('css/client/pe-icon-7-stroke.css')}}">
    <!-- Flaticon css -->
    <link rel="stylesheet" href="{{url('css/client/flaticon.css')}}">
    <!-- venobox css -->
    <link rel="stylesheet" href="{{url('vendor/venobox/venobox.css')}}" type="text/css" media="screen" />
    <!-- nivo slider css -->
    <link rel="stylesheet" href="{{url('vendor/venobox/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{url('vendor/venobox/preview.css')}}" type="text/css" media="screen" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{url('css/client/owl.carousel.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{url('css/client/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{url('css/client/responsive.css')}}">

    
    @section('css')
    @show
    <script src="{{url('js/client/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!-- Add your site or application content here -->
    <!--Header Area Start-->
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <div class="header-logo">
                        <a href="{{url('homepage')}}">
                            <img src="{{url('asset/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-1 col-sm-6 visible-sm col-xs-6">
                    <div class="header-right">
                        <ul>
                            @if(Auth::check())
                            <li class="shoping-cart">
                                <a href="javascript:void(0)"><i class="flaticon-people"></i></a>
                                <div class="add-to-cart-product">
                                </div>
                            </li>
                            <li class="shoping-cart">
                                <a href="#">
                                    <i class="flaticon-shop"></i>
                                    <span class="nav-cart-count">{{Cart::count()}}</span>
                                </a>
                                <div class="add-to-cart-product">
                                    @foreach(Cart::content() as $item)
                                    <div class="cart-product">
                                        <div class="cart-product-image">
                                            <img src="{{url('1234_db_img/'.$item->options->get('img'))}}" alt="">
                                        </div>
                                        <div class="cart-product-info">
                                            <span style="text-transform: none;">
                                                <a href="">{{$item->name}}</a> 
                                                <span>x{{$item->qty}}</span>
                                            </span>
                                            
                                            <a href="">{{$item->options->get('author')}}</a>
                                            <span class="cart-price">@money($item->options->get('oldprice'))</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="total-cart-price">
                                        <div class="cart-product-line">
                                            <span>Tạm tính</span>
                                            <span class="total">{{Cart::total().'đ'}}</span>
                                        </div>
                                    </div>
                                    <div class="cart-checkout">
                                        <a href="{{url('/checkout/cart')}}">
                                            Check out
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li>
                                <span class="login-btn" data-toggle="modal" data-target="#loginModal">Đăng nhập</span>
                            </li>
                            @endif          
                        </ul>
                    </div>
                </div>                    
                <div class="col-md-9 col-sm-12 hidden-xs">
                    <div class="mainmenu text-center">
                        <nav>
                            <ul id="nav">
                                <li><a href="{{url('homepage')}}">Trang chủ</a></li>
                                <li><a href="{{url('shop')}}">Cửa hàng</a></li>
                                <li><a href="#">Chủ đề</a>
                                    <ul class="sub-menu">
                                        @foreach($menuTopic as $topic)
                                        <li><a href="{{url('topic/'.$topic->id)}}">{{$topic->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Thể loại</a>
                                    <ul class="sub-menu">
                                        @foreach($menuCategory as $category)
                                        <li><a href="{{url('category/'.$category->id)}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>                        
                </div>
                <div class="col-md-1 hidden-sm">
                    <div class="header-right">
                        <ul>
                            @if(Auth::check())
                            <li class="shoping-cart">
                                <a href="javascript:void(0)"><i class="flaticon-people"></i></a>
                                <div class="add-to-cart-product">
                                    <div class="cart-product">
                                        <div class="cart-product-info">
                                            <a href="{{url('account/information')}}" class="account-menu">
                                                <i class="fas fa-user"></i> Tài khoản của tôi
                                            </a>
                                            <a href="{{url('account/order')}}" class="account-menu">
                                                <i class="fas fa-file-invoice"></i>Đơn hàng của tôi
                                            </a>
                                            <a href="{{url('account/purcharsed-books')}}" class="account-menu">
                                                <i class="fas fa-book"></i>Sách đã mua
                                            </a>
                                            <a href="{{url('logout')}}" class="account-menu">
                                                <i class="fas fa-sign-out-alt"></i>Đăng xuất
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="shoping-cart">
                                <a href="#">
                                    <i class="flaticon-shop"></i>
                                    <span class="nav-cart-count">{{Cart::count()}}</span>
                                </a>
                                <div class="add-to-cart-product">
                                    @foreach(Cart::content() as $item)
                                    <div class="cart-product">
                                        <div class="cart-product-image">
                                            <img src="{{url('1234_db_img/'.$item->options->get('img'))}}" alt="">
                                        </div>
                                        <div class="cart-product-info">
                                            <span style="text-transform: none;">
                                                <a href="">{{$item->name}}</a> 
                                                <span>x{{$item->qty}}</span>
                                            </span>
                                            
                                            <a href="">{{$item->options->get('author')}}</a>
                                            <span class="cart-price">@money($item->options->get('oldprice'))</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="total-cart-price">
                                        <div class="cart-product-line">
                                            <span>Tạm tính</span>
                                            <span class="total">{{Cart::total().'đ'}}</span>
                                        </div>
                                    </div>
                                    <div class="cart-checkout">
                                        <a href="{{url('/checkout/cart')}}">
                                            Check out
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li>
                                <span class="login-btn" data-toggle="modal" data-target="#loginModal">Đăng nhập</span>
                            </li>
                            @endif          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Header Area End-->
    <!-- Mobile Menu Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{url('homepage')}}">Trang chủ</a></li>
                                <li><a href="{{url('shop')}}">Cửa hàng</a></li>
                                <li><a href="#">Chủ đề</a>
                                    <ul class="">
                                        <li><a href="about.html">About Us</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Thể loại</a>
                                    <ul class="">
                                        <li><a href="about.html">About Us</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div style="margin-top: 90px;"></div>  
    <!-- Mobile Menu End -->   
    @section('content')
    @show
    <!-- Login Modal Start -->
    <div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="display: inline-block;">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" action="{{url('/login')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </form>
                    <div style="font-size: 13px;">
                        Chưa có tài khoản? 
                        <a href="{{url('signin')}}" style="color: #32b5f3;">Đăng kí ngay</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button form="loginForm" type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal End -->

    <!-- Footer Area Start -->
    <footer>
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-8">
                        <div class="footer-left">
                            <a href="index.html">
                                <img src="{{url('asset/img/logo-2.png')}}" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                            <ul class="footer-contact">
                                <li>
                                    <i class="flaticon-location"></i>
                                    450 fifth Avenue, 34th floor. NYC
                                </li>
                                <li>
                                    <i class="flaticon-technology"></i>
                                    (+800) 123 4567 890
                                </li>
                                <li>
                                    <i class="flaticon-web"></i>
                                    info@bookstore.com
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <div class="single-footer">
                            <h2 class="footer-title">Information</h2>
                            <ul class="footer-list">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Manufactures</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-footer">
                            <h2 class="footer-title">My Account</h2>
                            <ul class="footer-list">
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="account.html">Login</a></li>
                                <li><a href="cart.html">My Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-footer">
                            <h2 class="footer-title">Shop</h2>
                            <ul class="footer-list">
                                <li><a href="#">Orders & Returns</a></li>
                                <li><a href="#">Search Terms</a></li>
                                <li><a href="#">Advance Search</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Group Sales</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-8">
                        <div class="single-footer footer-newsletter">
                            <h2 class="footer-title">Our Newsletter</h2>
                            <p>Consectetur adipisicing elit se do eiusm od tempor incididunt ut labore et dolore magnas aliqua.</p>
                            <form action="#" method="post">
                                <div>
                                    <input type="text" placeholder="email address">
                                </div>
                                <button class="btn btn-search btn-small" type="submit">SUBSCRIBE</button>
                                <i class="flaticon-networking"></i>
                            </form>
                            <ul class="social-icon">
                                <li>
                                    <a href="#">
                                        <i class="flaticon-social"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-social-1"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-social-2"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-video"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 visible-sm">
                        <div class="single-footer">
                            <h2 class="footer-title">Shop</h2>
                            <ul class="footer-list">
                                <li><a href="#">Orders & Returns</a></li>
                                <li><a href="#">Search Terms</a></li>
                                <li><a href="#">Advance Search</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Group Sales</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-bottom-left pull-left">
                            <p>Copyright &copy; 2016 <span><a href="#">DevItems</a></span>. All Right Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-bottom-right pull-right">
                            <img src="{{url('asset/img/paypal.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->
    
    <!-- floating search -->
    <div class="search-container">
        <form action="{{url('search')}}" method="post" autocomplete="off">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="text" placeholder="Tìm kiếm..." name="searchkey">
            <div class="search"></div>
        </form>
    </div>

    <!-- notify modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="notify-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- all js here -->
    
    <!-- jquery latest version -->
    <script src="{{url('js/client/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{url('js/client/bootstrap.min.js')}}"></script>
    <!-- Popper js -->
    <!-- <script src="{{url('js/client/popper.min.js')}}"></script> -->
    <!-- owl.carousel js -->
    <script src="{{url('js/client/owl.carousel.min.js')}}"></script>
    <!-- jquery-ui js -->
    <script src="{{url('js/client/jquery/jquery-ui.min.js')}}"></script>
    <!-- jquery Counterup js -->
    <script src="{{url('js/client/jquery/jquery.counterup.min.js')}}"></script>
    <script src="{{url('js/client/waypoints.min.js')}}"></script> 
    <!-- jquery countdown js -->
    <script src="{{url('js/client/jquery/jquery.countdown.min.js')}}"></script>
    <!-- jquery countdown js -->
    <script src="{{url('vendor/venobox/venobox.min.js')}}"></script>
    <!-- jquery Meanmenu js -->
    <script src="{{url('js/client/jquery/jquery.meanmenu.js')}}"></script>
    <!-- wow js -->
    <script src="{{url('js/client/wow.min.js')}}"></script>   
    <script>
        new WOW().init();
    </script>
    <!-- scrollUp JS -->        
    <script src="{{url('js/client/jquery/jquery.scrollUp.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{url('js/client/plugins.js')}}"></script>
    <!-- Nivo slider js -->
    <script src="{{url('js/client/jquery/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{url('js/client/jquery/jquery.validate.js')}}"></script>
    <script src="{{url('js/client/home.js')}}" type="text/javascript"></script>
    <!-- main js -->
    <script src="{{url('js/client/main.js')}}"></script>
    <script>
        $( document ).ready(function() {
            if('{{count($errors)}}' > 0){

                var errors = <?php echo json_encode($errors->all()); ?>;
                var htmlError = "";
                errors.forEach(function(item){
                    console.log(item);
                    htmlError +=  "<li>"+item+"</li>";
                });

                htmlError = "<ul>"+htmlError+"</ul>";

                $('#notify-modal').find('.modal-title').html('Lỗi');
                $('#notify-modal').find('.modal-body').html(htmlError);
                $('#notify-modal').modal('show');
            }   

            if('{{Session::has('message')}}'){
                $('#notify-modal').find('.modal-title').html('Thông báo');
                $('#notify-modal').find('.modal-body').html('{{Session::get('message')}}');
                $('#notify-modal').modal('show');
            }   
        });
    </script>

    @section('js')
    @show
</body>
</html>

