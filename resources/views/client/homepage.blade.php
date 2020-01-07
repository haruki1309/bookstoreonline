@extends('client.master')

@section('title')
Trang chủ
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('vendor/boostrap-star-rating/star-rating.css')}}">
@stop

@section('js')
<script type="text/javascript" src="{{url('js/client/bookreviewmodal.js')}}"></script>
<script type="text/javascript" src="{{url('js/client/cart.js')}}"></script>
<script type="text/javascript" src="{{url('vendor/boostrap-star-rating/star-rating.js')}}"></script>
<script type="text/javascript">
    $('.bookrating').rating({displayOnly: true, step: 0.5});
</script>
@stop

@section('content')
<!-- slider Area Start -->
<div class="slider-area">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider" class="slides"> 
            <img src="{{url('asset/img/slider/1.jpg')}}" alt="" title="#slider-direction-1"  />
            <img src="{{url('asset/img/slider/2.jpg')}}" alt="" title="#slider-direction-2"  />
        </div>
        <!-- direction 1 -->
        <div id="slider-direction-1" class="text-center slider-direction">
            <!-- layer 1 -->
            <div class="layer-1">
                <h2 class="title-1">LET’S WRITE IMAGINE</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
                <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- layer 3 -->
            <div class="layer-3">
                <a href="#" class="title-3">SEE MORE</a>
            </div>
        </div>
        <!-- direction 2 -->
        <div id="slider-direction-2" class="slider-direction">
            <!-- layer 1 -->
            <div class="layer-1">
                <h2 class="title-1">LET’S WRITE IMAGINE</h2>
            </div>
            <!-- layer 2 -->
            <div class="layer-2">
                <p class="title-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- layer 3 -->
            <div class="layer-3">
                <a href="#" class="title-3">SEE MORE</a>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->    
<!-- Online Banner Area Start -->    
<div class="online-banner-area">
    <div class="container">
        <div class="banner-title text-center">
            <h2><span>TOP 3 BEST SELLER</span></h2>
        </div>
        <div class="row">
            <div class="banner-list">
                @foreach($bestSellerBooks as $bestSellerBook)
                <div class="col-md-4 col-sm-6">
                    <div class="single-banner">
                        <a href="{{url('books/'.$bestSellerBook->id)}}">
                            <img src="{{url('1234_db_img/'.$bestSellerBook->Picture[0]->link)}}" alt="">
                        </a>
                        <div class="price">{{'-'.$bestSellerBook->sale.'%'}}</div>
                        <div class="banner-bottom text-center">
                            <a href="{{url('books/'.$bestSellerBook->id)}}">
                                {{$bestSellerBook->title}}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Online Banner Area End -->   
<!-- Shop Info Area Start -->   
<div class="shop-info-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-transport"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>Giao hàng nhanh</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-money"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>Giá ưu đãi</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm">
                <div class="single-shop-info">
                    <div class="shop-info-icon">
                        <i class="flaticon-school"></i>
                    </div>
                    <div class="shop-info-content">
                        <h2>Tặng bookcare</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Shop Info Area End -->
