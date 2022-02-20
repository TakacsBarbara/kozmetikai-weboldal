$('.reserved-appointment-delete').on("click", function() {
    let reservedServiceId = $(this).val(); 

    $.confirm({
        'title'     : 'Foglalás törlése',
        'message'   : 'Biztosan törölni szeretné a lefoglalt időpontot?',
        'buttons'   : {
            'Igen'   : {
                'class' : 'pink',
                'action': function(){
                    $.post({
                        url: "../../Controller/User/ajax/ajax.php",
                        data: {reservedServiceId: reservedServiceId},
                        success: function(data) {
                            if (data == 1) {
                                console.log("Sikeres");
                                showModal("A törlés sikeres volt!", "successful-modal-style");
                            } else {
                                showModal("A törlés nem sikerült!", "failed-modal-style");
                            }
                            setTimeout(refreshReservationList, 3000);
                        }
                    });
                }
            },
            'Nem'    : {
                'class' : 'gray'
            }
        }
    });
});

function showModal(message, style) {
    $("#reservations-list-modal").removeClass("hidden");
    $("#reservations-list-modal #modal-message").text(message);
    $("#reservations-list-modal").addClass(style);
}

function refreshReservationList(){
    window.location.replace("http://localhost/PHP/View/User/userAppointmentsList.php");
}

// $.confirm({
//     'title'     : 'Szolgáltatás módosítása',
//     'message'   : 'Biztosan módosítja a szolgáltatást?',
//     'buttons'   : {
//         'Igen'   : {
//             'class' : 'pink',
//             'action': function(){
//                 $.post({
//                     url: "../../Controller/Admin/ajax/ajax.php",
//                     data: {editedMainService: editedMainService, editedMainServiceID: editedMainServiceID},
//                     success: function(data) {
//                         setResultMessage(data);
//                         setTimeout(refresh, 3000);
//                     }
//                 });
//             }
//         },
//         'Nem'    : {
//             'class' : 'gray'
//         }
//     }
// });