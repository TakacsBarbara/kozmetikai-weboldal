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
                                console.log("Sikeres");
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

    console.log(emailOk);

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
                    console.log("Itt ok");
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
    $(".regMessageContainer").removeClass("hidden");
    $(divID).html(message);
    $(divID).addClass("alert-danger");
    $(divID).css({"color":"#c70c0c", "padding":"10px 20px", "border-radius":"10px"});
}

function showSuccessMessage(divID, message) {
    $(".regMessageContainer").removeClass("hidden");
    $(divID).html(message);
    $(divID).removeClass("alert-danger");
    $(divID).addClass("alert-success");
    $(divID).css({"color":"#0a9b0f", "padding":"10px 20px", "border-radius":"10px"});
}

function refreshReservationList(){
    window.location.replace("http://localhost/PHP/View/User/userAppointmentsList.php");
}