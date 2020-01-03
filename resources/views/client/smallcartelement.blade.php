@foreach($cartContent as $item)
<div class="cart-product">
    <div class="cart-product-image">
        <img src="{{url('1234_db_img/'.$item->options->get('img'))}}" alt="">
    </div>
    <div class="cart-product-info">
        <span style="text-transform: none;">
            <a href="">{{$item->name}}</a> 
            <span>x{{$item->qty}}</span>
        </span>
        
        <a href="">{{$item->options->get('author')}}</a>
        <span class="cart-price">@money($item->options->get('oldprice'))</span>
    </div>
</div>
@endforeach
<div class="total-cart-price">
    <div class="cart-product-line">
        <span>Tạm tính</span>
        <span class="total">{{Cart::total().'đ'}}</span>
    </div>
</div>
<div class="cart-checkout">
    <a href="{{url('/checkout/cart')}}">
        Check out
        <i class="fa fa-chevron-right"></i>
    </a>
</div>
