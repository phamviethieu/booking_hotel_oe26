$('body').on('click', '.roomDetail', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: 'booking/room/' + $(this).data('id'),
        success: function (response) {
            $(".showBooking").html(response);
        }
    });
})
