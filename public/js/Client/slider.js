
var sliderfunction = function(){
	setInterval(function(){
		nextSlide();
	}, 8000);
}

$( document ).ready(function() {
	var slider = $(".slider");
	var slideList = $(".slider .slide");
	var count = 1;
	var items = $(".slider .slide .img-wrap").length;
	var prev = $(".prev-btn");
	var next = $(".next-btn");

	var nextSlide = function(){
		if(count < items){
			slideList.animate({'margin-left': '-=100%'}, 1500);
			count++;
		}
		else if(count === items){
			slideList.animate({'margin-left': 0}, 1000);
			count = 1;
		}
	}

	next.click(function(){
		nextSlide();
	});

	prev.click(function(){
		if(count > 1){
			count = count - 2;
			slideList.animate({'margin-left': '+=100%'}, 1500);
			count++;
		}
		else if(count = 1){
			count = items - 1;
			slideList.animate({'margin-left': '-' + (items - 1)*100 + '%'}, 1500);
			count++;
		}
	});
});