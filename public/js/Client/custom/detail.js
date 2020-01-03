


$(document).ready(function(){
	var numberBook = $('.book-control .add-book .book-number');
	var number = numberBook.text();
	$('.book-control .add-book .remove-btn').click(function(){
		if(number == 1){
			number = 1;
		}
		else{
			number--;
		}
		numberBook.text(number);
	});

	$('.book-control .add-book .add-btn').click(function(){
		number++;
		numberBook.text(number);
	});

	$('.book-pic .book-list-pic .img-item-wrap').click(function(){
		var selSrc = $(this).find('img').attr('src');
		$('.book-pic .sel-pic img').attr('src', selSrc);
	});


	var showFormLogin = function(){
		var bookID = $('#book-id').val();
		$('.bg-popup #form-login .book-id').val(bookID);
		$('.bg-popup #form-login .book-qty').val($('.book-control .add-book .book-number').text());

		$('body').css('overflow', 'hidden');
		$('.bg-popup #form-login').css('display', 'flex');
		$('.bg-popup #form-signin').css('display', 'none');
		$('.bg-popup').css('display', 'flex');
	}


	$('.book-control .add-to-cart').click(function(){
		var bookID = $('#book-id').val();
		var url = '../add-to-cart/' + bookID;

		$.ajaxSetup({
          	headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	}
 		});

 		if($(this).attr("isLogin") === "true"){
 			$.ajax({
				method: 'post',
				url: url,
				data: {qty: $('.book-control .add-book .book-number').text()},
				success:function(cartCount){
					$('#mainNav #cart #cartAmount').text(cartCount);

					if(cartCount == 0){
						alert('Số lượng chọn vượt quá số lượng sách tồn trong kho');
					}
				}
			});
 		}
 		else if($(this).attr("isLogin") === "false"){
 			showFormLogin();
 		}
	});

	$('#btnQuest').click(function(){
		if($(this).attr("isLogin") === "false"){
			showFormLogin();
		}
	});

	$('#question-form').validate({
		rules: {
			question: {
				required: true
			}
		},
		messages: {
			question: {
				required: "Chưa nhập câu hỏi"
			}
		}
	});

	$('#btnShareComment').click(function(){
		if($(this).attr('isLogin') === "true"){
			if($(this).attr('isClosing') === "true"){
				$('.comment-form').animate({'height': '420px', 'opacity': '1'}, 300);
				$(this).attr('isClosing', 'false');
				$(this).text("Đóng");
			}
			else if($(this).attr('isClosing') === "false"){
				$('.comment-form').animate({'height': '0px', 'opacity': '0'}, 200);
				$(this).attr('isClosing', 'true');
				$(this).text("Viết nhận xét của bạn");
			}
		}
		else if($(this).attr('isLogin') === "false"){
			showFormLogin();
		}
	});

	var starRating = $('.comment-session .comment-form .input-wrap .rating');
	var star1 = $('.comment-session .comment-form .input-wrap .rating #star-1');
	var star2 = $('.comment-session .comment-form .input-wrap .rating #star-2');
	var star3 = $('.comment-session .comment-form .input-wrap .rating #star-3');
	var star4 = $('.comment-session .comment-form .input-wrap .rating #star-4');
	var star5 = $('.comment-session .comment-form .input-wrap .rating #star-5');

	var resetStar = function(){
		star1.removeClass('fas fa-star');
		star2.removeClass('fas fa-star');
		star3.removeClass('fas fa-star');
		star4.removeClass('fas fa-star');
		star5.removeClass('fas fa-star');

		star1.addClass('far fa-star');
		star2.addClass('far fa-star');
		star3.addClass('far fa-star');
		star4.addClass('far fa-star');
		star5.addClass('far fa-star');
	}

	star1.click(function(){
		resetStar();
		star1.addClass('fas fa-star');
		$('#star-count').val("1");
	});

	star2.click(function(){
		resetStar();
		star1.addClass('fas fa-star');
		star2.addClass('fas fa-star');
		$('#star-count').val("2");
	});

	star3.click(function(){
		resetStar();
		star1.addClass('fas fa-star');
		star2.addClass('fas fa-star');
		star3.addClass('fas fa-star');
		$('#star-count').val("3");
	});

	star4.click(function(){
		resetStar();
		star1.addClass('fas fa-star');
		star2.addClass('fas fa-star');
		star3.addClass('fas fa-star');
		star4.addClass('fas fa-star');
		$('#star-count').val("4");
	});

	star5.click(function(){
		star1.addClass('fas fa-star');
		star2.addClass('fas fa-star');
		star3.addClass('fas fa-star');
		star4.addClass('fas fa-star');
		star5.addClass('fas fa-star');
		$('#star-count').val("5");
	});

	$.validator.addMethod("checkStar", function(value){
		if(value == "0"){
			return true;
		}
		else{
			return false;
		}
	});

	$('#comment-form').validate({
		rules: {
			starCount: {
				checkStar: true
			},
			commentTitle: {
				required: true
			},
			commentContent: {
				required: true
			}
		},
		messages: {
			starCount: {
				checkStar: "(*) Chưa bình chọn sao"
			},
			commentTitle: {
				required: "(*) Chưa nhập tiêu đề"
			},
			commentContent: {
				required: "(*) Chưa nhập nhận xét"
			}
		}
	});
});