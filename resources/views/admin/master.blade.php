<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <link rel="icon" type="image/icon" href="{!!url('asset/icon.ico')!!}" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    
</head>
<body>
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_menu.css')}}">
	<div class="nav">
		<div class="logo">
			<img src="{{asset('asset/Logo.png')}}">
		</div>
		<div class="admin-logo">
			<i class="fas fa-user-cog"></i>
		</div>
		<div class="admin-name">
			<!-- <a href="{{url('admin/logout')}}">ĐĂNG XUẤT</a> -->
		</div>

		<div class="menu">
			<ul class="parent-list">
				<!-- <li class="parent-item">
					<a href="{{url('admin/dashboard')}}" class="btn">
						<i class="fas fa-tachometer-alt"></i><span>DASHBOARD</span>
					</a>
					
				</li> -->

				<li class="parent-item">
					<a href="{{url('admin/books')}}" class="btn">
						<i class="fas fa-book-open"></i><span>SÁCH</span>
					</a>
					<ul class="sub-list">
						<li class="sub-item"><a href="{{url('admin/books/author')}}"><span>TÁC GIẢ</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/translator')}}"><span>DỊCH GIẢ</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/nph')}}"><span>NPH</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/nxb')}}"><span>NXB</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/language')}}"><span>NGÔN NGỮ</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/age')}}"><span>ĐỘ TUỔI</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/topic')}}"><span>CHỦ ĐỀ</span></a></li>
						<li class="sub-item"><a href="{{url('admin/books/category')}}"><span>THỂ LOẠI</span></a></li>
					</ul>
				</li>

				<!-- <li>
					<a href="{{url('admin/users')}}" class="btn">
						<i class="fas fa-users"></i><span>KHÁCH HÀNG</span>
					</a>
				</li>
				<li>
					<a href="{{url('admin/orders')}}" class="btn">
						<i class="fas fa-file-invoice"></i><span>ĐƠN HÀNG</span>
					</a>
				</li>
				<li>
					<a href="{{url('admin/advertiserment')}}" class="btn">
						<i class="fas fa-ad"></i><span>BANNER</span>
					</a>
				</li>
				<li>
					<a href="{{url('admin/comments')}}" class="btn">
						<i class="fas fa-comment"></i><span>COMMENTS</span>
					</a>
				</li>
				<li>
					<a href="{{url('admin/questions')}}" class="btn">
						<i class="fas fa-question-circle"></i><span>QUESTIONS</span>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
	@section('content')
	
	@show
</body>
</html>