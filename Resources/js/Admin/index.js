
$(document).ready( () => {
    //alert('hello');

    $('.mainServices').on('click',function(){
        let mainServiceID = $(this).children("a").attr('id');
        $.each( $('.sc_'+mainServiceID), function() {
            $(this).css("display","table-row");
        });
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
                $("#result").html(data);
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
            
            setTimeout(refresh, 3000);
        }
    });
});

function refresh(){
    //alert("refresh");
    //location.reload(true);
    window.location.replace("http://localhost/PHP/View/Admin/mainServicesListed.php");
}

});
