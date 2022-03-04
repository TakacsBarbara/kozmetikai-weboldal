
$(document).ready( () => {

    
    $('.nav-link-style').on('click',function() {

        $.each( $('.nav-link-style'), function() {
            $(this).removeClass("active");
        });
       
        $(this).addClass("active");

    });


    $('.mainServices').on('click',function() {
        let mainServiceID = $(this).children("a").attr('id');
        let arrow = $(this).children("i");
        
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

    $("#registration").click( () => {
        let username = $("#username").val();
        let password = $("#password").val();
        let confirmPassword = $("#confirm-password").val();

        console.log(username, password, confirmPassword);

        if (password === confirmPassword) {
            $.post({
                url: "../../Controller/Admin/ajax/ajax.php",
                data: {username: username, password: password, confirmPassword: confirmPassword, "reg":"1"},
                success: function(data) {
                    if (data == 1) {
                        showSuccessMessage("#regMessage", "Sikeres regisztráció!");
                        setTimeout(refresh, 3000);
                    } else if (data === "False") {
                        showErrorMessage("#regMessage", "Sikertelen regisztráció!");
                    }
                }
            });
        } else {
            showErrorMessage("#regMessage", "A jelszavak nem egyeznek!");
        }
    });

    $("#login").click( () => {
        let username = $("#username").val();
        let password = $("#password").val();
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {username: username, password: password, "login":"1"},
            success: function(data) {
                if (data === "True") {
                    refresh();
                    // window.location.replace("http://localhost/PHP/View/Admin/mainServicesListed.php");
                } else if (data === "False") {
                    showErrorMessage("#loginMessage", "Sikertelen bejelentkezés!");

                    // $("#loginMessage").html("Sikertelen bejelentkezés!");
                    // $("#loginMessage").addClass("alert-danger");
                    // $("#loginMessage").css({"color":"#c70c0c", "padding":"10px 20px", "border-radius":"10px"});
                }
            }
        });
    });

    $("#pswdChange").click( () => {
        let actualPassword = $("#act-pswd").val();
        let newPassword = $("#new-pswd").val();
        let confirmPassword = $("#conf-pswd").val();

        // let value = (actualPassword != 0) && (newPassword != 0) && (confirmPassword != 0);
        //console.log(actualPassword);

        if ((actualPassword != '') && (newPassword != '') && (confirmPassword != '')) {
            if (newPassword === confirmPassword) {
                //console.log("ajax");
                $.post({
                    url: "../../Controller/Admin/ajax/ajax.php",
                    data: {
                        actualPassword: actualPassword,
                        newPassword: newPassword,
                        confirmPassword: confirmPassword
                    },
                    success: function(data) {
                        setResultMessage(data);
                        //setTimeout(refresh, 3000);
                    }
                });
            } else {
                setResultMessage(3);
            }
        } else {
            showRequiredInputMessage();
        }
    });
    
    $('#mainServiceSave').click( () => {
        let savedMainService = $('#nameOfService').val();
        if (savedMainService) {
            $.post({
                url: "../../Controller/Admin/ajax/ajax.php",
                data: {savedMainService: savedMainService},
                success: function(data) {
                    setResultMessage(data);
                    setTimeout(refresh, 3000);
                }
            });
        } else {
            showRequiredInputMessage();
        }
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

        if (savedSubService) {
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
        } else {
            showRequiredInputMessage();
        }
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

    function setFailedStyle() {
        $("#result").removeClass("alert-success").addClass("alert-danger");
        $("#result .fas, #result p").css("color", "#c70c0c");
        $("#result").css("display", "inline-block");
    }

    function setSuccessStyle() {
        $("#result").removeClass("alert-danger").addClass("alert-success");
        $("#result .fas, #result p").css("color", "#0a9b0f");
        $("#result").css("display", "inline-block");
    }

    function showRequiredInputMessage() {
        $("#result").html("<i class='fas fa-times-circle'></i><p>Mező kitöltése kötelező!</p>"); 
        setFailedStyle();
    }

    function setResultMessage(data) {
        if (data == 0) { 
            $("#result").html("<p><i class='fas fa-times-circle'></i>Sikertelen művelet!</p>"); 
            setFailedStyle();
        } else if (data == 1) {
            $("#result").html("<p><i class='fas fa-check-circle'></i>Sikeres művelet!</p>"); 
            setSuccessStyle();
        } else if (data == 2) {
            $("#result").html("<p>A jelszó sikeresen megváltozott!</p>"); 
            setSuccessStyle();
        } else if (data == 3) {
            $("#result").html("<p>Az új jelszó nem egyezik!</p>"); 
            setFailedStyle();
        }
    }

    function showErrorMessage(divID, message) {
        $(divID).html(message);
        $(divID).addClass("alert-danger");
        $(divID).css({"color":"#c70c0c", "padding":"10px 20px", "border-radius":"10px"});
    }

    function showSuccessMessage(divID, message) {
        $(divID).html(message);
        $(divID).addClass("alert-success");
        $(divID).css({"color":"#0a9b0f", "padding":"10px 20px", "border-radius":"10px"});
    }

});