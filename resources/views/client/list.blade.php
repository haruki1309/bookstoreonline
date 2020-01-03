@extends('client.master')

@section('title')
Cửa hàng sách
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
                   <h2>{{$viewname}}</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>{{$viewname}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Shop Area Start -->
<div class="shopping-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="shop-widget">
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">Thể loại</h2>
                            <ul class="sidebar-menu">
                                @foreach($menuCategory as $category)
                                <li>
                                    <a href="{{url('category/'.$category->id)}}">
                                        {{$category->name}}                                     
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>                            
                    </div>
                    <div class="shop-widget-bottom">
                        <aside class="widget widget-tag">
                            <h2 class="sidebar-title">Chủ đề</h2>
                            <ul class="tag-list">
                                @foreach($menuTopic as $topic)
                                <li>
                                    <a href="{{url('topic/'.$topic->id)}}">{{$topic->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                    <div class="shop-widget-top">
                        <aside class="widget widget-categories">
                            <h2 class="sidebar-title text-center">Nhà phát hành</h2>
                            <ul class="sidebar-menu">
                                @foreach($menuPublisher as $publisher)
                                <li>
                                    <a href="{{url('publisher/'.$publisher->id)}}">
                                        {{$publisher->name}}                                     
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>                            
                    </div>
                    <div class="shop-widget-bottom">
                        <aside class="widget widget-tag">
                            <h2 class="sidebar-title">Độ tuổi</h2>
                            <ul class="tag-list">
                                @foreach($menuAge as $age)
                                <li>
                                    <a href="{{url('age/'.$age->id)}}">{{$age->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                    <div class="shop-widget-bottom">
                        <aside class="widget widget-tag">
                            <h2 class="sidebar-title">Ngôn ngữ</h2>
                            <ul class="tag-list">
                                @foreach($menuLanguage as $language)
                                <li>
                                    <a href="{{url('language/'.$language->id)}}">{{$language->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="shop-tab-area">
                    <div class="shop-tab-list">
                        <div class="shop-tab-pill pull-left">
                            <ul>
                                <li class="active" id="left"><a data-toggle="pill" href="#home"><i class="fa fa-th"></i><span>Grid</span></a></li>
                                <li><a data-toggle="pill" href="#menu1"><i class="fa fa-th-list"></i><span>List</span></a></li>
                            </ul>
                        </div>
                        <div class="shop-tab-pill pull-right">
                            <ul>
                                <li class="product-size-deatils">
                                    <div class="show-label">
                                        <label>Show : </label>
                                        <select>
                                            <option value="10" selected="selected">10</option>
                                            <option value="09">09</option>
                                            <option value="08">08</option>
                                            <option value="07">07</option>
                                            <option value="06">06</option>
                                        </select>
                                    </div>
                                </li>
                                <li class="product-size-deatils">
                                    <div class="show-label">
                                        <label><i class="fa fa-sort-amount-asc"></i>Sort by : </label>
                                        <select>
                                            <option value="position" selected="selected">Position</option>
                                            <option value="Name">Name</option>
                                            <option value="Price">Price</option>
                                        </select>
                                    </div>
                                </li>   
                                <li class="shop-pagination"><a href="#">1</a></li>
                                <li class="shop-pagination"><a href="#">2</a></li>
                                <li class="shop-pagination"><a href="#"><i class="fa fa-caret-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="row tab-pane fade in active" id="home">
                            <div class="shop-single-product-area row">
                                @foreach($books as $book)
                                <div class="col-md-4 col-sm-6">
                                    <div class="single-banner">
                                        <div class="product-wrapper">
                                            <a href="" class="single-banner-image-wrapper">
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
                                            <div class="banner-bottom-title">
                                                <a href="{{url('books/'.$book->id)}}">
                                                    {{$book->title}}
                                                </a>
                                            </div>
                                            <div class="rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                             @foreach($books as $book)
                            <div class="row">
                                <div class="single-shop-product">
                                    <div class="col-xs-12 col-sm-5 col-md-4">
                                        <div class="left-item">
                                            <a href="single-product.html" title="East of eden">
                                                <img src="{{url('1234_db_img/'.$book->Picture[0]->link)}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">                             
                                        <div class="deal-product-content">
                                            <h4>
                                                <a href="{{url('books/'.$book->id)}}">
                                                    {{$book->title}}
                                                </a>
                                            </h4>
                                            <div class="product-price">
                                                <span class="new-price">@money($book->price)</span>
                                                <span class="old-price">@money($book->price)</span>
                                            </div>
                                            <div class="list-rating-icon">
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star icolor"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>{{$book->introduction}}</p>
                                            <div class="availability">
                                                <span>{{'Còn hàng'}}</span>
                                                <button data-bookid="{{$book->id}}" class="btn-add-to-cart">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Area End -->

<!--Quickview Product Start -->
<div id="quickview-wrapper">
</div>
<!--End of Quickview Product--> 
@stop
