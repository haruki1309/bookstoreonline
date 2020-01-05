@extends('client.master')

@section('title')
Theo dõi đơn hàng
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
                   <h2>Đơn đặt hàng</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Đơn đặt hàng</li>
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
                                <th class="">ID</th>
                                <th class="">Thông tin giao hàng</th>
                                <th class="">Tình trạng</th>
                                <th class="">Ngày giao</th>
                                <th class="">Hủy</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}
                                </td>
                                <td>
                                    <div class="receiver-info">
                                        <div class="receiver-address">{{'Địa chỉ: '.$order->delivery_address}}</div>
                                        <div class="receiver-name">{{'Người nhận: '.$order->receiver_name}}</div>
                                        <div class="receiver-phone">{{'SĐT: '.$order->phone_number}}</div>
                                    </div>
                                    <div class="order-price">
                                        {{'Tổng: '}}@money($order->total_money)
                                    </div>
                                    <div class="delivery-info">
                                        <div class="delivery-name">
                                            {{$order->MethodDelivery->method_name}}
                                        </div>
                                        <div class="payment-name">
                                            {{$order->MethodPayment->method_name}}
                                        </div>
                                    </div>
                                    <div class="book-list">
                                        @foreach($order->Book as $book)
                                        <div class="book-item">
                                            <span>{{$book->title}}</span>
                                            <span>{{$book->pivot->amount.' x '}}@money($book->pivot->price)</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    {{$order->Status->status_name}}
                                </td>
                                <td>
                                    {{date('d-m-Y', strtotime($order->created_at.' + '.$order->MethodDelivery->es_date.' days'))}}
                                </td>
                                <td>
                                    @if($order->Status->id == 1)
                                    <a href="{{url('account/order/'.$order->id.'/delete')}}" class="btn btn-delete" title="Bạn có thể hủy đơn hàng này">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    @endif
                                </td>
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
