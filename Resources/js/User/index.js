$('.reserved-appointment-delete').on("click", function() {
    let reservedServiceId = $(this).attr("id");

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

$("#user-registration-btn").click( () => {
    let lastName = $("#last-name").val();
    let firstName = $("#first-name").val();
    let birthDate = $("#birth-date").val();
    let email = $("#email").val();
    let phone = $("#phone-number").val();
    let password = $("#password").val();
    let confirmPassword = $("#confirm-password").val();
    let allergy = $("#allergy").val() ? $("#allergy").val() : "Nincs";
    let drugAllergy = $("#drug-allergy").val() ? $("#drug-allergy").val() : "Nincs";

    let emailOk = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);

    checkInputValue(lastName.length < 2, "#last-name");
    checkInputValue(firstName.length < 2, "#first-name");
    checkInputValue(birthDate.length == 0, "#birth-date");
    checkInputValue(!emailOk, "#email");
    checkInputValue(!phone.length, "#phone-number");
    checkInputValue(password.length < 8, "#password");
    checkInputValue(confirmPassword.length < 8, "#confirm-password");

    if (lastName.length >= 2 && lastName.length >= 2 && birthDate.length != 0 && emailOk == 1 && phone.length > 0 && 
         password.length >= 8 && password === confirmPassword) {
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {
                lastName: lastName,
                firstName: firstName,
                birthDate: birthDate,
                email: email,
                phone: phone, 
                password: password, 
                confirmPassword: confirmPassword,
                allergy: allergy,
                drugAllergy: drugAllergy
            },
            success: function(data) {
                if (data == 1) {
                    showSuccessMessage("#regMessage", "Sikeres regisztráció!");
                } else if (data === "False") {
                    showErrorMessage("#regMessage", "Sikertelen regisztráció!");
                }
            }
        });
    } else if (password != confirmPassword){
        showErrorMessage("#regMessage", "A jelszavak nem egyeznek!");
    }
});

$("#user-login").click( () => {
    let email = $("#email-address").val();
    let password = $("#password").val();

    $.post({
        url: "../../Controller/User/ajax/ajax.php",
        data: {email: email, password: password, "login":"1"},
        success: function(data) {
            if (data === "True") {
                directToHomePage();
            } else if (data === "False") {
                showErrorMessage("#loginMessage", "Sikertelen bejelentkezés!");
            }
        }
    });
});

$("#user-forgot-pswd-btn").click( () => {
    let newPassword = $("#new-password").val();
    let confirmPassword = $("#new-cpassword").val();
    let linkToken = $("#reset_link_token").val(); 
    // let userEmail = $("#reset-password-email").val(); 

    // console.log(newPassword, confirmPassword, linkToken, userEmail);
    
    if (newPassword === confirmPassword) {
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            // data: {password: newPassword, reset_link_token: linkToken, email: userEmail },
            data: {password: newPassword, reset_link_token: linkToken},
            success: function(data) {
                if (data == 1) {
                    showSuccessMessage("#resultMessage", "A jelszó megváltozott")
                    $("#user-forgotpswd-btn").css("display", "none");
                    setTimeout(directToUserLoginPage, 3000);
                } else if (data == 0) {
                    showErrorMessage("#resultMessage", "Jelszó megváltoztatása nem sikerült");
                }
            }
        });
    } else {
        showErrorMessage("#resultMessage", "A megadott jelszavak nem egyeznek!");
    }
    
});

$("#user-send-msg-btn").click( () => {
    let userName = $("#user-msg-name").val();
    let email = $("#user-email-address").val();
    let phone = $("#user-phone").val();
    let message = $("#user-msg").val();

    let emailOk = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);

    checkInputValue(userName.length < 5, "#user-msg-name");
    checkInputValue(!emailOk, "#user-email-address");
    checkInputValue(!phone.length, "#user-phone");
    checkInputValue(message.length < 10, "#user-msg");


    if (userName.length >= 5 && message.length >= 10 && emailOk == 1 && phone.length > 0) {
        $.post({
            url: "../../Controller/User/ajax/ajax.php",
            data: {
                userName: userName,
                email: email,
                phone: phone, 
                message: message
            },
            success: function(data) {
                if (data == 1) {
                    showSuccessMessage("#resultMessage", "Üzenet elküldve!");
                    setTimeout(directToHomePage, 3000);
                } else if (data === "False") {
                    showErrorMessage("#resultMessage", "Üzenet küldése sikertelen!");
                }
            }
        });
    } else if (password != confirmPassword){
        showErrorMessage("#regMessage", "A jelszavak nem egyeznek!");
    }
});

$("#pswdChange").click( () => {
    let actualPassword = $("#act-pswd").val();
    let newPassword = $("#new-pswd").val();
    let confirmPassword = $("#conf-pswd").val();

    if ((actualPassword != '') && (newPassword != '') && (confirmPassword != '')) {
        if (newPassword === confirmPassword) {
            $.post({
                url: "../../Controller/User/ajax/ajax.php",
                data: {
                    actualPassword: actualPassword,
                    newPassword: newPassword,
                    confirmPassword: confirmPassword
                },
                success: function(data) {
                    setResultMessage(data);
                    if (data == 2) {
                        setTimeout(directToHomePage, 3000);
                    }
                }
            });
        } else {
            setResultMessage(3);
        }
    } else {
        showRequiredInputMessage();
    }
});

// function generateNewPassword() {
//     var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
//     var passwordLength = 12;
//     var password = "";

//     for (var i = 0; i <= passwordLength; i++) {
//         var randomNumber = Math.floor(Math.random() * chars.length);
//         password += chars.substring(randomNumber, randomNumber +1);
//     }

//     return password;
// }

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

function checkInputValue(condition, element) {
    if (condition) {
        $(element).addClass("red-border");
    } else {
        $(element).removeClass("red-border");
    }
}

function showModal(message, style) {
    $("#reservations-list-modal").removeClass("hidden");
    $("#reservations-list-modal #modal-message").text(message);
    $("#reservations-list-modal").addClass(style);
}

function showErrorMessage(divID, message) {
    $(divID).html(message);
    $(divID).addClass("alert-danger");
    $(divID).css({"color":"#c70c0c", "padding":"10px 20px", "border-radius":"10px"});
}

function showSuccessMessage(divID, message) {
    $(divID).html(message);
    $(divID).removeClass("alert-danger");
    $(divID).addClass("alert-success");
    $(divID).css({"color":"#0a9b0f", "padding":"10px 20px", "border-radius":"10px"});
}

function refreshReservationList(){
    window.location.replace("http://localhost/PHP/View/User/userAppointmentsList.php");
}

function directToHomePage(){
    window.location.replace("http://localhost/PHP/View/User/homePage.php");
}

function directToUserLoginPage(){
    window.location.replace("http://localhost/PHP/View/User/userLogin.php");
}