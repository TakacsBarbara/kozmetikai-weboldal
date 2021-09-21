<?php 

include "../../../Model/Admin/db.php";

// $email = $password = $emailErr = $passwordErr = "";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "kozmetika_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// mysqli_set_charset($conn,"utf8");
// // Check connection
// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM admin WHERE felhasznalonev='$username' AND jelszo='$password'";
    //echo "LEKÉRDEZÉS". $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Sikeres bejelentkezés";
    } else {
        echo "Sikertelen bejelentkezés!";
    }
    
}

if (isset($_POST["savedMainService"])) {
    $savedMainService = $_POST["savedMainService"];

    $sql = "INSERT INTO szolgaltatas_fokategoria (szolgaltatas_neve) VALUES ('$savedMainService')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Új szolgáltatás rögzítése sikeresen megtörtént!";
    } else {
        echo "Új szolgáltatás rögzítése sikertelen! <br> Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST["editedMainService"])) {
    $editedMainService = $_POST["editedMainService"];
    $editedMainServiceID = $_POST["editedMainServiceID"];

    $sql = "UPDATE szolgaltatas_fokategoria SET szolgaltatas_neve='$editedMainService' WHERE id='$editedMainServiceID'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Szolgáltatás módosítása sikeresen megtörtént!";
    } else {
        echo "Szolgáltatás módosítása sikertelen! <br> Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST["editedSubService"])) {
    //echo "hello";
    $editedSubService = $_POST["editedSubService"];
    $editedSubServiceID = $_POST["editedSubServiceID"];

    // echo $editedSubService;
    // echo $editedSubServiceID;

    $sql = "UPDATE szolgaltatas_alkategoria SET megnevezes='$editedSubService' WHERE id='$editedSubServiceID'";
    $result = $conn->query($sql);

    //echo $result;

    if ($result === TRUE) {
        echo "Szolgáltatás módosítása sikeresen megtörtént!";
    } else {
        echo "Szolgáltatás módosítása sikertelen! <br> Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST["deletedMainService"])) {
    $deletedMainService = $_POST["deletedMainService"];
    $sql = "DELETE FROM szolgaltatas_fokategoria WHERE szolgaltatas_neve='$deletedMainService'";
    $result = $conn->query($sql);
    
    if ($result === TRUE) {
        echo "Szolgáltatás törlése sikerült!";
    } else {
        echo "Szolgáltatás törlése sikertelen volt! <br> Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST["deletedSubService"])) {
    $deletedSubService = $_POST["deletedSubService"];
    $sql = "DELETE FROM szolgaltatas_alkategoria WHERE megnevezes='$deletedSubService'";
    $result = $conn->query($sql);
    
    if ($result === TRUE) {
        echo "Szolgáltatás törlése sikerült!";
    } else {
        echo "Szolgáltatás törlése sikertelen volt! <br> Error: " . $sql . "<br>" . $conn->error;
    }
}
