$(document).ready(function(){
	var btnAdd = $('.bookDetail .bookDetailAmount .add-book .add-btn');
	var btnRemove = $('.bookDetail .bookDetailAmount .add-book .remove-btn');
	var bookCountEle = $('.bookDetail .bookDetailAmount .add-book .book-number');
	var currentBookCount = bookCountEle.text();
	var btnDelete = $('.bookDetail .bookDetailInfo .deleteButton');

	var updateQtyAjax = function(_bookID, _itemID, _qty){
		var url = 'cart/update';

		$.ajaxSetup({
          	headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	}
 		});

		$.ajax({
			method: 'post',
			url: url,
			data: {book_id: _bookID, id: _itemID, qty: _qty},
			dataType: 'json',
			success:function(data)
			{
				if(data.newQty === 0){
					alert('Số lượng chọn vượt quá số lượng sách tồn trong kho');
				}
				else{
					bookCountEle.text(data.newQty);
					$('#mainNav #cart #cartAmount').text(data.cartCount);
					$('#payingSection #feeSection #temporary #temporaryValue').text(data.cartTotal + " đ");
					$('#payingSection #feeSection #final #finalValue').text(data.cartTotal + " đ");

					$('#category-name').text('GIỎ HÀNG (' + data.cartCount + ' SẢN PHẨM)');
				}
			}
		});
	};

	btnAdd.click(function(){
		var itemID = $(this).closest('.bookDetail').find('#item-id').val();	
		var bookID = $(this).closest('.bookDetail').find('#book-id').val();	
		currentBookCount = bookCountEle.text();
		currentBookCount++;
		updateQtyAjax(bookID, itemID, currentBookCount);		
	});

	btnRemove.click(function(){
		var itemID = $(this).closest('.bookDetail').find('#item-id').val();	
		var bookID = $(this).closest('.bookDetail').find('#book-id').val();
		currentBookCount = bookCountEle.text();

		if(currentBookCount > 1){
			currentBookCount--;
			updateQtyAjax(bookID, itemID, currentBookCount);	
		}
	});

	btnDelete.click(function(){
		var itemID = $(this).closest('.bookDetail').find('#item-id').val();
		var bookID = $(this).closest('.bookDetail').find('#book-id').val();

		var url = 'cart/delete';
		$.ajaxSetup({
          	headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	}
 		});

		$.ajax({
			method: 'post',
			url: url,
			data: {book_id: bookID, id: itemID},
			dataType: 'json',
			success:function(data)
			{
				//update giao dien

				$('#mainNav #cart #cartAmount').text(data.cartCount);

				$('#payingSection #feeSection #temporary #temporaryValue').text(data.cartTotal + " đ");
				$('#payingSection #feeSection #final #finalValue').text(data.cartTotal + " đ");

				$('#category-name').text('GIỎ HÀNG (' + data.cartCount + ' SẢN PHẨM)');

				if(data.cartCount == 0){
					$('#noBooksCart').css('display', 'flex');
					$('#category-name').css('display', 'block');
					$('#mayLike').css('display', 'block');
					$('#booksCart').css('display', 'none');
				}
			}
		});

		$(this).closest('.bookDetail').remove();
	});
});