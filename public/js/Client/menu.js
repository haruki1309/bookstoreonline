$(document).ready(function(){
	$('#category-menu').mouseenter(function(){
		$('#category-li').animate({'height': '400px'}, 200);

	});

	$('#category-li').mouseleave(function(){
		$('#category-li').animate({'height': '0'}, 200);
	});


	var accountBtn = $('header #account #accountInfo .accountBtn');

	accountBtn.click(function(){
		$(this).closest('#accountInfo').find('.login-panel').css('display', 'block');
		$(this).closest('#accountInfo').find('.login-panel').animate({'opacity': 1}, 200);
		$('#accountInfo').css('background', '#189EFF');
		$('#accountInfo').css('transition', '.2s');
	});

	$('header #account #accountInfo').mouseleave(function(){
		$(this).closest('#accountInfo').find('.login-panel').css('display', 'none');
		$('#accountInfo').css('background', '#1D71AB');
		$('#accountInfo').css('transition', '.6s');
	});

	var showFormLogin = function(){
		$('.bg-popup #form-login .book-id').val(-1);
		$('.bg-popup #form-login .book-qty').val(0);

		$('body').css('overflow', 'hidden');
		$('.bg-popup #form-login').css('display', 'flex');
		$('.bg-popup #form-signin').css('display', 'none');
		$('.bg-popup').css('display', 'flex');
	}

	var showFormSignin = function(){
		if($('.bg-popup #form-login .book-id').val() == -1){
			$('.bg-popup #form-signin .book-id').val(-1);
			$('.bg-popup #form-signin .book-qty').val(0);
		}
		else{
			$('.bg-popup #form-signin .book-id').val($('.bg-popup #form-login .book-id').val());
			$('.bg-popup #form-signin .book-qty').val($('.bg-popup #form-login .book-qty').val());
		}

		$('body').css('overflow', 'hidden');
		$('.bg-popup #form-signin').css('display', 'flex');
		$('.bg-popup #form-login').css('display', 'none');
		$('.bg-popup').css('display', 'flex');
	}

	$('#account #accountInfo #btn-login').click(function(){
		showFormLogin();
	});

	$('#account #accountInfo #btn-signin').click(function(){
		showFormSignin();
	});

	$('#form-login .btn-signin').click(function(){
		showFormSignin();
	});

	$('.bg-popup .form-wrap #form-btn-exit').click(function(){
		$('.bg-popup #form-login .book-id').val(-1);
		$('.bg-popup #form-signin .book-id').val(-1);
		$('body').css('overflow', 'auto');
		$('.bg-popup').css('display', 'none');
	});

	$('.form-wrap #login-form').validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true
			}
		},
		messages: {
			email: {
				required: "Chưa nhập email",
				email: "Email không khả dụng"
			},
			password: {
				required: "Chưa nhập password"
			}
		}
	});
	
	$.validator.addMethod("checkEmail", 
        function(value, element) {
            var result = false;
            var url = 'checkEmail';

            $.ajaxSetup({
	          	headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	}
	 		});
            $.ajax({
                type:"POST",
                async: false,
                url: url, // script to validate in server side
                data: {email: value},
                success: function(notExist) {
                    result = notExist;
                }
            });
            return result; 
    });

   	$.validator.addMethod("checkPhone", 
        function(value, element) {
            var result = false;
            var url = 'checkPhone';

            $.ajaxSetup({
	          	headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	}
	 		});
            $.ajax({
                type:"POST",
                async: false,
                url: url, // script to validate in server side
                data: {phone: value},
                success: function(notExist) {
                    result = notExist;
                }
            });
            return result; 
    });

	$.validator.addMethod("passwordRules", function(value){
		return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       			&& /[a-z]/.test(value) // has a lowercase letter
       			&& /\d/.test(value) // has a digit
	});

	$('.form-wrap #signin-form').validate({
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			phone: {
				required: true,
				maxlength: 10,
				minlength: 10,
				number: true,
				checkPhone: true
			},
			email: {
				required: true,
				email: true,
				checkEmail: true
			},
			password: {
				required: true,
				minlength: 8,
				passwordRules: true
			}
		},
		messages: {
			name: {
				required: "Chưa nhập tên",
				minlength: jQuery.validator.format("Ít nhất {0} kí tự")
			},
			phone: {
				required: "Chưa nhập SĐT",
				number: "SĐT không khả dụng",
				maxlength: jQuery.validator.format("SĐT phải có {0} chữ số"),
				minlength: jQuery.validator.format("SĐT phải có {0} chữ số"),
				checkPhone: "SĐT đã được đăng kí bởi tài khoản khác"
			},
			email: {
				required: "Chưa nhập email",
				email: "Email không khả dụng",
				checkEmail: "Email đã tồn tại"
			},
			password: {
				required: "Chưa nhập password",
				minlength: jQuery.validator.format("Ít nhất {0} kí tự"),
				passwordRules: "It nhất một chữ số và một kí tự in hoa"
			}
		}
	});

	$('#btnNotifyExit').click(function(){
		$('header .bg').remove();
	});
});
