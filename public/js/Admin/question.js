$(document).ready(function(){
	$('#form-answer').validate({
		rules: {
			answer: {
				required: true
			}
		},
		messages: {
			answer: {
				required: "Chưa nhập câu trả lời"
			}
		}
	});
});