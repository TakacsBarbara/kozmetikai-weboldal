$(document).ready( () => {
    var bookedUserAppointments = [];

    let actualDate = $.datepicker.formatDate("yy-mm-dd", $("#datepicker").datepicker('getDate'));
    getReservedAppointmentsData(actualDate);

    $("#datepicker").on("change",function(){
        let selected_date = $(this).val();
        $(".reserved-appointments-table-container tbody").empty();
        getReservedAppointmentsData(selected_date);
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
                `<tr id="` + bookedUserAppointments[i]["id"] + `">
                    <td>` + (i+1) + `</td>
                    <td>` + bookedUserAppointments[i]["vezeteknev"] + " " + bookedUserAppointments[i]["keresztnev"] + `</td>
                    <td class="td-content-center">` + bookedUserAppointments[i]["megnevezes"] + `</td>
                    <td class="td-content-center">` + formattedReservedDate + `.</td>
                    <td class="td-content-center" colspan="2">` + formattedAppointmentStart + " - " + formattedAppointmentEnd + `</td>
                    <td class="td-content-center">` + confirmationstatus + `</td>
                    <td class="td-content-center">
                        <button type="button" id="`+ bookedUserAppointments[i]["id"] + `" class="btn-status-ok reserved-appointment-confirm">Jóváhagyom</button>
                        <button type="button" id="`+ bookedUserAppointments[i]["id"] + `" class="btn-status-delete reserved-appointment-delete">Lemondom</button>
                    </td>
                </tr>`
            );
        }
    }

});