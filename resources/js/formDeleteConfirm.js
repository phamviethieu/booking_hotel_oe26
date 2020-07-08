let title = $('#delete').attr('data-title');
let text = $('#delete').attr('data-text');
let confirm = $('#delete').attr('data-confirm');

let cancel = $('#delete').attr('data-cancel');
$('.formDelete').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirm,
        cancelButtonText: cancel,
    }).then((result) => {
        if (result.value) {
            $(this).submit();
        }
    })
});
