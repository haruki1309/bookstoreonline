$(document).ready(function(){
	var searchAjax = function(key){
		$.ajaxSetup({
          	headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	}
 		});

 		$.ajax({
			method: 'post',
			url: 'http://localhost/bookstore/public/admin/advertiserment/ajax-search',
			data: {keysearch: key},
			dataType: 'json',
			success:function(response)
			{
				$("#table-search-result").empty();

				var td_str = "<tr>" +
	                    "<th style='width: 60px;'>STT</th>" +
	                    "<th style='width: 300px;'>TÊN SÁCH</th>" +
	                    "<th style='width: 150px;'>TÁC GIẢ</th>" +
	                    "<th style='width: 150px;'>NXB</th>" +
	                    "<th style='width: 150px;'>NPH</th>" +
	                    "<th style='width: 140px;'>GIẢM GIÁ</th>" +
	                    "<th style='width: 60px;'></th>" +
	            	"</tr>";

				$("#table-search-result").append(td_str);

				for(var i = 0; i < response.length; i++)
				{
					var id = response[i].id;
	                var title = response[i].title;
	                var author = response[i].author;
	                var publishingCom = response[i].publishing_com;
	                var publisher = response[i].publisher;
	                var discount = response[i].discount;

	                var tr_str = "<tr>" +
		                    "<td style='width: 60px;'>" + (i+1) + "</td>" +
		                    "<td style='width: 300px;' class='book-name'>" + title + "</td>" +
		                    "<td style='width: 150px;'>" + author + "</td>" +
		                    "<td style='width: 150px;'>" + publishingCom + "</td>" +
		                    "<td style='width: 150px;'>" + publisher + "</td>" +
		                    "<td style='width: 140px;' class='book-discount'>" + discount + " %</td>" +
		                    "<td style='width: 60px;'><i class='fas fa-plus'></i></td>" +
		                    "<input type='hidden' value='" + id + "'>" +
	                    "</tr>";

	                $("#table-search-result").append(tr_str);
	            }
			}
		});
	}

	$('#btnSearchBook').click(function(){
		var keyword = $('#search-input').val();

		searchAjax(keyword);
	});

	$(document).on('click', '#table-search-result i', function(){
		var bookid = $(this).closest('tr').find('input').val();
		var bookName = $(this).closest('tr').find('.book-name').text();
		var discount = $(this).closest('tr').find('.book-discount').text();

		var id = $('#table-advertiserment-book tr').length;

		var tr_str = "<tr>" +
	                    "<td style='width: 60px;'>" + id + "</td>" +
	                    "<td style='width: 300px;' class='book-name'>" + bookName + "</td>" +
	                    "<td style='width: 160px;' class='book-discount'>" + discount + "</td>" +
	                    "<td style='width: 60px;'><i class='fas fa-trash'></i></td>" +
	                    "<input type='hidden' name='bookID[]' value='" + bookid + "'>"
	                "</tr>";

	    $(this).closest('tr').remove();

	    $('#table-advertiserment-book').append(tr_str);
	});

	$(document).on('click', '#table-advertiserment-book i', function(){
		$(this).closest('tr').remove();
	});
});