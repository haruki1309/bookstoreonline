@extends('client.master')

@section('title')
Cửa hàng sách
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript" src="{{url('js/client/cart.js')}}"></script>
@stop

@section('content')
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumbs">
                   <h2>Giỏ hàng</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Cart Area Start -->
<div class="shopping-cart-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="shopingcart-bottom-area">
                    <a class="left-shoping-cart" href="{{url('/shop')}}">Tiếp tục mua</a>
                    <!-- <div class="shopingcart-bottom-area pull-right">
                        <a class="right-shoping-cart" href="#">Clear</a>
                    </div> -->
                </div> 
                <div class="wishlist-table-area table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-remove">Xóa</th>
                                <th class="product-image">Hình ảnh</th>
                                <th class="t-product-name">Sách</th>
                                <th class="product-unit-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Tạm tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $item)
                            <tr data-itemid="{{$item->rowId}}">
                                <td class="product-remove">
                                    <button class="btn bg-primary cart-delete-item"><i class="flaticon-delete"></i></button>
                                </td>
                                <td class="product-image">
                                    <img src="{{url('1234_db_img/'.$item->options->get('img'))}}" alt="">
                                </td>
                                <td class="t-product-name">
                                    <a href="{{url('books/'.$item->id)}}">{{$item->name}}</a>
                                </td>
                                <td class="product-unit-price" price="{{$item->price}}">
                                    @money($item->price)
                                </td>
                                <td class="product-quantity">
                                    <div class="product-quantity-wrap">
                                        <button class="dec-qtybutton">-</button>
                                        <input class="ip-item-qty" type="text" value="{{$item->qty}}" min="1" max="4">
                                        <button class="inc-qtybutton">+</button>   
                                    </div>
                                </td>
                                <td class="product-quantity product-price">
                                    @money($item->price * $item->qty) 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                   
            </div>
            <div class="col-md-4">
                <div class="subtotal-main-area">
                    <div class="subtotal-area">
                        <h2>Tổng<span class="total-price">@money((float)Cart::total(2, ',', ''))</span></h2>
                    </div>
                    <a href="{{url('checkout/information')}}">Thanh toán</a>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
@stop
