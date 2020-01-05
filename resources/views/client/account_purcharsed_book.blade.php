@extends('client.master')

@section('title')
Sách đã mua
@stop

@section('css')
@stop

@section('js')
@stop

@section('content')
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Sách đã mua</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Sách đã mua</li>
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
                            <h2 class="sidebar-title text-center">QUẢN LÝ TÀI KHOẢN</h2>
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="{{url('account/order')}}">
                                        Đơn hàng                                    
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('account/information')}}">
                                        Tài khoản                                  
                                    </a>
                                </li>
                                <li>
                                    
                                    <a href="{{url('account/purcharsed-books')}}">
                                        Nhận xét sản phẩm đã mua                                  
                                    </a>
                                </li>
                            </ul>
                        </aside>                             
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="wishlist-right-area table-responsive">
                    <table class="wish-list-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="book-img-th"></th>
                                <th class="">Sách</th>
                                <th class="">Ngày giao</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td>{{$book['order_id']}}</td>
                                <td class="book-img" style="padding: 10px 0;">
                                    <img src="{{url('1234_db_img/'.$book['img'])}}">
                                </td>
                                <td><a href="{{url('books/'.$book['id'])}}">
                                    {{$book['title']}}
                                </a></td>
                                <td>{{$book['receiveDate']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Area End -->
@stop
