
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
});
