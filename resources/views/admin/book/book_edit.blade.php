@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/bookAdd.css')}}">
	<script type="text/javascript" src="{{asset('js/admin/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/Admin/listbook.js')}}"></script>
	<div class="title">QUẢN LÝ SÁCH | SỬA SÁCH</div>

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
			<input type="hidden" name="_token" value="{{csrf_token()}}";>

			<div class="data-input">
				<label class="name">TÊN SÁCH</label>
				<input type="text" name="title" class="input" autocomplete="off" value="{{$book->title}}">
			</div>

			<div class="input-wrapper">
				<div class="data-input">
					<label class="name">LOẠI BÌA</label>
					<input type="text" name="cover" class="input" autocomplete="off" value="{{$book->book_cover}}">
				</div>

				<div class="data-input">
					<label class="name">NĂM XB</label>
					<input type="text" name="year" class="input" autocomplete="off" value="{{$book->publishing_year}}">
				</div>

				<div class="data-input">
					<label class="name">KÍCH THƯỚC</label>
					<input type="text" name="size" class="input" autocomplete="off" value="{{$book->book_cover_size}}">
				</div>

				<div class="data-input">
					<div class="name">SỐ TRANG</div>
					<input type="text" name="pages" class="input" autocomplete="off" value="{{$book->number_of_pages}}">
				</div>

				<div class="data-input">
					<div class="name">SỐ LƯỢNG</div>
					<input type="text" name="inventory" class="input" autocomplete="off" value="{{$book->inventory_number}}">
				</div>

				<div class="data-input">
					<div class="name">GIÁ BÌA</div>
					<input type="text" name="price" class="input" autocomplete="off" value="{{$book->price}}">
				</div>

				<div class="data-input">
					<div class="name">GIẢM GIÁ</div>
					<input type="text" name="sale" class="input" autocomplete="off" value="{{$book->sale}}">
				</div>

				<div class="data-input">
					<div class="name">NHÀ XUẤT BẢN</div>
					<select type="text" name="publishingCompany" class="input">
						@foreach($publishingCompany as $pubCom)
							@if($pubCom->name == $book->PublishingCompany->name)
								<option selected="selected">{{$pubCom->name}}</option>	
							@else
								<option>{{$pubCom->name}}</option>		
							@endif													
						@endforeach
					</select>
				</div>

				<div class="data-input">
					<div class="name">NHÀ PHÁT HÀNH</div>
					<select type="text" name="publisher" class="input">
						@foreach($publisher as $publisher)
							@if($publisher->name == $book->Publisher->name)
								<option selected="selected">{{$publisher->name}}</option>	
							@else
								<option>{{$publisher->name}}</option>			
							@endif						
						@endforeach
					</select>
				</div>

				<div class="data-input">
					<div class="name">NGÔN NGỮ</div>
					<select type="text" name="language" class="input">
						@foreach($language as $language)
							@if($language->name == $book->Language->name)
								<option selected="selected">{{$language->name}}</option>	
							@else
								<option>{{$language->name}}</option>		
							@endif														
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
						@for($i = 0; $i < count($book->Author); $i++)
						<div class="control" id="{{$i + 1}}">
							<select type="text" name="author[]" class="input">	
								@foreach($author as $author)
									@if($author->name == $book->Author[$i]->name)
										<option selected="selected">{{$author->name}}</option>	
									@else
										<option>{{$author->name}}</option>	
									@endif															
								@endforeach
							</select>
						</div>
						@endfor
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
						@if(count($book->Translator) == 0)
							<div class="control" id="1">
								<select type="text" name="translator[]" class="input">
									<option selected="selected">None</option>
									@foreach($translator as $trans)
									<option>{{$trans->name}}</option>
									@endforeach
								</select>
							</div>
						@else(count($book->Translator) > 0)
							@for($i = 0; $i < count($book->Translator); $i++)
							<div class="control" id="{{$i + 1}}">
								<select type="text" name="translator[]" class="input">
									@foreach($translator as $trans)
										@if($trans->name == $book->Translator[$i]->name)
											<option selected="selected">{{$trans->name}}</option>	
										@else
											<option>{{$trans->name}}</option>
										@endif													
									@endforeach
								</select>
							</div>
							@endfor
						@endif
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
						<div class="control" id="{{$i + 1}}">
							<input type="file" name="image[]" class="input">
						</div>
					</div>
				</dir>
				<dir class="col">
					<div class="data-input">
						<div class="name">ĐỘ TUỔI</div>
						<select type="text" name="age" class="input">
							@foreach($age as $age)
								@if($age->name == $book->Age->name)
									<option selected="selected">{{$age->name}}</option>	
								@else
									<option>{{$age->name}}</option>		
								@endif								
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
						@for($i = 0; $i < count($book->Topic); $i++)
						<div class="control" id="{{$i + 1}}">
							<select type="text" name="topic[]" class="input">
								@foreach($topic as $top)
									@if($top->name == $book->Topic[$i]->name)
										<option selected="selected">{{$top->name}}</option>	
									@else
										<option>{{$top->name}}</option>
									@endif						
								@endforeach
							</select>
						</div>
						@endfor
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
						@for($i = 0; $i < count($book->Category); $i++)
						<div class="control" id="1">
							<select type="text" name="category[]" class="input">
								@foreach($category as $category)
									@if($category->name == $book->Category[$i]->name)
										<option selected="selected">{{$category->name}}</option>	
									@else
										<option>{{$category->name}}</option>	
									@endif				
								@endforeach
							</select>
						</div>
						@endfor
					</div>
				</dir>
			</div>

			<div class="picture-wrap">
				@foreach($book->Picture as $pic)
                <img src="{!!url('/1234_db_img/'.$pic->link)!!}" class="img-ele">
                @endforeach	
			</div>
			<div class="data-input">
				<div class="name">GIỚI THIỆU</div>
				<textarea type="text" name="intro" class="input" id="introduction">
					{{$book->introduction}}
				</textarea>
			</div>
			<script>
			    CKEDITOR.replace('introduction');
			</script>

			<button class="btn-save" type="submit">Lưu</button>
		</form>
	</div>
</div>

@stop