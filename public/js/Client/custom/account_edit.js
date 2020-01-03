$(document).ready(function(){
	var showChangePassForm = function(){
		$('.change-pass-wrap').animate({'height': '210px', 'opacity': 1}, 300)
	}

	var hideChangePassForm = function(){
		$('.change-pass-wrap').animate({'height': '0', 'opacity': 0}, 200)
	}

	$('#ip-chk').change(function(){
		if(this.checked){
			$(this).val("check");
			showChangePassForm();
		}
		else{
			$(this).val("uncheck");
			hideChangePassForm();
		}
	});

	$.validator.addMethod("passwordRules", function(value){
		return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       			&& /[a-z]/.test(value) // has a lowercase letter
       			&& /\d/.test(value) // has a digit
	});

	$('#form-edit-info').validate({
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
			},
			newPass: {
				minlength: 8,
				//passwordRules: true
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
			},
			newPass: {
				minlength: jQuery.validator.format("Ít nhất {0} kí tự"),
				//passwordRules: "Ít nhất một chữ số và một kí tự in hoa"
			}
		}
	});

});