var rate = 0;
var thankyou = $('#rating-article').data('thanks');
var back = $('#rating-article').data('back');

$('document').ready(function() {
    var user_rate = $('.rating-user ').attr('data-rate');
    for (let i = 1; i <= user_rate; i++) {
        $('.' + 'r' + i).css('color', 'orange');
    }
    $('.rating').css('color', 'gray');
    $('body').on('click', '.rating', function(e) {
        rate = $(this).attr('data-index');
        localStorage.setItem('rate', rate);
    });
    $('body').on('mouseover', '.rating', function(e) {
        e.preventDefault();
        var index = $(this).attr('data-index');
        for (let i = 1; i <= index; i++) {
            $('.' + 'r' + i).css('color', 'orange');
        }
    });
    $('body').on('mouseleave', '.rating', function(e) {
        var index = $(this).attr('data-index');
        $('.rating').css('color', 'gray');
        if (rate != 0) {
            for (let i = 1; i <= rate; i++) {
                $('.' + 'r' + i).css('color', 'orange');
            }
        }
    });
});

$('.ratingForm').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: 'ratings',
        data: {
            'rate': rate,
            'content': $('#content').val()
        },
        success: function(response) {
            $(this).submit();
            Swal.fire({
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            $('.ratingForm').hide();

            $('.rating-div').html(` <div class="rating1 form-group  text-center">
                                        <div class="alert" role="alert"> ${thankyou} </div>
                                        <a class="r1" data-index="1" title="Very poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r2" data-index="2" title="Poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r3" data-index="3" title="Normal"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r4" data-index="4" title="Good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r5" data-index="5" title="Very good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <div> <button class="btn btn-primary back"> ${back} </button> </div>
                                    </div>`);
            for (let i = 1; i <= response.rate; i++) {
                $('.' + 'r' + i).css('color', 'orange');
            }
        }
    });
    $('body').on('click', '.back', function() {
        location.reload();
    })
});
$('.updateRatingForm').hide();
$('body').on('click', '#edit-rating', function(e) {
    $('.rate-available').hide();
    $('.updateRatingForm').fadeIn();
    let rate = $('.updateRatingForm').attr('data-rate');

    for (let i = 1; i <= rate; i++) {
        $('.' + 'r' + i).css('color', 'orange');
    }
});
$('body').on('submit', '.updateRatingForm', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "PUT",
        url: 'ratings/' + $(this).attr('data-rate-id'),
        data: {
            'rate': rate,
            'content': $('#content').val()
        },
        success: function(response) {
            $(this).submit();
            Swal.fire({
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            $('.ratingForm').hide();

            $('.rating-div').html(` <div class="rating1 form-group  text-center">
                                        <div class="alert" role="alert"> ${thankyou} </div>
                                        <a class="r1" data-index="1" title="Very poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r2" data-index="2" title="Poor"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r3" data-index="3" title="Normal"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r4" data-index="4" title="Good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <a class="r5" data-index="5" title="Very good"><i class="fa fa-5x fa-star" aria-hidden="true"></i></a>
                                        <div> <button class="btn btn-primary back"> ${back} </button> </div>
                                    </div>`);
            for (let i = 1; i <= rate; i++) {
                $('.' + 'r' + i).css('color', 'orange');
            }
        }
    });
    $('body').on('click', '.back', function() {
        location.reload();
    })
});
