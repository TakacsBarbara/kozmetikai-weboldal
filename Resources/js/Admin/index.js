


$( document ).ready(function() {

    //alert("Hello");
   
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

    $("#mainServiceSave").click( function() {
        let savedMainService = $("#nameOfService").val();
        alert(savedMainService);
        $.post({
            url: "../../Controller/Admin/ajax/ajax.php",
            data: {savedMainService: savedMainService},
            success: function(data) {
                $("#result").html(data);    
            }
        });
    });

    $("#mainServiceDelete").click( function() {
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

