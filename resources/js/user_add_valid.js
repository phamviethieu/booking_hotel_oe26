$(document).ready(function () {
    $('#password').keyup(function () {
        length = $(this).val().length;
        if (length < 8) {
            $('#password').addClass('is-invalid');
            $('.password-error').text('password must to more than 8 characters');
        } else $('#password').removeClass('is-invalid').addClass('is-valid');
    });
    $('#confirm').keyup(function () {
        var pw = $('#password').val();
        var repw = $('#confirm').val();
        if (repw == pw) {
            $('#confirm').removeClass('is-invalid').addClass('is-valid');
        } else {
            $('#confirm').removeClass('is-valid').addClass('is-invalid');
            $('.confirm-password-error').text('Password is not matching');
        }
    });
    var form = $('#add_user');
    form.on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
            },
            error: function (json) {
                console.log(json);
                if (json.status == 422) {
                    $.each(json.responseJSON.errors, function (key, value) {
                        console.log(value);
                        $('#' + key).addClass('is-invalid');
                        $('.' + key + '-error').html(value);
                    });
                }
                if (json.status == 200) {
                    location.href = form.data('target');
                }
            }
        });
    });
});
