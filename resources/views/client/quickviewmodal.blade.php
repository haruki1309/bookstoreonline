<div class="modal fade" id="productModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-product">
                    <div class="product-images">
                        <div class="main-image images" id="book-img">
                            <img src="{{url('1234_db_img/'.$book->Picture[0]->link)}}">
                        </div>
                    </div>
                    <div class="product-info">
                        <h1 id="book-title">{{$book->title}}</h1>
                        <div class="price-box">
                            <p class="s-price">
                                <span class="special-price">
                                    <span class="amount" id="sale-price">@money($book->price)</span>
                                </span>
                            </p>
                        </div>
                        <a href="{{url('books/'.$book->id)}}" class="see-all" id="link">Xem chi tiết</a>
                        <div class="quick-add-to-cart clearfix">
                            <span class="pull-left" id="quantity-wanted-p">
                                <button class="dec qtybutton">-</button>
                                <input id="french-hens" type="text" value="1" class="cart-plus-minus-box" min="1" max="{{$book->inventory_number}}">
                                <button class="inc qtybutton">+</button>    
                            </span>
                            <button data-bookid="{{$book->id}}" class="btn-add-to-cart-modal single_add_to_cart_button">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="quick-desc" id="book-desc" style="text-align: justify;">
                            {{$book->introduction}}
                        </div>
                    </div><!-- .product-info -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{url('js/client/cart.js')}}"></script>
<script type="text/javascript" src="{{url('js/client/main.js')}}"></script>
