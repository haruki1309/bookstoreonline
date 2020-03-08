@extends('admin.master')

@section('title')
Thêm sách
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
});
</script>
@stop

@section('pageheader')
Thêm sách
@stop

@section('content')
<div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form thông tin sách</h6> 
    </div>
    <div class="card-body">
        <form method="post" id="book-info-form" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="name">Tên sách</label>
                    <input type="text" name="title" id="name" class="form-control form-control-sm" value="{{old('title')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="cover">Loại bìa</label>
                    <input type="text" name="cover" id="cover" class="form-control form-control-sm" value="{{old('cover')}}">
                </div>
                <div class="col-md-6 form-group">
                    <label for="size">Kích thước</label>
                    <input type="text" name="size" id="size" class="form-control form-control-sm" value="{{old('size')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="year">Năm phát hành</label>
                    <input type="text" name="year" id="year" class="form-control form-control-sm" value="{{old('year')}}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="pages">Số trang</label>
                    <input type="text" name="pages" id="pages" class="form-control form-control-sm" value="{{old('pages')}}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="inventory">Số lượng</label>
                    <input type="text" name="inventory" id="inventory" class="form-control form-control-sm" value="{{old('inventory')}}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="price">Giá bìa</label>
                    <input type="text" name="price" id="price" class="form-control form-control-sm" value="{{old('price')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="publishingCompany">Nhà xuất bản</label>
                    <select name="publishingCompany" class="custom-select select2" id="publishingCompany" value="{{old('publishingCompany')}}">
                        @foreach($publishingCompany as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="publisher">Nhà phát hành</label>
                    <select name="publisher" class="custom-select select2" id="publisher" value="{{old('publisher')}}">
                        @foreach($publisher as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" class="custom-select select2" id="language" value="{{old('language')}}">
                        @foreach($language as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="age">Độ tuổi</label>
                    <select name="age" class="custom-select select2" id="age" value="{{old('age')}}">
                        @foreach($age as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="topic">Chủ đề</label>
                    <select name="topic[]" class="custom-select select2-multi" id="topic" multiple="multiple" value="{{old('topic[]')}}">
                        @foreach($topic as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="category">Thể loại</label>
                    <select name="category[]" class="custom-select select2-multi" id="category" multiple="multiple" value="{{old('category[]')}}">
                        @foreach($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="author">Tác giả</label>
                    <select name="author[]" class="custom-select select2-multi" id="author" multiple="multiple" value="{{old('author[]')}}">
                        @foreach($author as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="translator">Dịch giả</label>
                    <select name="translator[]" class="custom-select select2-multi" id="translator" multiple="multiple" value="{{old('translator[]')}}">
                        @foreach($translator as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="intro">Mô tả</label>
                    <textarea type="text" name="intro" id="intro" class="form-control">{{old('intro')}}</textarea>
                </div>
                <div class="col-md-4">
                    <label for="intro">Hình ảnh</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image[]" multiple>
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
