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
                   // alert(data);
                    // $("#select-service").html(data);
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
        let starter = 9;   
        let finish = 19;

        // 2 = 120 + 30 = 150 / 60 = 2 

        /*
            15
            30  -----
            60  -
            80
            90
            100
            120 -
            150
            180 -
        */

            // let minute = 30;
            let hours = 0;
            let mins = 0;

            for (let i = starter; i < finish; i++) {
                $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
                hours + ':00</button>');

                hours = parseInt((i * 60 + 90)/60);
                mins = (i * 60 + 90)%60;
    
                $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
                hours + ':00</button>');
    
            }

        /* 30 perces

        for (let i = starter; i <= finish; i++) {
            hours = parseInt((i * 60 + 30)/60);
            mins = (i * 60 + 30)%60;

            $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
            hours + ':00</button>');

            if (i < finish) {
                $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ 
                hours + ':' + mins + '</button>');
            }
        } */

        /*  1 órás
            for (let i = starter; i <= finish; i++) {
                $("#available-hours").append('<button class="btn-time btn-time-outline-secondary btn-time-block shadow-none-time available-hour-time">'+ i + ':00</button>');
            } 
        */
        

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