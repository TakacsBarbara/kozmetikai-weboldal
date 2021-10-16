
$(document).ready( () => {

    $('.mainServices').on('click',function(){
        let mainServiceID = $(this).children("a").attr('id');
        let arrow = $(this).children("i");
        console.log(arrow);
        
        let state = $('.sc_'+mainServiceID).attr("style");
        if(state === "display: none;"){
            $.each( $('.sc_'+mainServiceID), function() {
                    $(this).css("display","table-row");
            });
            $('#arrow_'+mainServiceID).removeClass("fa-chevron-down").addClass("fa-chevron-up");
        }
        else{
            $.each( $('.sc_'+mainServiceID), function() {
                $(this).css("display","none");
            });
            $('#arrow_'+mainServiceID).removeClass("fa-chevron-up").addClass("fa-chevron-down");
        }
    });


    $("#login").click( function() {
        let username = $("#username").val();
        let password = $("#password").val();
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {username: username, password: password},
            success: function(data) {
                if (data === "True") {
                    window.location.replace("http://localhost/PHP/View/Admin/mainServicesListed.php");
                } else if (data === "False") {
                    $("#loginMessage").html("Sikertelen bejelentkezés!");
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
                setResultMessage(data);
                setTimeout(refresh, 3000);
            }
        });
    });

    $('#mainServiceEdit').click( () => {
        let editedMainService = $('#nameOfService').val();
        let editedMainServiceID = $('#serviceID').val();
        
        $.confirm({
            'title'     : 'Szolgáltatás módosítása',
            'message'   : 'Biztosan módosítja a szolgáltatást?',
            'buttons'   : {
                'Igen'   : {
                    'class' : 'pink',
                    'action': function(){
                        $.post({
                            url: "../../Controller/Admin/ajax/ajax.php",
                            data: {editedMainService: editedMainService, editedMainServiceID: editedMainServiceID},
                            success: function(data) {
                                setResultMessage(data);
                                setTimeout(refresh, 3000);
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
    
    $("#mainServiceDelete").click( () => {
        let deletedMainService = $("#nameOfService").val();

        $.confirm({
            'title'     : 'Szolgáltatás törlése',
            'message'   : 'Biztosan törli a szolgáltatást?',
            'buttons'   : {
                'Igen'   : {
                    'class' : 'pink',
                    'action': function(){
                        $.post({
                            url: "../../Controller/Admin/ajax/ajax.php",
                            data: {deletedMainService: deletedMainService},
                            success: function(data) {
                                setResultMessage(data);
                                setTimeout(refresh, 3000);
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
    
    $("#subServiceSave").click( () => {
        let mainServiceID = $("#mainServiceID").val();
        let savedSubService = $("#nameOfService").val();
        let subServicePrice = $("#priceOfService").val();
        let subServiceDuration = $("#durationOfService").val();

        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {
                savedSubService: savedSubService,
                subServicePrice: subServicePrice,
                subServiceDuration: subServiceDuration,
                mainServiceID: mainServiceID
            },
            success: function(data) {
                setResultMessage(data);
                setTimeout(refresh, 3000);
            }
        });
    });

    $("#subServiceEdit").click( () => {
        let editedSubService = $("#nameOfService").val();
        let editedSubServiceID = $("#serviceID").val();
        let editedSubservicePrice = $("#priceOfService").val();
        let editedSubServiceDuration = $("#durationOfService").val();

        $.confirm({
            'title'     : 'Szolgáltatás módosítása',
            'message'   : 'Biztosan módosítja a szolgáltatást?',
            'buttons'   : {
                'Igen'   : {
                    'class' : 'pink',
                    'action': function(){
                        $.post({
                            url: "../../Controller/Admin/ajax/ajax.php",
                            data: {
                                editedSubService: editedSubService, 
                                editedSubServiceID: editedSubServiceID,
                                editedSubservicePrice: editedSubservicePrice,
                                editedSubServiceDuration: editedSubServiceDuration
                            },
                            success: function(data) {
                                setResultMessage(data);
                                setTimeout(refresh, 3000);
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

    $("#subServiceDelete").click( () => {
        let deletedSubService = $("#nameOfSubService").val();
        
        $.confirm({
            'title'     : 'Szolgáltatás törlése',
            'message'   : 'Biztosan törli a szolgáltatást?',
            'buttons'   : {
                'Igen'   : {
                    'class' : 'pink',
                    'action': function(){
                        $.post({
                            url: "../../Controller/Admin/ajax/ajax.php",
                            data: {deletedSubService: deletedSubService},
                            success: function(data) {
                                setResultMessage(data);
                                setTimeout(refresh, 3000);
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

    function refresh(){
        window.location.replace("http://localhost/PHP/View/Admin/mainServicesListed.php");
    }

    function setResultMessage(data) {
        if (data == 1) { 
            $("#result").html("<i class='fas fa-check-circle'></i><p>Sikeres művelet!</p>"); 
            $("#result").removeClass("alert-danger").addClass("alert-success");
        } else {
            $("#result").html("<i class='fas fa-times-circle'></i><p>Sikertelen művelet!</p>"); 
            $("#result").removeClass("alert-success").addClass("alert-danger");
        }
    }

});