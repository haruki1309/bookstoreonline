@extends('admin.master')

@section('title')
{{$book->title}}
@stop

@section('css')
<link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{url('vendor/bootstrap-select-2/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendor/bootstrap-select-2/select2-bootstrap.css')}}">
@stop

@section('js')
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('vendor/bootstrap-select-2/select2.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.select2').select2({
        theme: "bootstrap"
    });
    $('.select2-multi').select2({
        theme: "bootstrap"
    });
    $('#publishingCompany').val({!!$book->publishing_company_id!!}).trigger('change');
    $('#publisher').val({!!$book->publisher_id!!}).trigger('change');
    $('#language').val({!!$book->language_id!!}).trigger('change');
    $('#age').val({!!$book->age_id!!}).trigger('change');
    $('#topic').val({!! json_encode($book->Topic()->pluck('topic.id')->toArray()) !!}).trigger('change');
    $('#category').val({!! json_encode($book->Category()->pluck('category.id')->toArray()) !!}).trigger('change');
    $('#author').val({!! json_encode($book->Author()->pluck('author.id')->toArray()) !!}).trigger('change');
    $('#translator').val({!! json_encode($book->Translator()->pluck('translator.id')->toArray()) !!}).trigger('change');
});
</script>
@stop

@section('pageheader')
Sửa sách
@stop

@section('content')
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form thông tin sách</h6> 
    </div>
    <div class="card-body">
        <form method="post" id="book-info-form">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="name">Tên sách</label>
                    <input type="text" name="title" id="name" class="form-control form-control-sm" value="{{$book->title}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="cover">Loại bìa</label>
                    <input type="text" name="cover" id="cover" class="form-control form-control-sm" value="{{$book->book_cover}}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="size">Kích thước</label>
                    <input type="text" name="size" id="size" class="form-control form-control-sm" value="{{$book->book_cover_size}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="year">Năm phát hành</label>
                    <input type="text" name="year" id="year" class="form-control form-control-sm" value="{{$book->publishing_year}}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="pages">Số trang</label>
                    <input type="text" name="pages" id="pages" class="form-control form-control-sm" value="{{$book->number_of_pages}}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="inventory">Số lượng</label>
                    <input type="text" name="inventory" id="inventory" class="form-control form-control-sm" value="{{$book->inventory_number}}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="price">Giá bìa</label>
                    <input type="text" name="price" id="price" class="form-control form-control-sm" value="{{$book->price}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="publishingCompany">Nhà xuất bản</label>
                    <select name="publishingCompany" class="custom-select select2" id="publishingCompany" value="{$book->publishing_company_id}}">
                        @foreach($publishingCompany as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="publisher">Nhà phát hành</label>
                    <select name="publisher" class="custom-select select2" id="publisher" value="{{$book->publisher_id}}">
                        @foreach($publisher as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" class="custom-select select2" id="language" value="{{$book->language_id}}">
                        @foreach($language as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="age">Độ tuổi</label>
                    <select name="age" class="custom-select select2" id="age" value="{{$book->age_id}}">
                        @foreach($age as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="topic">Chủ đề</label>
                    <select name="topic[]" class="custom-select select2-multi" id="topic" multiple="multiple">
                        @foreach($topic as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="category">Thể loại</label>
                    <select name="category[]" class="custom-select select2-multi" id="category" multiple="multiple">
                        @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="author">Tác giả</label>
                    <select name="author[]" class="custom-select select2-multi" id="author" multiple="multiple">
                        @foreach($author as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="translator">Dịch giả</label>
                    <select name="translator[]" class="custom-select select2-multi" id="translator" multiple="multiple">
                        @foreach($translator as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="intro">Mô tả</label>
                    <textarea type="text" name="intro" id="intro" class="form-control">{{$book->introduction}}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="intro">Hình ảnh</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image[]" multiple="">
                        <label class="custom-file-label">Chọn ảnh...</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer clearfix">
        <button class="btn btn-primary pull-right" type="submit" form="book-info-form">Lưu</button>
    </div>
</div>
@stop
