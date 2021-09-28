
$(document).ready( () => {
    //alert('hello');

    $('.mainServices').on('click',function(){
        let mainServiceID = $(this).children("a").attr('id');
        
        let state = $('.sc_'+mainServiceID).attr("style");
        if(state === "display: none;"){
            $.each( $('.sc_'+mainServiceID), function() {
                    $(this).css("display","table-row");
            });
        }
        else{
            $.each( $('.sc_'+mainServiceID), function() {
                $(this).css("display","none");
        });
        }
        
    })


    $("#login").click( function() {
        //alert("Hello");
        let username = $("#username").val();
        let password = $("#password").val();
        //alert(password);
        $.post({
            //type: "POST",
            //async: false,
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {username: username, password: password},
            success: function(data) {
                //$("#result").html(data);
                console.log("Hello");
                console.log(data);
                if (data === "True") {
                   window.location.replace("http://localhost/PHP/View/Admin/mainServicesListed.php");
                } else if (data === "False") {
                    $("#result").html("Sikertelen bejelentkezés!");
                }
            }
        });
    });
    
    $('#mainServiceSave').click( () => {
        let savedMainService = $('#nameOfService').val();
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {savedMainService: savedMainService},
            success: function(data) {
                $("#result").html(data); 
                setTimeout(refresh, 3000);
            }
        });
    });

    $('#mainServiceEdit').click( () => {
        let editedMainService = $('#nameOfService').val();
        let editedMainServiceID = $('#serviceID').val();
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {editedMainService: editedMainService, editedMainServiceID: editedMainServiceID},
            success: function(data) {
                $("#result").html(data); 
                setTimeout(refresh, 3000);
            }
        });
    });
    
    $("#mainServiceDelete").click( () => {
        let deletedMainService = $("#nameOfService").val();
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {deletedMainService: deletedMainService},
            success: function(data) {
                $("#result").html(data);
                setTimeout(refresh, 3000);
            }
        });
    });

    
    $("#subServiceDelete").click( () => {
        let deletedSubService = $("#nameOfSubService").val();
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {deletedSubService: deletedSubService},
            success: function(data) {
                $("#result").html(data);
                setTimeout(refresh, 3000);
            }
        });
    });

    $("#subServiceEdit").click( () => {
        let editedSubService = $("#nameOfService").val();
        let editedSubServiceID = $("#serviceID").val();
        let editedSubservicePrice = $("#priceOfService").val();
        let editedSubServiceDuration = $("#durationOfService").val();

        //console.log(editedSubservicePrice, editedSubServiceDuration);

        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {
                editedSubService: editedSubService, 
                editedSubServiceID: editedSubServiceID,
                editedSubservicePrice: editedSubservicePrice,
                editedSubServiceDuration: editedSubServiceDuration
            },
            success: function(data) {
                $("#result").html(data);
                setTimeout(refresh, 3000);
            }
        });
    });

    $("#subServiceSave").click( () => {
        let mainServiceID = $("#mainServiceID").val();
        let savedSubService = $("#nameOfService").val();
        let subServicePrice = $("#priceOfService").val();
        let subServiceDuration = $("#durationOfService").val();
        //console.log(mainServiceID, savedSubService, subServicePrice, subServiceDuration);

        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {
                savedSubService: savedSubService,
                subServicePrice: subServicePrice,
                subServiceDuration: subServiceDuration,
                mainServiceID: mainServiceID
            },
            success: function(data) {
                $("#result").html(data);
                setTimeout(refresh, 3000);
            }
        });
    });

    function refresh(){
        window.location.replace("http://localhost/PHP/View/Admin/mainServicesListed.php");
    }

});