$('body').on('click', '.cancel', function () {
    var id = $(this).attr('data-id');
    Swal.fire({
        title: 'Hủy booking?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tiếp tục hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: 'bookings/update-status',
                data: {
                    'id': $(this).attr('data-id'),
                    'status': $(this).attr('data-status')
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Hủy đơn thành công',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('.badge-booking-list-approved').html(response.approve_booking_count);
                    $('.badge-booking-list-unapprove').html(response.unapprove_booking_count);
                }
            });
            $(this).attr("data-status", "1");
            $(this).find("i").removeClass('fa-times-circle').addClass('fa-check-circle');
            $(this).removeClass('btn-default cancel').addClass('btn-success approve');
            $(this).attr("title", 'Duyệt');
            $('.' + 'badge' + id).removeClass('badge-primary').addClass('badge-warning');
            $('.' + 'badge' + id).text('Chưa duyệt');
        }
    })
});
$('body').on('click', '.approve', function () {
    var id = $(this).attr('data-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: 'bookings/update-status',
        data: {
            'id': $(this).attr('data-id'),
            'status': $(this).attr('data-status')
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Chấp nhận thành công',
                showConfirmButton: false,
                timer: 1500
            })
            $('.badge-booking-list-approved').html(response.approve_booking_count);
            $('.badge-booking-list-unapprove').html(response.unapprove_booking_count);
        }
    });
    $(this).attr("data-status", "0");
    $(this).find("i").removeClass('fa-check-circle').addClass('fa-times-circle');
    $(this).removeClass('btn-success approve').addClass('btn-default cancel');
    $(this).attr("title", 'Hủy');
    $('.' + 'badge' + id).removeClass('badge-warning').addClass('badge-success');
    $('.' + 'badge' + id).text('Đã duyệt');
});
$('body').on('click', '.pay', function () {
    var id = $(this).attr('data-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: 'bookings/update-status',
        data: {
            'id': $(this).attr('data-id'),
            'deposit': $(this).attr('data-deposit')
        },
        success: function () {
            Swal.fire({
                icon: 'success',
                title: 'Đặt cọc thành công',
                showConfirmButton: false,
                timer: 1500
            })

        }
    });
    $(this).removeAttr("data-deposit").attr("data-status", "1");
    $(this).find("i").removeClass('fa-cash-register').addClass('fa-check-circle');
    $(this).removeClass('btn-primary pay').addClass('btn-success approve');
    $(this).attr("title", 'Chấp nhận');

});
