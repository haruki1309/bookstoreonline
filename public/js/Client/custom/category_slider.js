


$( document ).ready(function(){
	$('.catalog').each(function(){
		var btnNext = $(this).find('.catalogImage .next-btn');
		var btnPrev = $(this).find('.catalogImage .prev-btn');
		var bookNumber = $(this).find('.catalogImage .slide-wrap').attr('bookNumber');
		var slide = $(this).find('.catalogImage .slide-wrap .slide');

		var slideIndex = 1;
		var slideNumber = Math.floor(bookNumber / 5);

		if(bookNumber % 5 > 0){
			slideNumber++;
		}

		btnNext.click(function(){
			if(slideIndex < slideNumber){
				slide.animate({'margin-left': '-=100%'}, 1600);
				slideIndex++;
			}
			else if(slideIndex === slideNumber){
				slide.animate({'margin-left': 0}, slideNumber * 500);
				slideIndex = 1;
			}
		});


		btnPrev.click(function(){	
			if(slideIndex > 1){
				slide.animate({'margin-left': '+=100%'}, 1500);
				slideIndex--;		
			}
			else if(slideIndex == 1){
				slide.animate({'margin-left': '-' + (slideNumber - 1)*100 + '%'}, slideNumber * 500);
				slideIndex = slideNumber;
			}
		});
	});
});