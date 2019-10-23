$(document).ready(function(e){			
	var authorNumber = 1;

	$("#add-author").on('click', function(){
		var authorEle = $("#author-control #1").clone();
		
		authorNumber++;
		authorEle.attr("id", authorNumber);

		$("#author-control").append(authorEle.clone());
	});

	$("#del-author").on('click', function(){

		var id = "#author-control #" + authorNumber;
		if(authorNumber > 1){
			authorNumber--;

			$(id).remove();	
		}
	});

	var translatorNumber = 1;

	$("#add-translator").on('click', function(){
		var translatorEle = $("#translator-control #1").clone();
		
		translatorNumber++;
		translatorEle.attr("id", translatorNumber);

		$("#translator-control").append(translatorEle.clone());
	});

	$("#del-translator").on('click', function(){

		var id = "#translator-control #" + translatorNumber;
		if(translatorNumber > 1){
			translatorNumber--;

			$(id).remove();	
		}
	});

	var topicNumber = 1;

	$("#add-topic").on('click', function(){
		var topicEle = $("#topic-control #1").clone();
		
		topicNumber++;
		topicEle.attr("id", topicNumber);

		$("#topic-control").append(topicEle.clone());
	});

	$("#del-topic").on('click', function(){

		var id = "#topic-control #" + topicNumber;
		if(topicNumber > 1){
			topicNumber--;

			$(id).remove();	
		}
	});

	var categoryNumber = 1;

	$("#add-category").on('click', function(){
		var categoryEle = $("#category-control #1").clone();
		
		categoryNumber++;
		categoryEle.attr("id", categoryNumber);

		$("#category-control").append(categoryEle.clone());
	});

	$("#del-category").on('click', function(){

		var id = "#category-control #" + categoryNumber;
		if(categoryNumber > 1){
			categoryNumber--;

			$(id).remove();	
		}
	});

	var imgNumber = 1;

	$("#add-img").on('click', function(){
		var imgEle = $("#img-control #1").clone();
		
		imgNumber++;
		imgEle.attr("id", imgNumber);

		$("#img-control").append(imgEle.clone());
	});

	$("#del-img").on('click', function(){

		var id = "#img-control #" + imgNumber;
		if(imgNumber > 1){
			imgNumber--;

			$(id).remove();	
		}
	});
});