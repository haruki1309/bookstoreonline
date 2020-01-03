$(document).ready( function () {
    var baseurl = $('meta[name="asset"]').attr('content'); 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.viewProductModal').click(function(){
        var bookid = $(this).parent().parent().data('bookid');

        $.get(baseurl + '/show-book-in-modal/' + bookid, function (data) {
            $('#quickview-wrapper').html(data);
            $('#productModal').modal('show');
        });
    });
});
