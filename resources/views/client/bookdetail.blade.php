@extends('client.master')

@section('title')
{{$book->title}}
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript" src="{{url('js/client/bookreviewmodal.js')}}"></script>
<script type="text/javascript" src="{{url('js/client/cart.js')}}"></script>
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
                        <i class="fa fa-star icolor"></i>
                        <i class="fa fa-star icolor"></i>
                        <i class="fa fa-star icolor"></i>
                        <i class="fa fa-star icolor"></i>
                        <i class="fa fa-star"></i>
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
                    <div class="single-product-price">
                        <h2>@money($book->price)</h2>
                    </div>
                    <div class="product-attributes clearfix">
                        <span class="pull-left" id="quantity-wanted-p">
                            <button class="dec qtybutton">-</button>
                            <input type="text" value="1" class="cart-plus-minus-box" min="1" max="{{$book->inventory_number}}">
                            <button class="inc qtybutton">+</button>    
                        </span>
                        @if($book->inventory_number == 0)
                        <button data-bookid="{{$book->id}}" class="btn-add-to-cart-modal single_add_to_cart_button" disabled="">Thêm vào giỏ hàng</button>
                        @else
                        <button data-bookid="{{$book->id}}" class="btn-add-to-cart-modal single_add_to_cart_button">Thêm vào giỏ hàng</button>
                        @endif
                       
                    </div>
                    <div class="add-to-wishlist">
                        <a class="wish-btn" href="cart.html">
                            <i class="fa fa-heart-o"></i>
                            {{'Thêm vào danh sách yêu thích'}}
                        </a>
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
                                <a href="#" class="open-comment-form">{{'Viết nhận xét'}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
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
                            <p>{{$book->introduction}}</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="data">
                            <table class="table-data-sheet">
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
                            <div id="product-comments-block-tab">
                                <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                            </div>
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
                                <div class="price">@money($book->price)</div>
                            </a>
                            <div class="product-description" data-bookid="{{$book->id}}">
                                <div class="functional-buttons">
                                    <a href="javascript:void(0)" class="btn-add-to-cart" data-bookid="{{$book->id}}" title="Add to Cart">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Add to Wishlist">
                                        <i class="fa fa-heart-o"></i>
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
@stop
