
$("#subServiceDelete").click( () => {
    let deletedSubService = $("#nameOfSubService").val();
    $.post({
        url: "../../Controller/Admin/ajax/ajax.php",
        data: {deletedSubService: deletedSubService},
        success: function(data) {
            $("#result").html(data);
        }
    });
});

$("#subServiceEdit").click( () => {
    let editedSubService = $("#nameOfService").val();
    let editedSubServiceID = $("#serviceID").val();
    $.post({
        url: "../../Controller/Admin/ajax/ajax.php",
        data: {editedSubService: editedSubService, editedSubServiceID: editedSubServiceID},
        success: function(data) {
            $("#result").html(data);
        }
    });
});