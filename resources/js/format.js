$(document).ready(function () {
    function phoneFormat() {
        phone = phone.replace(/[^0-9]/g, '');
        phone = phone.replace(/(\d{4})(\d{3})(\d{3})/, "($1) $2-$3");
        return phone;
    }

    var phone = $('#phone').text();
    console.log(phone);
    phone = phoneFormat(phone);
    $('#phone').text(phone);

    let price = $('.price').text();

    let price_convert = price.toLocaleString('it-IT', {style: 'currency', currency: 'VND'});
    console.log(price_convert);
    $('.price').text();

})
