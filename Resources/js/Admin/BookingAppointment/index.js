$(document).ready( () => {

    let actualDate = $.datepicker.formatDate("yy-mm-dd", $("#datepicker").datepicker('getDate'));
    console.log(actualDate);

    $("#datepicker").on("change",function(){
        let selected_date = $(this).val();
        console.log(selected_date);
    });

});

// function getSelectedAppointment(actualAppointmentButton) {
//     $.each( $('.btn-time'), function() {
//         $(this).removeClass('selected-hour-time');
//     });
//     $(actualAppointmentButton).addClass('selected-hour-time');
//     $('#appointment-duration-start-input').attr('value', ($(actualAppointmentButton).html()));
//     $(".booking-service-container #res-appointment-date").html("Időpont: " + $("#appointment-date-input").val() + " " + $('#appointment-duration-start-input').val());
// }