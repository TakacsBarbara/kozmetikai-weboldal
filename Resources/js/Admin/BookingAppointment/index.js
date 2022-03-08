$(document).ready( () => {
    var bookedUserAppointments = [];

    let actualDate = $.datepicker.formatDate("yy-mm-dd", $("#datepicker").datepicker('getDate'));
    getReservedAppointmentsData(actualDate);

    $("#datepicker").on("change",function(){
        let selectedDate = $(this).val();
        $(".reserved-appointments-table-container tbody").empty();
        getReservedAppointmentsData(selectedDate);
    });

    $("body").on("click", ".btn-status-ok", function() {
        const confirmedAppointmentId = $(this).val();

        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {confirmedAppointmentId: confirmedAppointmentId},
            success: function(data) {
                if (data == 1) {
                    $(".reserved-appointments-table-container tbody").empty();
                    let selectedDate = $.datepicker.formatDate("yy-mm-dd", $("#datepicker").datepicker('getDate'));
                    $(".reserved-appointments-table-container tbody").empty();
                    getReservedAppointmentsData(selectedDate);
                    showModal("Jóváhagyás sikeres!", "successful-modal-style");
                } else {
                    showModal("Jóváhagyás sikertelen!", "failed-modal-style");
                }
                setTimeout(closeModal, 3000);
            }
        });
    });

    $("body").on("click", ".btn-status-reject", function() {
        const rejectedAppointmentId = $(this).val();

        $.confirm({
            'title'     : 'Foglalás lemondása',
            'message'   : 'Biztosan lemondja az időpontot?',
            'buttons'   : {
                'Igen'   : {
                    'class' : 'pink',
                    'action': function(){
                        $.post({
                            url: "../../Controller/Admin/ajax/ajax.php",
                            data: {rejectedAppointmentId: rejectedAppointmentId},
                            success: function(data) {
                                if (data == 1) {
                                    $(".reserved-appointments-table-container tbody").empty();
                                    let selectedDate = $.datepicker.formatDate("yy-mm-dd", $("#datepicker").datepicker('getDate'));
                                    $(".reserved-appointments-table-container tbody").empty();
                                    getReservedAppointmentsData(selectedDate);
                                    showModal("Időpont lemondása sikeres!", "successful-modal-style");
                                } else {
                                    showModal("Időpont lemondása sikertelen!", "failed-modal-style");
                                }
                                setTimeout(closeModal, 5000);
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

    function getReservedAppointmentsData(date) {
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {actualDate: date},
            success: function(data) {
                data = JSON.parse(data);
                bookedUserAppointments = data;
                displayTableRows(bookedUserAppointments);
            }
        });
    }

    function displayTableRows(bookedUserAppointments) {
        const tableBody = $(".reserved-appointments-table-container tbody");

        for (let i = 0; i < bookedUserAppointments.length; ++i) {
            let formattedReservedDate = bookedUserAppointments[i]["idopont_datuma"].replace(/\-/g, '.');
            let formattedAppointmentStart = bookedUserAppointments[i]["idopont_kezdete"] < "10:00:00" ? bookedUserAppointments[i]["idopont_kezdete"].substr(1,4) :bookedUserAppointments[i]["idopont_kezdete"].substr(0,5);
            let formattedAppointmentEnd = bookedUserAppointments[i]["idopont_vege"] < "10:00:00" ? bookedUserAppointments[i]["idopont_vege"].substr(1,4) :bookedUserAppointments[i]["idopont_vege"].substr(0,5);
            let confirmationstatus = bookedUserAppointments[i]["jovahagyva"] == 0 ? "Jóváhagyásra vár" : "Jóváhagyva";

            tableBody.append(
                `<tr id="tr_` + bookedUserAppointments[i]["id"] + `" class="`+ (bookedUserAppointments[i]["jovahagyva"] == 0 ? "not-comfired-appointment" : "") + `" style="display:`+ (bookedUserAppointments[i]["jovahagyva"] == 2 ? "none" : "") +`;">
                    <td>` + (i+1) + `</td>
                    <td>` + bookedUserAppointments[i]["vezeteknev"] + " " + bookedUserAppointments[i]["keresztnev"] + `</td>
                    <td class="td-content-center">` + bookedUserAppointments[i]["megnevezes"] + `</td>
                    <td class="td-content-center">` + formattedReservedDate + `.</td>
                    <td class="td-content-center" colspan="2">` + formattedAppointmentStart + " - " + formattedAppointmentEnd + `</td>
                    <td class="td-content-center">` + confirmationstatus + `</td>
                    <td class="td-content-center">
                        <button type="button" id="btn`+ bookedUserAppointments[i]["id"] + `" class="btn-status-ok reserved-appointment-confirm" value="`+ bookedUserAppointments[i]["id"]+`" `+ (bookedUserAppointments[i]["jovahagyva"] == 1 ? "style=visibility:hidden;" : "") +`>Jóváhagyom</button>
                        <button type="button" id="btn`+ bookedUserAppointments[i]["id"] + `" class="btn-status-reject reserved-appointment-delete" value="`+ bookedUserAppointments[i]["id"] +`">Lemondom</button>
                    </td>
                </tr>`
            );
        }
    }

    function showModal(message, style) {
        $("#reservations-list-modal").removeClass("hidden");
        $("#reservations-list-modal #modal-message").text(message);
        $("#reservations-list-modal").addClass(style);
    }

    function closeModal() {
        $("#reservations-list-modal").addClass("hidden");
    }

});

