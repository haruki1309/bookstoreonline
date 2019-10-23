@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/bookAdd.css')}}">
	<script type="text/javascript" src="{{asset('js/admin/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/Admin/listbook.js')}}"></script>
	<div class="title">QUẢN LÝ SÁCH | THÊM SÁCH</div>

	<div class="noti-wrapper">
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


	<div class="add-book-form">
		<form class="add-form" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<div class="data-input">
				<label class="name">TÊN SÁCH</label>
				<input type="text" name="title" class="input" autocomplete="off">
			</div>

			<div class="input-wrapper">
				<div class="data-input">
					<label class="name">LOẠI BÌA</label>
					<input type="text" name="cover" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<label class="name">NĂM XB</label>
					<input type="text" name="year" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<label class="name">KÍCH THƯỚC</label>
					<input type="text" name="size" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<div class="name">SỐ TRANG</div>
					<input type="text" name="pages" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<div class="name">SỐ LƯỢNG</div>
					<input type="text" name="inventory" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<div class="name">GIÁ BÌA</div>
					<input type="text" name="price" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<div class="name">GIẢM GIÁ</div>
					<input type="text" name="sale" class="input" autocomplete="off">
				</div>

				<div class="data-input">
					<div class="name">NHÀ XUẤT BẢN</div>
					<select type="text" name="publishingCompany" class="input">
						@foreach($publishingCompany as $pubCom)
							<option>{{$pubCom->name}}</option>							
						@endforeach
					</select>
				</div>

				<div class="data-input">
					<div class="name">NHÀ PHÁT HÀNH</div>
					<select type="text" name="publisher" class="input">
						@foreach($publisher as $publisher)
							<option>{{$publisher->name}}</option>						
						@endforeach
					</select>
				</div>

				<div class="data-input">
					<div class="name">NGÔN NGỮ</div>
					<select type="text" name="language" class="input">
						@foreach($language as $language)
							<option>{{$language->name}}</option>						
						@endforeach
					</select>
				</div>
			</div>

			<div class="input-many-wrapper">
				<dir class="col">
					<div class="data-input-many" id="author-control">
						<div class="name">
							<label>TÁC GIẢ</label>
							<div class="btn-wrap">
								<button id = "del-author" class="btn-data" type="button">
									<i class="fas fa-trash"></i>
								</button>

								<button id = "add-author" class="btn-data" type="button">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
						<div class="control" id="1">
							<select type="text" name="author[]" class="input">	
								@foreach($author as $author)
									<option>{{$author->name}}</option>						
								@endforeach
							</select>
						</div>
					</div>

					<div class="data-input-many" id="translator-control">
						<div class="name">
							<label>DỊCH GIẢ</label>
							<div class="btn-wrap">
								<button id = "del-translator" class="btn-data" type="button">
									<i class="fas fa-trash"></i>
								</button>
								<button id = "add-translator" class="btn-data" type="button">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
						<div class="control" id="1">
							<select type="text" name="translator[]" class="input">
								<option selected="selected">None</option>
								@foreach($translator as $translator)
								<option>{{$translator->name}}</option>						
								@endforeach
							</select>
						</div>
					</div>
					<div class="data-input-many" id="img-control">
						<div class="name">
							<label>HÌNH ẢNH</label>
							<div class="btn-wrap">
								<button id = "del-img" class="btn-data" type="button">
									<i class="fas fa-trash"></i>
								</button>
								<button id = "add-img" class="btn-data" type="button">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
						<div class="control" id="1">
							<input type="file" name="image[]" class="input">
						</div>
					</div>
				</dir>
				<dir class="col">
					<div class="data-input">
						<div class="name">ĐỘ TUỔI</div>
						<select type="text" name="age" class="input">
							@foreach($age as $age)
								<option>{{$age->name}}</option>						
							@endforeach
						</select>
					</div>
					<div class="data-input-many" id="topic-control">
						<div class="name">
							<label>CHỦ ĐỀ</label>
							<div class="btn-wrap">
								<button id = "del-topic" class="btn-data" type="button">
									<i class="fas fa-trash"></i>
								</button>
								<button id = "add-topic" class="btn-data" type="button">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
						<div class="control" id="1">
							<select type="text" name="topic[]" class="input">
								@foreach($topic as $topic)
									<option>{{$topic->name}}</option>						
								@endforeach
							</select>
						</div>
					</div>

					<div class="data-input-many" id="category-control">
						<div class="name">
							<label>THỂ LOẠI</label>
							<div class="btn-wrap">
								<button id = "del-category" class="btn-data" type="button">
									<i class="fas fa-trash"></i>
								</button>
								<button id = "add-category" class="btn-data" type="button">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
						<div class="control" id="1">
							<select type="text" name="category[]" class="input">
								@foreach($category as $category)
									<option>{{$category->name}}</option>					
								@endforeach
							</select>
						</div>
					</div>
				</dir>
			</div>

			<div class="data-input">
				<div class="name">GIỚI THIỆU</div>
				<textarea type="text" name="intro" class="input" id="introduction"></textarea>
			</div>
			<script>
			    CKEDITOR.replace('introduction');
			</script>

			<button class="btn-save" type="submit">Lưu</button>
		</form>
		
	</div>
</div>
@stop