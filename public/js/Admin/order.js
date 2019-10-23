$(document).ready(function(){
	$(document).on('click', '.tab-item', function(){
		var tab = $(this).attr('tab');

		for(i = 1; i <= 4; i++){
			$('#tab-' + i).css('display', 'none');

			$('#tab-item-' + i).addClass('tab-item');
			$('#tab-item-' + i).removeClass('tab-item-selected');	
		}

		$('#' + tab).css('display', 'block');

		$(this).removeClass('tab-item');
		$(this).addClass('tab-item-selected');
	});
});