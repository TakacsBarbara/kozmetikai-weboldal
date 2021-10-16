$(document).ready( () => {

    let modal = $(".modal");
    let overlay = $(".overlay");
    let modalMessage = $("#modal-message");
    
    function showModal() {
        modal.removeClass("hidden");
        overlay.removeClass("hidden");
    }

    function hideModal() {
        modal.addClass("hidden");
        overlay.addClass("hidden");
    }

    $("#open-modal-btn").click(showModal);
    $("#close-modal-btn").click(hideModal);
    $(".overlay").click(hideModal);
    $(window).keydown((e) => {
        const pressedKey = e.key;

        if (pressedKey === "Escape") {
            if (!modal.hasClass("hidden") && !overlay.hasClass("hidden")) {
                hideModal();
            }
        }
    });


    $("#successful-modal-btn").click( () => {
        modal.removeClass("failed-modal-style").addClass("successful-modal-style");
        modalMessage.text("Sikeres művelet!");
        showModal();
    });

    $("#failed-modal-btn").click( () => {
        modal.removeClass("successful-modal-style").addClass("failed-modal-style");
        modalMessage.text("Sikertelen művelet!");
        showModal();
    });

});