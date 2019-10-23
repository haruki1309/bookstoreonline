@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_book.css')}}">
	<div class="title">QUẢN LÝ SÁCH</div>
		<div class="tool-bar">
			<form action="book-search" method="post" class="search-form" role="search">
				<input type="hidden" name="_token" value="{{csrf_token()}}";>

				<input type="text" name="searchkey" placeholder="Nhập từ khóa...">
				<button type="submit" class="search-btn">Tìm Kiếm</button>
			</form>
			<a href="books/new"><div class="add-btn">Thêm Sách</div></a>
		</div>

		<div class="book-table">
			<table class="book-list">
				<tr>
					<th style="width: 250px;">TÊN SÁCH</th>
					<th style="width: 180px;">TÁC GIẢ</th>
					<th style="width: 100px;">GIÁ BÌA</th>
					<th style="width: 100px;">GIẢM GIÁ</th>
					<th style="width: 100px;">ĐÃ ĐẶT</th>
					<th style="width: 100px;">CÒN LẠI</th>
					<th style="width: 50px;"></th>
				</tr>

				@foreach($allBook as $book)
					<tr>
						<td>{{$book->title}}</td>
						<td>
							@foreach($book->Author as $author)
								<span>{{$author->name}}</span>
							@endforeach
						</td>
						<td>{{$book->price}}</td>
						<td>{{$book->sale}}</td>
						<td>0</td>
						<td>{{$book->inventory_number}}</td>
						<td>
							<a href="books/edit/{{$book->id}}">
								<i class="fas fa-edit"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@stop