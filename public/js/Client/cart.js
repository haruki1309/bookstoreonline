$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Number.prototype.moneyformat = function() {
        return this.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') + " VNĐ";
    };

    var addBookToCart = function(_bookID, _qty){
        var baseurl = $('meta[name="asset"]').attr('content'); 
        
        $.ajax({
            method: 'post',
            url: baseurl+'/add-to-cart',
            data: {book_id: _bookID, qty: _qty},
            dataType: 'json',
            success:function(data)
            {
                $('.nav-cart-count').html(data.cartCount);
                $('.add-to-cart-product').html(data.cartView);
            }
        });
    };

    $('.btn-add-to-cart-modal').click(function(){
        var count = $(this).parent().find('#french-hens').val();
        var bookid = $(this).data('bookid');
        addBookToCart(bookid, count);
    });

    $('.btn-add-to-cart').click(function(){
        var bookid = $(this).data('bookid');
        addBookToCart(bookid, 1);
    });

    //in cart detail page 
    $('.cart-delete-item').click(function(){
        var $row = $(this).parent().parent();
        var baseurl = $('meta[name="asset"]').attr('content'); 

        $.ajax({
            method: 'post',
            url: baseurl+'/checkout/cart/delete',
            data: {itemid: $row.data('itemid')},
            dataType: 'json',
            success:function(data)
            {
                $('.nav-cart-count').html(data.cartCount);
                $('.add-to-cart-product').html(data.cartView);
                $('.total-price').html(data.cartTotal + ' đ');
                $row.remove();
            }
        });
    });

    var updateItemQty = function(itemid, qty){
        var baseurl = $('meta[name="asset"]').attr('content'); 
        $.ajax({
            method: 'post',
            url: baseurl+'/checkout/cart/update',
            data: {itemid: itemid, qty: qty},
            dataType: 'json',
            success:function(data)
            {
                $('.nav-cart-count').html(data.cartCount);
                $('.add-to-cart-product').html(data.cartView);
                $('.total-price').html(data.cartTotal + ' đ');
                
            }
        });
    }

    $('.dec-qtybutton').click(function(){
        var $row = $(this).parent().parent().parent();
        var qtyInput = $(this).parent().find('.ip-item-qty');
        var min = qtyInput.attr('min');
        var max = qtyInput.attr('max');

        if(qtyInput.val() > min){
            qtyInput.val(parseInt(qtyInput.val()) - 1);
            updateItemQty($row.data('itemid'), qtyInput.val());

            var tempprice = parseInt(qtyInput.val()) * $row.find('.product-unit-price').attr('price');
            $row.find('.product-price').html(tempprice.moneyformat());
        }
    });

    $('.inc-qtybutton').click(function(){
        var $row = $(this).parent().parent().parent();
        var qtyInput = $(this).parent().find('.ip-item-qty');
        var min = qtyInput.attr('min');
        var max = qtyInput.attr('max');

        if(qtyInput.val() < max){
            qtyInput.val(parseInt(qtyInput.val()) + 1);

            updateItemQty($row.data('itemid'), qtyInput.val());

            var tempprice = parseInt(qtyInput.val()) * $row.find('.product-unit-price').attr('price');
            $row.find('.product-price').html(tempprice.moneyformat());
        }
    });
});
