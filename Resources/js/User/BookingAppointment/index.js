$(document).ready( () => {

    $(".button-next").click(function() {
        let index = Number($(this).attr("data-step_index"));

        if (index === 1) {

            let serviceName = $("#select-service option:selected").text();

            $.post({
                url: "../../Controller/User/ajax/ajax.php",
                data: {serviceName: serviceName},
                success: function(data) {
                    countAppointments(data);
                    alert(data);
                }
            });
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

    console.log($("#select-category option"));

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

    function countAppointments(minutes) {
        

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

            let starterHour = 9;   
            let finishHour = 19;

            // általános

            let minute = parseInt(minutes);
            let appointmentHour = starterHour;
            let appointmentMin = 0;

            while (appointmentHour<finishHour) {

                $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
                appointmentHour + ':' + (appointmentMin ? appointmentMin : '00') + '</button>');

                appointmentHour = parseInt(((appointmentHour * 60) + appointmentMin + minute)/60);
                appointmentMin = ((appointmentHour * 60) + appointmentMin + minute)%60;
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
});

// $(".test").click(function() {
//     console.log("Click");
//     alert("HEllo");
// });

$("#datepicker").on("change",function(){
    let selected_date = $(this).val();
    alert(selected_date);
});