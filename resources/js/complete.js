let message = $('#message').attr('data-text');
let icon = $('#message').attr('data-icon');

Swal.fire({
    icon: icon,
    title: message,
    showConfirmButton: false,
    timer: 1500
})
