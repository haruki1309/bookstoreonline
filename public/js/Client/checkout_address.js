$(document).ready(function(){

	showFormAddress = function(){
		$('.content .form-address-wrap').animate({'height': '400px'}, 300);
		$('.content .form-address-wrap form').animate({'opacity': '1'}, 500);

		$('.title #btnAddNewAddress').text("Huỷ Bỏ");
		$('.title #btnAddNewAddress').attr('isCancel', 'true')
		$('.title #btnAddNewAddress').css('background', '#FF3B26');
	}

	closeFormAddress = function(){
		$('.content .form-address-wrap').animate({'height': '0px'}, 300);
		$('.content .form-address-wrap form').animate({'opacity': '0'}, 100);

		$('.title #btnAddNewAddress').text("Thêm địa chỉ mới");
		$('.title #btnAddNewAddress').attr('isCancel', 'false');
		$('.title #btnAddNewAddress').css('background', '#189EFF');

		$('.form-address-wrap #receivername').val('');
		$('.form-address-wrap #sdt').val('');
		$('.form-address-wrap #address').val('');

		$('.form-address-wrap #chkDefault').attr('checked', false);

	}

	$('.title #btnAddNewAddress').click(function(){
		$('.form-address-wrap #addressID').val('0');
		if($(this).attr('isCancel') == "false"){
			showFormAddress();
		}
		else if($(this).attr('isCancel') == "true"){
			closeFormAddress();
		}
	});

	$('.list-address #btnEdit').click(function(){
		$name = $(this).closest('.address-wrap').find('.name').text();
		$address = $(this).closest('.address-wrap').find('#address-content').text();
		$phone = $(this).closest('.address-wrap').find('#phone-content').text();
		$isDefault = $(this).closest('.address-wrap').attr('isDefault');
		$addressID = $(this).closest('.address-wrap').attr('addressID');

		$('.form-address-wrap #receivername').val($name);
		$('.form-address-wrap #sdt').val($phone);
		$('.form-address-wrap #address').val($address);
		$('.form-address-wrap #addressID').val($addressID);

		if($isDefault == "true"){
			$('.form-address-wrap #chkDefault').attr('checked', true);
		}
		else if($isDefault == "false"){
			$('.form-address-wrap #chkDefault').attr('checked', false);
		}

		if($('.title #btnAddNewAddress').attr('isCancel') == "false"){
			showFormAddress();
		}
	});

	$('#address-form').validate({
		rules: {
			receivername: {
				required: true,
			},
			sdt: {
				required: true,
				number: true,
				maxlength: 10
			},
			address: {
				required: true
			}
		},
		messages: {
			receivername: {
				required: "vui lòng nhập họ tên"
			},
			sdt: {
				required: "vui lòng nhập số điện thoại",
				number: "sđt không khả dụng",
				maxlength: jQuery.validator.format("nhiều nhất {0} kí tự")
			},
			address: {
				required: "vui lòng nhập địa chỉ"
			}
		}
	});
});