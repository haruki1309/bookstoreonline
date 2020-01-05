@extends('client.master')

@section('title')
Cửa hàng sách
@stop

@section('css')
@stop

@section('js')
<script type="text/javascript">
    Number.prototype.moneyformat = function() {
        return this.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + " VNĐ";
    };

    var deliveryFee = parseInt($('input[type=radio][name=delivery]:first').attr('price'));
    $('#delivery-fee').html(deliveryFee.moneyformat());
    var brandTotal = parseInt({{$cartTotal}}) + deliveryFee;
    $('#brand-price').html(brandTotal.moneyformat());
    $('#ship-box-information input').attr('readonly', true);

    $('input[type=radio][name=delivery]').change(function(){
        var deliveryFee = parseInt($(this).attr('price'));
        $('#delivery-fee').html(deliveryFee.moneyformat());
        var brandTotal = parseInt({{$cartTotal}}) + deliveryFee;
        $('#brand-price').html(brandTotal.moneyformat());
    });

    $('input[type=radio][name=address]').change(function(){
        var addressId = $(this).val();

        if(addressId == 0){
            $('#ship-box-information input').attr('required', true);
            $('#ship-box-information input').attr('readonly', false);
        }
        else{
            $('#ship-box-information input').attr('required', false);
            $('#ship-box-information input').attr('readonly', true);
            $('#ship-box-information input').val('');
        }
    });

    jQuery.validator.addMethod("phoneVN", function(phone_number, element){
        return this.optional(element) || /(03|05|08|07|09[0-9])+([0-9]{7})/.test(phone_number);
    }, "Sai định dạng số điện thoại");

    $('#order-form').validate({
        rules: {
            receiverName: "required",
            receiverPhone: {
                required: true,
                phoneVN: true,
            },
            receiverAddress: "required",
        },
        messages: {
            receiverName: "Vui lòng nhập họ tên người nhận hàng",
            receiverPhone: {
                required: "Vui lòng nhập số điện thoại",
                phoneVN: "Sai định dạng số điện thoại Việt Nam",

            },
            receiverAddress: "Vui lòng nhập địa chỉ nhận hàng"
        }
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
                   <h2>Thanh toán</h2> 
                   <ul class="breadcrumbs-list">
                        <li>
                            <a title="Return to Home" href="{{url('homepage')}}">Trang chủ</a>
                        </li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- Breadcrumbs Area Start --> 
<!-- Check Out Area Start -->
<div class="check-out-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <form method="post" id="order-form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       <span>1</span>
                                       Địa chỉ giao hàng
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    @if($userAddress->count() > 1)
                                    <div class="payment-met no-padding">
                                        @foreach($userAddress as $index => $item)
                                        <div class="input-group">
                                            @if($index == 0)
                                            <input type="radio" name="address" id="{{'userAddress-'.$item->id}}" value="{{$item->id}}" checked>
                                            @else
                                            <input type="radio" name="address" id="{{'userAddress-'.$item->id}}" value="{{$item->id}}">
                                            @endif
                                            <label for="{{'userAddress-'.$item->id}}">
                                                <div class="address">{{$item->address}}</div>
                                                <div class="receiver">{{'Người nhận: '.$item->receiver_name}}</div>
                                                <div class="phone">{{'SDT: '.$item->phone_number}}</div>
                                            </label>
                                        </div>
                                        @endforeach
                                        <div class="input-group">
                                            <input type="radio" name="address" id="ship-box" value="0">
                                            <label for="ship-box">Giao đến địa chỉ khác</label>
                                        </div>
                                    </div>
                                    <div class="no-padding">
                                        <div id="ship-box-information" class="row"> 
                                            <div class="col-md-6">
                                                <p class="form-row">
                                                    <input name="receiverName" type="text" placeholder="Họ tên *">
                                                </p>
                                            </div>  
                                            <div class="col-md-6">
                                                <p class="form-row">
                                                    <input name="receiverPhone" type="text" placeholder="Số điện thoại *">
                                                </p>
                                            </div>  
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <input name="receiverAddress" type="text" placeholder="Địa chỉ *">
                                                </p>
                                            </div>                                 
                                        </div>
                                    </div> 
                                    @else
                                    <div class="no-padding">
                                        <div id="ship-box" class="row"> 
                                            <div class="col-md-6">
                                                <p class="form-row">
                                                    <input name="receiverName" type="text" placeholder="Họ tên *">
                                                </p>
                                            </div>  
                                            <div class="col-md-6">
                                                <p class="form-row">
                                                    <input name="receiverPhone" type="text" placeholder="Số điện thoại *">
                                                </p>
                                            </div>  
                                            <div class="col-md-12">
                                                <p class="form-row">
                                                    <input name="receiverAddress" type="text" placeholder="Địa chỉ *">
                                                </p>
                                            </div>                               
                                        </div>
                                    </div> 
                                    @endif
                                </div>
                            </div>                                
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       <span>2</span>
                                       Phương thức giao hàng
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="payment-met no-padding">
                                        @foreach($methodDelivery as $index =>$item)
                                        <div class="input-group">
                                            @if($index == 0)
                                            <input type="radio" name="delivery" id="{{'methodDelivery-'.$item->id}}" value="{{$item->id}}" price="{{$item->delivery_fee}}" checked>
                                            @else
                                            <input type="radio" name="delivery" id="{{'methodDelivery-'.$item->id}}" value="{{$item->id}}" price="{{$item->delivery_fee}}">
                                            @endif
                                            <label for="{{'methodDelivery-'.$item->id}}" class="clear-fix">
                                                <h2>{{$item->method_name}}</h2>
                                                <div class="delivery-fee">@money($item->delivery_fee)</div>
                                                <div class="date">{{$item->es_date.' ngày'}}</div>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       <span>3</span>
                                       Phương thức thanh toán
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <div class="payment-met no-padding">
                                        @foreach($methodPayment as $index => $item)
                                        <div class="input-group">
                                            @if($index == 0)
                                            <input type="radio" name="payment" id="{{'methodPayment-'.$item->id}}" value="{{$item->id}}" checked>
                                            @else
                                            <input type="radio" name="payment" id="{{'methodPayment-'.$item->id}}" value="{{$item->id}}">
                                            @endif
                                            <label for="{{'methodPayment-'.$item->id}}" class="clear-fix">
                                                {{$item->method_name}}
                                            </label>
                                        </div>
                                        @endforeach  
                                    </div>            
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="order-review" id="checkout-review">    
                    <div class="table-responsive" id="checkout-review-table-wrapper">
                        <table class="data-table" id="checkout-review-table">
                            <thead>
                                <tr>
                                    <th>Sách</th>
                                    <th>Đơn giá</th>
                                    <th>SL</th>
                                    <th>Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $cartitem)
                                <tr>
                                    <td>
                                        <h6 class="product-name">{{$cartitem->name}}</h6>
                                    </td>
                                    <td class="cart-price">@money($cartitem->price)</td>
                                    <td class="check-price">{{$cartitem->qty}}</td>
                                    <td class="cart-price">@money($cartitem->price * $cartitem->qty)</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Tổng</td>
                                    <td><span class="check-price">@money($cartTotal)</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3">Phí giao hàng</td>
                                    <td id="delivery-fee"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Thành tiền</strong></td>
                                    <td><strong id="brand-price"></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div id="checkout-review-submit">
                        <div class="cart-btn-3" id="review-buttons-container">
                            <p class="left">Thiếu? <a href="{{url('checkout/cart')}}">Sửa giỏ hàng</a></p>
                            <button type="submit" form="order-form" class="btn btn-default"><span>Đặt hàng</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Check Out Area End -->
@stop
