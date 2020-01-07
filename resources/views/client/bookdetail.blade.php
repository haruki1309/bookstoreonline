@extends('client.master')

@section('title')
{{$book->title}}
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('vendor/boostrap-star-rating/star-rating.css')}}">
@stop

@section('js')
<script type="text/javascript" src="{{url('js/client/bookreviewmodal.js')}}"></script>
<script type="text/javascript" src="{{url('js/client/cart.js')}}"></script>
<script type="text/javascript" src="{{url('vendor/boostrap-star-rating/star-rating.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    $('#open-comment').click(function(){
        var isUserLogin = '{{Auth::check()}}';
        if(isUserLogin){
            $('#commentModal').modal('show');
        }
        else{
            $('#loginModal').modal('show');
        }
        
    });

    $('#open-question').click(function(){
        var isUserLogin = '{{Auth::check()}}';
        if(isUserLogin){
            $('#questionModal').modal('show');
        }
        else{
            $('#loginModal').modal('show');
        }
    });

    if('{{Session::has('notify')}}'){
        alert('{{Session::get('notify')}}');
    }

    $('.bookrating').rating({displayOnly: true, step: 0.5});
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
                   <h2>THÔNG TIN SÁCH</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Thông tin sách</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Single Product Area Start -->
<div class="single-product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7">
                <div class="single-product-image-inner">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($book->Picture as $index => $picture)
                        @if($index === 0)
                        <div role="tabpanel" class="tab-pane active" id="{{$picture->id}}">
                            <a class="venobox" href="{{url('1234_db_img/'.$picture->link)}}" data-gall="gallery" title="">
                                <img src="{{url('1234_db_img/'.$picture->link)}}" alt="">
                            </a>
                        </div>
                        @else if
                        <div role="tabpanel" class="tab-pane" id="{{$picture->id}}">
                            <a class="venobox" href="{{url('1234_db_img/'.$picture->link)}}" data-gall="gallery" title="">
                                <img src="{{url('1234_db_img/'.$picture->link)}}" alt="">
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <!-- Nav tabs -->
                    <ul class="product-tabs" role="tablist">
                        @foreach($book->Picture as $index => $picture)
                        @if($index === 0)
                        <li role="presentation" class="active">
                            <a href="{{'#'.$picture->id}}" aria-controls="{{$picture->id}}" role="tab" data-toggle="tab">
                                <img src="{{url('1234_db_img/'.$picture->link)}}" alt="">
                            </a>
                        </li>
                        @else if
                        <li role="presentation">
                            <a href="{{'#'.$picture->id}}" aria-controls="{{$picture->id}}" role="tab" data-toggle="tab">
                                <img src="{{url('1234_db_img/'.$picture->link)}}" alt="">
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-5">
                <div class="single-product-details">
                    <div class="list-pro-rating">
                        <input class="rating-loading bookrating" value="{{$book->rating}}" data-size="xs">
                    </div>
                    <h2>{{$book->title}}</h2>
                    @if($book->inventory_number == 0)
                    <div class="unavailable">
                        <span>{{'Hết hàng'}}</span>
                    </div>
                    @else
                    <div class="availability">
                        <span>{{'Còn hàng'}}</span>
                    </div>
                    @endif
                    <p>{{$book->introduction}}</p>
                    <div class="single-product-price row">
                        @if($book->sale == 0)
                        <div class="new-price">@money($book->price)</div>  
                        @else
                        <div class="new-price col-sm-6">@money($book->price * (100 - $book->sale)/100)</div>
                        <div class="old-price col-sm-6">@money($book->price)</div>  
                        @endif
                    </div>
                    <div class="product-attributes clearfix">
                        <span class="pull-left" id="quantity-wanted-p">
                            <button class="dec qtybutton">-</button>
                            <input type="text" value="1" class="cart-plus-minus-box" min="1" max="{{$book->inventory_number}}" id="french-hens">
                            <button class="inc qtybutton">+</button>    
                        </span>
                        @if($book->inventory_number == 0)
                        <button data-bookid="{{$book->id}}" class="btn-add-to-cart-modal single_add_to_cart_button" disabled="">Thêm vào giỏ hàng</button>
                        @else
                        <button data-bookid="{{$book->id}}" class="btn-add-to-cart-modal single_add_to_cart_button">Thêm vào giỏ hàng</button>
                        @endif
                       
                    </div>
                   
                    <div class="single-product-categories">
                        <label>Thể loại: </label>
                        @foreach($book->Category as $category)
                        <span>{{$category->name.' '}}</span>
                        @endforeach
                    </div>
                    <div id="product-comments-block-extra">
                        <ul class="comments-advices">
                            <li>
                                <a href="javascript:void(0)" class="open-comment-form" id="open-comment">{{'Viết nhận xét'}}</a>
                            </li>
                        </ul>
                    </div>
                    <div id="product-comments-block-extra">
                        <ul class="comments-advices">
                            <li>
                                <a href="javascript:void(0)" class="open-comment-form" id="open-question">{{'Đặt câu hỏi về sản phẩm'}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="p-details-tab-content">
                    <div class="p-details-tab">
                        <ul class="p-details-nav-tab" role="tablist">
                            <li role="presentation" class="active"><a href="#more-info" aria-controls="more-info" role="tab" data-toggle="tab">{{'Mô tả'}}</a></li>
                            <li role="presentation"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">{{'Thông tin'}}</a></li>
                            <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">{{'Nhận xét'}}</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content review">
                        <div role="tabpanel" class="tab-pane active" id="more-info">
                            <p class="col-md-8">{{$book->introduction}}</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="data">
                            <table class="table-data-sheet col-md-8">
                                <tbody>
                                    <tr>
                                        <td>Nhà phát hành</td>
                                        <td>
                                            <a href="{{url('')}}">{{$book->PublishingCompany->name}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nhà xuất bản</td>
                                        <td>
                                            <a href="{{url('')}}">{{$book->Publisher->name}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Năm xuất bản</td>
                                        <td>{{$book->publishing_year}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tác giả</td>
                                        <td>
                                            @foreach($book->Author as $index => $author)
                                            <a href="#">
                                                {{$author->name}}
                                            </a>
                                            @if($index != count($book->Author) - 1)
                                            {{', '}}
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dịch giả</td>
                                        <td>
                                            @foreach($book->Translator as $index => $translator)
                                            <a href="#">
                                                {{$translator->name}}
                                            </a>
                                            @if($index != count($book->Translator) - 1)
                                            {{', '}}
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Loại bìa</td>
                                        <td>{{$book->book_cover}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kích thước</td>
                                        <td>{{$book->book_cover_size.'cm'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Số trang</td>
                                        <td>{{$book->number_of_pages}}</td>
                                    </tr>
                                </tbody>
                           </table>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">
                            @if($book->Comment->count() == 0)
                            <div id="product-comments-block-tab">
                                <a href="javascript:void(0)" class="open-comment comment-btn">{{'Viết nhận xét đầu tiên'}}</a>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="well well-sm">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <div class="row rating-desc">
                                                    <div class="col-xs-3 col-md-3 text-right">
                                                        <span class="fa fa-star"></span>5
                                                    </div>
                                                    <div class="col-xs-8 col-md-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-bg" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="{{'width: '.$bookRate['5star'].'%'}}">
                                                                <span class="sr-only">{{$bookRate['5star'].'%'}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 text-right">
                                                        <span class="fa fa-star"></span>4
                                                    </div>
                                                    <div class="col-xs-8 col-md-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-bg" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="{{'width: '.$bookRate['4star'].'%'}}">
                                                                <span class="sr-only">{{$bookRate['4star'].'%'}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 text-right">
                                                        <span class="fa fa-star"></span>3
                                                    </div>
                                                    <div class="col-xs-8 col-md-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-bg" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="{{'width: '.$bookRate['3star'].'%'}}">
                                                                <span class="sr-only">{{$bookRate['3star'].'%'}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 text-right">
                                                        <span class="fa fa-star"></span>2
                                                    </div>
                                                    <div class="col-xs-8 col-md-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-bg" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="{{'width: '.$bookRate['2star'].'%'}}">
                                                                <span class="sr-only">{{$bookRate['2star'].'%'}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3 col-md-3 text-right">
                                                        <span class="fa fa-star"></span>1
                                                    </div>
                                                    <div class="col-xs-8 col-md-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-bg" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="{{'width: '.$bookRate['1star'].'%'}}">
                                                                <span class="sr-only">{{$bookRate['1star'].'%'}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-6 text-center">
                                                <h1 class="rating-num">{{$book->rating}}</h1>
                                                <div class="rating">
                                                    <input class="rating-loading bookrating" value="{{$book->rating}}" data-size="xs-14">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @foreach($comments as $comment)
                                    <div class="comment-element">
                                        <div class="avt">
                                            <div class="avt-wrap">
                                                <div class="circle">
                                                    {{'T'}}
                                                </div>
                                                <div class="c-user">{{$comment->User->name}}</div>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <div class="c-title">
                                                <input class="rating-loading bookrating" value="{{$comment->stars}}" data-size="xs">
                                                <span>{{$comment->title}}</span>
                                            </div>
                                            <div class="c-date">{{date("d-m-Y", strtotime($comment->created_at))}}</div>
                                            <div class="c-comment">
                                                {{$comment->comment}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
<!-- Single Product Area End -->
@if(count($related) > 0)
<!-- Related Product Area Start -->
<div class="related-product-area">
    <h2 class="section-title">CÓ THỂ BẠN THÍCH?</h2>
    <div class="container">
        <div class="row">
            <div class="related-product indicator-style">
                @foreach($related as $book)
                <div class="col-md-3">
                    <div class="single-banner">
                        <div class="product-wrapper">
                            <a href="javascript:void(0)" class="single-banner-image-wrapper">
                                <img alt="" src="{{url('1234_db_img/'.$book->Picture[0]->link)}}">
                                @if($book->sale > 0)
                                <div class="price">
                                    {{'-'.$book->sale.'%'}}
                                </div>
                                <div class="price-triangle"></div>
                                @endif
                            </a>
                            <div class="product-description" data-bookid="{{$book->id}}">
                                <div class="functional-buttons">
                                    <a href="javascript:void(0)" class="btn-add-to-cart" data-bookid="{{$book->id}}" title="Add to Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    </a>
                                    <a href="javascript:void(0)" title="Quick view" class="viewProductModal">
                                        <i class="fa fa-compress"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-bottom text-center">
                            <div class="rating-icon">
                                <i class="fa fa-star icolor"></i>
                                <i class="fa fa-star icolor"></i>
                                <i class="fa fa-star icolor"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="{{url('books/'.$book->id)}}">{{$book->title}}</a>
                            <div class="row">
                                @if($book->sale == 0)
                                <div class="new-price">@money($book->price)</div>  
                                @else
                                <div class="new-price col-sm-6">@money($book->price * (100 - $book->sale)/100)</div>
                                <div class="old-price col-sm-6">@money($book->price)</div>  
                                @endif  
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Related Product Area End -->
@endif
<!--Quickview Product Start -->
<div id="quickview-wrapper">
</div>
<!--End of Quickview Product--> 

<div class="modal fade" id="commentModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">  
                <h4 class="modal-title">Nhận xét về sản phẩm</h4>
            </div>
            <div class="modal-body">
                <form id="comment-form" action="{{url('books/'.$book->id.'/sendcomment')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="commentRating">1. Đánh giá của bạn về sản phẩm</label>
                        <input id="commentRating" name="commentRating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.5" data-size="sm" required>
                    </div>
                    <div class="form-group">
                        <label for="commentTitle">2. Tiêu đề của nhận xét</label>
                        <input type="text" name="commentTitle" id="commentTitle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="commentContent">3. Viết nhận xét của bạn vào bên dưới</label>
                        <textarea name="commentContent" id="commentContent" class="form-control" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="comment-form" class="btn btn-primary">Gửi bình luận</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="questionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đặt câu hỏi sản phẩm</h4>
            </div>
            <div class="modal-body">
                <form id="question-form" action="{{url('books/'.$book->id.'/sendquestion')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label for="question">Gửi câu hỏi của bạn về sản phẩm</label>
                        <textarea id="question" name="question" class="form-control" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="question-form" class="btn btn-primary">Gửi câu hỏi</button>
            </div>
        </div>
    </div>
</div>
@stop
