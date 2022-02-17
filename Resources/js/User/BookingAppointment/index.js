$(document).ready( () => {

    $(".button-next").click(function() {
        let index = Number($(this).attr("data-step_index"));

        if (index === 1) {
            var duration, reservedAppointments = [];

            let actualDate = $("#datepicker").datepicker( 'getDate' );
            $("#appointment-date-input").attr("value", ($.datepicker.formatDate("yy-mm-dd", actualDate)));

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

            getSelectedServiceId();

        } else if (index === 2) {
            getAppointmentEnd();
        }

        changeFrameNext(index);
        changeStepStyleNext(index);
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
        let categoryValue = $("#select-category").val();
        
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {categoryValue: categoryValue},
            success: function(data) {
                // console.log(data);
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

    function checkReservedAppointments(possibleAppointment, reservedAppointments) {
        const starterPossible = possibleAppointment.substring(0,2);
        const endPossible = possibleAppointment.substring(3,5);
        console.log(starterPossible, endPossible);

        let starterReserved, endReserved = '';
        for (let i = 0; i < reservedAppointments.length; ++i) {
            starterReserved = (reservedAppointments[i]["idopont_kezdete"]).substring(0,5);
            endReserved = (reservedAppointments[i]["idopont_vege"]).substring(0,5);

            console.log(starterReserved, endReserved);
            
        }
    }

    function countAppointments(minutes, reservedAppointments) {
        // console.log(minutes);
        // console.log(reservedAppointments);
        // console.log(reservedAppointments[0]["idopont_kezdete"]);
        // console.log(reservedAppointments[3]["idopont_vege"]);


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

            // általános

            const minute = parseInt(minutes);
            let appointmentHour = starterHour;
            let appointmentMin = 0;
            let btnId = 1;

            let firstAppointmentEndHour = parseInt((starterHour*60+minute)/60);
            let firstAppointmentEndMins = (starterHour*60+minute)%60;
            let firstAppEnd = firstAppointmentEndHour + ':' + firstAppointmentEndMins;
            console.log(firstAppEnd);
            
            let possibleAppointment = (starterHour < 10 ? ('0' + starterHour) : starterHour) + ':' + (appointmentMin ? appointmentMin : '00');
            checkReservedAppointments(possibleAppointment, reservedAppointments);

            while (appointmentHour < finishHour) {

                $("#available-hours").append('<button id="btn_' + btnId + '" class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time" onClick="getAppointment(this)">'+ 
                appointmentHour + ':' + (appointmentMin ? appointmentMin : '00') + '</button>');

                appointmentHour = parseInt(((appointmentHour * 60) + appointmentMin + minute)/60);
                appointmentMin = ((appointmentHour * 60) + appointmentMin + minute)%60;
                btnId++;
            }
            
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
        $("#appointment-date-input").attr("value", selected_date);
        //alert(selected_date);
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

    function getAppointmentEnd() {
        let reservationServiceId = $("#service-id-input").val();
        let reservationAppointmentStart = ($("#appointment-duration-start-input").val() > "10:00" ? ('0' + $("#appointment-duration-start-input").val()) : $("#appointment-duration-start-input").val());

        let hour = parseInt(reservationAppointmentStart.substring(0,2));
        let min = parseInt(reservationAppointmentStart.substring(3,5));

        $.post({
        url: "../../Controller/User/ajax/ajax.php",
        data: {reservationServiceId: reservationServiceId},
            success: function(data) {
                calculateEndAppointment(data);            }
        });
            
        function calculateEndAppointment(duration) {
            let appointmentEnd = hour*60 + min + parseInt(duration);

            hour = parseInt(appointmentEnd / 60);
            min = appointmentEnd % 60;
            $('#appointment-duration-end-input').attr('value', (hour + ":" + (min ? min : "00")));
        }
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

function getAppointment(actualAppointmentButton) {
    $.each( $('.btn-time'), function() {
        $(this).removeClass('selected-hour-time');
    });
    $(actualAppointmentButton).addClass('selected-hour-time');
    $('#appointment-duration-start-input').attr('value', ($(actualAppointmentButton).html()));
}