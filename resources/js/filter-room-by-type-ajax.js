$('#selectType').on('change', function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: 'filter/room/' + $(this).val(),
        success: function (response) {
            $('.listRoom').html(response);
        }
    });
});
