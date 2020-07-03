let title_id = "id";
let title_checkin = "checkin";
let title_checkout = "checkout";
let title_price = "Price";

$('.bookingDetail').on('click', function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: 'view-detail/booking/' + $(this).data('id'),
        dataType: 'json',
        success: function(response) {
            let price = response.price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
            let data = `<ul class="list-group">
                            <li class="list-group-item text-right"> MS2020 ${response.id} &#58;<i class="fas fa-barcode"></i> </li>
                            <li class="list-group-item"><i class="fas fa-user"></i> &#58; ${response.user_name.toUpperCase()}</li>
                            <li class="list-group-item"><i class="fas fa-phone-square"></i> &#58; ${response.phone_number}</li>
                            <li class="list-group-item"><i class="fas fa-phone-square"></i> &#58;  ${response.email}
                            <li class="list-group-item"><i class="far fa-calendar-check"></i> &#58;${response.checkin} </li>
                            <li class="list-group-item"><i class="fas fa-store-alt-slash"></i> &#58; ${response.checkout} </li>
                            <li class="list-group-item text-right text-danger">
                            <i class="fas fa-money-check-alt"></i>
                            ${title_price} &#58;
                            ${price} </li>
                        </ul>`;
            $(".modal-body").html(data);
        }
    });
})
