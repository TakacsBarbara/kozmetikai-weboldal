$(document).ready( () => {

    function listReservedAppointments() {
        var duration, reservedAppointments = [];

        let serviceName = $.trim($("#select-service option:selected").text());
            $.ajax({
                type: "POST",
                url: "../../Controller/User/ajax/ajax.php",
                data: {serviceName: serviceName}
            }).then(function(data) {
                duration = data;
            }).then(function() {
                let selectedDay = $("#appointment-date-input").val();
                return $.ajax({
                    type: "POST",
                    url: "../../Controller/User/ajax/ajax.php",
                    data: { selectedDay: selectedDay }
                }).then(function(data) {
                    data = JSON.parse(data);
                    reservedAppointments = data;
                });
            }).then(function() {
                countAppointments(duration, reservedAppointments);
            }); 
    }

    $(".button-next").click(function() {
        let index = Number($(this).attr("data-step_index"));

        if (index === 1) {
            if ($.trim($("#select-service option:selected").text())) {
                console.log($.trim($("#select-service option:selected").text()));
    
                let actualDate = $("#datepicker").datepicker( 'getDate' );
                $("#appointment-date-input").attr("value", ($.datepicker.formatDate("yy-mm-dd", actualDate)));
    
                if (actualDate.getDay() != 0) {
                    listReservedAppointments();
                } else {
                    $("#available-hours").html("<p class='no-appointment-message'>Nincs elérhető időpont!</p>");
                }
    
                getSelectedServiceId();
                $(".booking-service-container #res-service-name").html("Szolgáltatás: " + $.trim($("#select-service option:selected").text()));

                changeFrameNext(index);
                changeStepStyleNext(index);
            } else {
                $("#select-category").addClass("red-border");
            }
            
        } else if (index === 2) {
            if ($("#appointment-duration-start-input").val()) {
                getSelectedServicePrice();
                getSelectedAppointmentEnd();

                changeFrameNext(index);
                changeStepStyleNext(index);
            } else {
                $("#available-hours").addClass("available-hours-red-border");
            }
        }
    });

    $(".button-back").click(function() {
        let index = Number($(this).attr("data-step_index"));
        changeFramePrev(index);
        changeStepStylePrev(index);

        if (index === 2) {
            $("#available-hours").empty();
        }
    });

    $("#select-category").change(function() {
        $("#select-category").removeClass("red-border").addClass("gray-border");
        let categoryValue = $("#select-category").val();
        
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {categoryValue: categoryValue},
            success: function(data) {
                $("#select-service").html(data);
            }
        });
    });

    function changeFrameNext(index) {
        $("#booking-frame-" + index).css("display", "none");
        $("#booking-frame-" + (index + 1)).css("display", "block");
    }

    function changeFramePrev(index) {
        $("#booking-frame-" + index).css("display", "none");
        $("#booking-frame-" + (index-1)).css("display", "block");
    }

    function changeStepStyleNext(index) {
        $("#step-" + index).removeClass("active-step");
        $("#step-" + (index + 1)).addClass("active-step");
    }

    function changeStepStylePrev(index) {
        $("#step-" + index).removeClass("active-step");
        $("#step-" + (index - 1)).addClass("active-step");
    }

    $('#book-appointment-submit').on('click', function() {
        let guestId = 13;
        let resServiceId = $("#service-id-input").val();
        let resDate = $("#appointment-date-input").val();
        let resAppointmentStart = $("#appointment-duration-start-input").val();
        let resAppointmentEnd = $('#appointment-duration-end-input').val();
        
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {
                resServiceId: resServiceId,
                resDate: resDate,
                resAppointmentStart: resAppointmentStart,
                resAppointmentEnd: resAppointmentEnd,
                guestId: guestId
            },
            success: function(data) {
                if (data == 1) {
                    showDialog('Sikeres időpontfoglalás!');
                    setTimeout(redirectToUserAppointmentsList, 3000);
                } else {
                    showDialog('Sikertelen időpontfoglalás!');
                    setTimeout(redirectToAppointmentBooking, 3000);
                }
            }
        });
    });

    $('#book-appointment-change').on('click', function() {
        let guestId = 13;
        let newResServiceId = $("#service-id-input").val();
        let newResDate = $("#appointment-date-input").val();
        let newResAppointmentStart = $("#appointment-duration-start-input").val();
        let newResAppointmentEnd = $("#appointment-duration-end-input").val();
        let reservedAppointmentIdToChange = $("#changed-reserved-appointment-id-input").val();
        
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {
                newResServiceId: newResServiceId,
                newResDate: newResDate,
                newResAppointmentStart: newResAppointmentStart,
                newResAppointmentEnd: newResAppointmentEnd,
                reservedAppointmentIdToChange: reservedAppointmentIdToChange,
                guestId: guestId
            },
            success: function(data) {
                if (data == 1) {
                    showDialog('Sikeres időpontmódosítás!');
                    setTimeout(redirectToUserAppointmentsList, 3000);
                } else {
                    showDialog('Sikertelen időpontmódosítás!');
                    setTimeout(redirectToAppointmentBooking, 3000);
                }
            }
        });
    });

    function calculateAppointmentEnd(possibleAppointmentStart, minute) {
        let hour = parseInt(possibleAppointmentStart.substring(0,2));
        let mins = parseInt(possibleAppointmentStart.substring(3,5));

        let possibleAppointmentEndHour = (parseInt((hour * 60 + mins + minute) / 60));
        let possibleAppointmentEndMins = (hour * 60 + mins + minute) % 60;

        possibleAppointmentEndHour = possibleAppointmentEndHour < 10 ? ('0' + possibleAppointmentEndHour) : possibleAppointmentEndHour;
        possibleAppointmentEndMins = possibleAppointmentEndMins ? possibleAppointmentEndMins : "00";

        return possibleAppointmentEndHour + ':' + possibleAppointmentEndMins;
    }

    function checkReservedAppointments(possibleAppointmentStart, possibleAppointmentEnd, minute, reservedAppointments) {

        let starterReserved, endReserved = '';
        for (let i = 0; i < reservedAppointments.length; ++i) {
            starterReserved = (reservedAppointments[i]["idopont_kezdete"]).substring(0,5);
            endReserved = (reservedAppointments[i]["idopont_vege"]).substring(0,5);

            if (
                (possibleAppointmentStart >= starterReserved && possibleAppointmentEnd <= endReserved) || 
                (possibleAppointmentStart >= starterReserved && possibleAppointmentStart < endReserved) || 
                (possibleAppointmentEnd > starterReserved && possibleAppointmentEnd <= endReserved) || 
                (possibleAppointmentStart <= starterReserved) && (possibleAppointmentEnd > endReserved)) {
                    possibleAppointmentStart = endReserved;
                    possibleAppointmentEnd = calculateAppointmentEnd(possibleAppointmentStart, minute);
            }            
        }
        return possibleAppointmentStart;
    }

    function countAppointments(minutes, reservedAppointments) {
        // 2 = 120 + 30 = 150 / 60 = 2 

        /*
            15  -
            30  -----
            60  -
            80  -
            90 -
            100 -
            120 -
            150 -
            180 -
        */

            const starterHour = 9;   
            const finishHour = 19;

            const minute = parseInt(minutes);
            let appointmentHour = starterHour;
            let appointmentMin = 0;
            let possibleAppointmentEndHour, possibleAppointmentEndMins = 0;
            var possibleAppointmentStart, possibleAppointmentEnd = "";
            let btnId = 1;

            do {
                possibleAppointmentStart = (appointmentHour < 10 ? ('0' + appointmentHour) : appointmentHour) + ':' + (appointmentMin ? appointmentMin : '00');
                possibleAppointmentEndHour = parseInt((appointmentHour * 60 + appointmentMin + minute) / 60);
                possibleAppointmentEndMins = (appointmentHour * 60 + appointmentMin + minute) % 60;
                possibleAppointmentEnd = (possibleAppointmentEndHour < 10 ? ('0' + possibleAppointmentEndHour) : possibleAppointmentEndHour) + ':' + (possibleAppointmentEndMins ? possibleAppointmentEndMins : "00");
            
                possibleAppointmentStart = checkReservedAppointments(possibleAppointmentStart, possibleAppointmentEnd, minute, reservedAppointments);
                appointmentHour = parseInt(possibleAppointmentStart.substring(0,2));
                appointmentMin = parseInt(possibleAppointmentStart.substring(3,5));

                $("#available-hours").append('<button id="btn_' + btnId + '" class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time" onClick="getSelectedAppointment(this)">'+ 
                appointmentHour + ':' + (appointmentMin ? appointmentMin : '00') + '</button>');

                appointmentHour = parseInt(((appointmentHour * 60) + appointmentMin + minute) / 60);
                appointmentMin = ((appointmentHour * 60) + appointmentMin + minute) % 60;
                btnId++;
            } while (appointmentHour < finishHour);

            // const starterHour = 9;   
            // const finishHour = 19;

            // // általános

            // const minute = parseInt(minutes);
            // let appointmentHour = starterHour;
            // let appointmentMin = 0;
            // let btnId = 1;

            // let possibleAppointmentEndHour = parseInt((starterHour*60+minute)/60);
            // let possibleAppointmentEndMins = (starterHour*60+minute)%60;
            // var possibleAppointmentEnd = (possibleAppointmentEndHour < 10 ? ('0' + possibleAppointmentEndHour) : possibleAppointmentEndHour) + ':' + (possibleAppointmentEndMins ? possibleAppointmentEndMins : "00");
            // //console.log(possibleAppointmentEnd);
            
            // var possibleAppointmentStart = (starterHour < 10 ? ('0' + starterHour) : starterHour) + ':' + (appointmentMin ? appointmentMin : '00');
            // checkReservedAppointments(possibleAppointmentStart, possibleAppointmentEnd, reservedAppointments);

            // while (appointmentHour < finishHour) {

            //     $("#available-hours").append('<button id="btn_' + btnId + '" class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time" onClick="getSelectedAppointment(this)">'+ 
            //     appointmentHour + ':' + (appointmentMin ? appointmentMin : '00') + '</button>');

            //     appointmentHour = parseInt(((appointmentHour * 60) + appointmentMin + minute)/60);
            //     appointmentMin = ((appointmentHour * 60) + appointmentMin + minute)%60;
            //     btnId++;
            // }
            
            // // általános

            // let minute = 90;
            // let nextHour = 0;
            // let nextMins = 0;

            // $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            // starter + ':00</button>');

            // nextHour = parseInt((starter * 60 + minute)/60);
            // nextMins = (starter * 60 + minute)%60;

            // while (nextHour<finish) {

            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + (nextMins ? nextMins : '00') + '</button>');

            //     nextHour = parseInt(((nextHour * 60) + nextMins + minute)/60);
            //     nextMins = ((nextHour * 60) + nextMins + minute)%60;
            // }

            // // 15 perces

            // let minute = 15;
            // let nextHour = 0;
            // let nextMins = 0;

            // $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            // starter + ':00</button>');

            // nextHour = parseInt((starter * 60 + 15)/60);
            // nextMins = (starter * 60 + 15)%60;

            // while (nextHour<finish) {

            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + (nextMins ? nextMins : '00') + '</button>');

            //     nextHour = parseInt(((nextHour * 60) + nextMins + 15)/60);
            //     nextMins = ((nextHour * 60) + nextMins + 15)%60;
            // }

            // // 150 perces

            // let minute = 150;
            // let nextHour = 0;
            // let nextMins = 0;

            // $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            // starter + ':00</button>');

            // nextHour = parseInt((starter * 60 + 150)/60);
            // nextMins = (starter * 60 + 150)%60;

            // while (nextHour<finish) {

            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + (nextMins ? nextMins : '00') + '</button>');

            //     nextHour = parseInt(((nextHour * 60) + nextMins + 150)/60);
            //     nextMins = ((nextHour * 60) + nextMins + 150)%60;
            // }

            // 100 perces

            // let minute = 100;
            // let nextHour = 0;
            // let nextMins = 0;

            // $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            // starter + ':00</button>');

            // nextHour = parseInt((starter * 60 + 100)/60);
            // nextMins = (starter * 60 + 100)%60;

            // while (nextHour<finish) {

            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + (nextMins ? nextMins : '00') + '</button>');

            //     nextHour = parseInt(((nextHour * 60) + nextMins + 100)/60);
            //     nextMins = ((nextHour * 60) + nextMins + 100)%60;
            // }

            // // 80 perces

            // let minute = 80;
            // let nextHour = 0;
            // let nextMins = 0;

            // $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            // starter + ':00</button>');

            // nextHour = parseInt((starter * 60 + 80)/60);
            // nextMins = (starter * 60 + 80)%60;

            // while (nextHour<finish) {

            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + (nextMins ? nextMins : '00') + '</button>');

            //     nextHour = parseInt(((nextHour * 60) + nextMins + 80)/60);
            //     nextMins = ((nextHour * 60) + nextMins + 80)%60;
            // }

            // // 90 perces

            // let minute = 90;
            // let nextHour = 0;
            // let nextMins = 0;

            // $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            // starter + ':00</button>');

            // nextHour = parseInt((starter * 60 + 90)/60);
            // nextMins = (starter * 60 + 90)%60;

            // while (nextHour<finish) {

            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + (nextMins ? nextMins : '00') + '</button>');

            //     nextHour = parseInt(((nextHour * 60) + nextMins + 90)/60);
            //     nextMins = ((nextHour * 60) + nextMins + 90)%60;
            // }

            // for (let i = starter; i < finish; i++) {

            //     nextHour = parseInt((i * 60 + 90)/60);
            //     nextMins = (i * 60 + 90)%60;
    
            //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            //     nextHour + ':' + nextMins + '</button>');
    
            // }

        // 30 perces

        // for (let i = starter; i <= finish; i++) {
        //     hours = parseInt((i * 60 + 30)/60);
        //     mins = (i * 60 + 30)%60;

        //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
        //     hours + ':00</button>');

        //     if (i < finish) {
        //         $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
        //         hours + ':' + mins + '</button>');
        //     }
        // } 

        /*  1 órás
            for (let i = starter; i <= finish; i++) {
                $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ i + ':00</button>');
            } 
        */

        //  2 órás
        // for (let i = starter; i <= finish; i+=2) {
        //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ i + ':00</button>');
        // } 
        
        //  3 órás
        // for (let i = starter; i <= finish; i+=3) {
        //     $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ i + ':00</button>');
        // } 
    }

    $("#datepicker").on("change",function(){
        let selected_date = $(this).val();
        if (new Date(selected_date).getDay() != 0) {
            $("#appointment-date-input").attr("value", selected_date);
            $("#available-hours").empty();
            listReservedAppointments();
        } else {
            $("#available-hours").empty();
            $("#available-hours").html("<p class='no-appointment-message'>Nincs elérhető időpont!</p>");
        }
    });

    function getSelectedServiceId() {
        let selectedServiceName = $.trim($("#select-service option:selected").text());

        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {selectedServiceName: selectedServiceName},
            success: function(data) {
                $("#service-id-input").attr("value", data);
            }
        });
    }

    function getSelectedServicePrice() {
        let selectedServiceId = $("#service-id-input").val();

        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {selectedServiceId: selectedServiceId},
            success: function(data) {
                $(".booking-service-container #res-service-price").html("Ár: " + data + " Ft");
            }
        });
    }

    function getSelectedAppointmentEnd() {
        let reservationServiceId = $("#service-id-input").val();
        let lengthOfResAppointmentStart = ($("#appointment-duration-start-input").val()).length;
        let reservationAppointmentStart = (lengthOfResAppointmentStart == 4 ? ('0' + $("#appointment-duration-start-input").val()) : $("#appointment-duration-start-input").val());

        let hour = parseInt(reservationAppointmentStart.substring(0,2));
        let min = parseInt(reservationAppointmentStart.substring(3,5));

        $.post({
        url: "../../Controller/User/ajax/ajax.php",
        data: {reservationServiceId: reservationServiceId},
            success: function(data) {
                let appointmentEnd = hour*60 + min + parseInt(data);
                hour = parseInt(appointmentEnd / 60);
                min = appointmentEnd % 60;
                $('#appointment-duration-end-input').attr('value', (hour + ":" + (min ? min : "00")));           }
        });
    }

    function showDialog(message) {
        $.confirm({
            message: message,
            'buttons'   : {
                'OK'   : {
                    'class' : 'pink'
                }
            }
        });
    }

    function redirectToUserAppointmentsList(){
        window.location.replace("http://localhost/PHP/View/User/userAppointmentsList.php");
    }

    function redirectToAppointmentBooking(){
        window.location.replace("http://localhost/PHP/View/User/appointmentBooking.php");
    }

});

function getSelectedAppointment(actualAppointmentButton) {
    $("#available-hours").removeClass("available-hours-red-border");
    $.each( $('.btn-time'), function() {
        $(this).removeClass('selected-hour-time');
    });
    $(actualAppointmentButton).addClass('selected-hour-time');
    $('#appointment-duration-start-input').attr('value', ($(actualAppointmentButton).html()));
    $(".booking-service-container #res-appointment-date").html("Időpont: " + $("#appointment-date-input").val() + " " + $('#appointment-duration-start-input').val());
}