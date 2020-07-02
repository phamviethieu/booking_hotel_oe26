$(document).ready(function(){
    $("#type").change(function(){
        let idType = $(this).val();

        $.get("ajax/" + idType, function(data, status){
            $('#room').html(data);
        });
    });
});