<!-- Featured Product Area Start -->
<div class="featured-product-area section-padding">
    <h2 class="section-title">Sản phẩm nổi bật</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-menu">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="first-item active">
                            <a href="#arrival" aria-controls="arrival" role="tab" data-toggle="tab">Sách mới</a>
                        </li>
                        <li role="presentation">
                            <a href="#sale" aria-controls="sale" role="tab" data-toggle="tab">Sách đang giảm giá</a>
                        </li>
                    </ul>
                </div>         
            </div>
        </div>   
        <div class="row">
            <div class="product-list tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="arrival">
                    <div class="featured-product-list indicator-style">
                        @for($i = 0; $i < $books->count()/2; $i++)
                        <div class="single-p-banner">
                            <div class="col-md-3">
                                <div class="single-banner">
                                    <div class="product-wrapper">
                                        <a href="javascript:void(0)" class="single-banner-image-wrapper">
                                            <img alt="" src="{{url('1234_db_img/'.$books[2*$i]->Picture[0]->link)}}">
                                            @if($books[2*$i]->sale > 0)
                                            <div class="price">
                                                {{'-'.$books[2*$i]->sale.'%'}}
                                            </div>
                                            <div class="price-triangle"></div>
                                            @endif
                                        </a>
                                        <div class="product-description" data-bookid="{{$books[2*$i]->id}}">
                                            <div class="functional-buttons">
                                                <a href="javascript:void(0)" class="btn-add-to-cart" data-bookid="{{$books[2*$i]->id}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Quick view" class="viewProductModal">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-bottom text-center">
                                        <div class="rating-icon">
                                            <input class="rating-loading bookrating" value="{{$books[2*$i]->rating}}" data-size="xs">
                                        </div>
                                        <a href="{{url('books/'.$books[2*$i]->id)}}">{{$books[2*$i]->title}}</a>
                                        <div class="row">
                                            @if($books[2*$i]->sale == 0)
                                            <div class="new-price">@money($books[2*$i]->price)</div>  
                                            @else
                                            <div class="new-price col-sm-6">@money($books[2*$i]->price * (100 - $books[2*$i]->sale)/100)</div>
                                            <div class="old-price col-sm-6">@money($books[2*$i]->price)</div>  
                                            @endif  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(2*$i + 1 < $books->count())
                            <div class="col-md-3">
                                <div class="single-banner">
                                    <div class="product-wrapper">
                                        <a href="javascript:void(0)" class="single-banner-image-wrapper">
                                            <img alt="" src="{{url('1234_db_img/'.$books[2*$i + 1]->Picture[0]->link)}}">
                                            @if($books[2*$i+1]->sale > 0)
                                            <div class="price">
                                                {{'-'.$books[2*$i+1]->sale.'%'}}
                                            </div>
                                            <div class="price-triangle"></div>
                                            @endif
                                        </a>
                                        <div class="product-description" data-bookid="{{$books[2*$i+1]->id}}">
                                            <div class="functional-buttons">
                                                <a href="javascript:void(0)" class="btn-add-to-cart" data-bookid="{{$books[2*$i+1]->id}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Quick view" data-toggle="modal" data-target="#productModal" class="viewProductModal">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-bottom text-center">
                                        <div class="rating-icon">
                                            <input class="rating-loading bookrating" value="{{$books[2*$i+1]->rating}}" data-size="xs">
                                        </div>
                                        <a href="{{url('books/'.$books[2*$i+1]->id)}}">{{$books[2*$i + 1]->title}}</a>
                                       <div class="row">
                                            @if($books[2*$i+1]->sale == 0)
                                            <div class="new-price">@money($books[2*$i+1]->price)</div>  
                                            @else
                                            <div class="new-price col-sm-6">@money($books[2*$i+1]->price * (100 - $books[2*$i+1]->sale)/100)</div>
                                            <div class="old-price col-sm-6">@money($books[2*$i+1]->price)</div>  
                                            @endif  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endfor
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="sale">
                    <div class="featured-product-list indicator-style">
                        @for($i = 0; $i < $salingBooks->count()/2; $i++)
                        <div class="single-p-banner">
                            <div class="col-md-3">
                                <div class="single-banner">
                                    <div class="product-wrapper">
                                        <a href="javascript:void(0)" class="single-banner-image-wrapper">
                                            <img alt="" src="{{url('1234_db_img/'.$salingBooks[2*$i]->Picture[0]->link)}}">
                                            @if($salingBooks[2*$i]->sale > 0)
                                            <div class="price">
                                                {{'-'.$salingBooks[2*$i]->sale.'%'}}
                                            </div>
                                            <div class="price-triangle"></div>
                                            @endif
                                        </a>
                                        <div class="product-description" data-bookid="{{$salingBooks[2*$i]->id}}">
                                            <div class="functional-buttons">
                                                <a href="javascript:void(0)" class="btn-add-to-cart" data-bookid="{{$salingBooks[2*$i]->id}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Quick view" class="viewProductModal">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-bottom text-center">
                                        <div class="rating-icon">
                                            <input class="rating-loading bookrating" value="{{$salingBooks[2*$i]->rating}}" data-size="xs">
                                        </div>
                                        <a href="{{url('books/'.$salingBooks[2*$i]->id)}}">{{$salingBooks[2*$i]->title}}</a>
                                        <div class="row">
                                            @if($salingBooks[2*$i]->sale == 0)
                                            <div class="new-price">@money($salingBooks[2*$i]->price)</div>  
                                            @else
                                            <div class="new-price col-sm-6">@money($salingBooks[2*$i]->price * (100 - $salingBooks[2*$i]->sale)/100)</div>
                                            <div class="old-price col-sm-6">@money($salingBooks[2*$i]->price)</div>  
                                            @endif  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(2*$i + 1 < $salingBooks->count())
                            <div class="col-md-3">
                                <div class="single-banner">
                                    <div class="product-wrapper">
                                        <a href="javascript:void(0)" class="single-banner-image-wrapper">
                                            <img alt="" src="{{url('1234_db_img/'.$salingBooks[2*$i + 1]->Picture[0]->link)}}">
                                            @if($salingBooks[2*$i+1]->sale > 0)
                                            <div class="price">
                                                {{'-'.$salingBooks[2*$i+1]->sale.'%'}}
                                            </div>
                                            <div class="price-triangle"></div>
                                            @endif
                                        </a>
                                        <div class="product-description" data-bookid="{{$salingBooks[2*$i+1]->id}}">
                                            <div class="functional-buttons">
                                                <a href="javascript:void(0)" class="btn-add-to-cart" data-bookid="{{$salingBooks[2*$i+1]->id}}" title="Add to Cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Quick view" data-toggle="modal" data-target="#productModal" class="viewProductModal">
                                                    <i class="fa fa-compress"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner-bottom text-center">
                                        <div class="rating-icon">
                                            <input class="rating-loading bookrating" value="{{$salingBooks[2*$i+1]->rating}}" data-size="xs">
                                        </div>
                                        <a href="{{url('books/'.$salingBooks[2*$i+1]->id)}}">{{$salingBooks[2*$i + 1]->title}}</a>
                                       <div class="row">
                                            @if($salingBooks[2*$i+1]->sale == 0)
                                            <div class="new-price">@money($salingBooks[2*$i+1]->price)</div>  
                                            @else
                                            <div class="new-price col-sm-6">@money($salingBooks[2*$i+1]->price * (100 - $salingBooks[2*$i+1]->sale)/100)</div>
                                            <div class="old-price col-sm-6">@money($salingBooks[2*$i+1]->price)</div>  
                                            @endif  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>             
    </div>
</div>
<!-- Featured Product Area End -->
<!--Quickview Product Start -->
<div id="quickview-wrapper">
</div>
<!--End of Quickview Product--> 
@stop
