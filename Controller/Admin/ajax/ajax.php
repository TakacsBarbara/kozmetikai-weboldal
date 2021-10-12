<?php

include "../../../Model/Admin/db.php";
// session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM admin WHERE felhasznalonev='$username' AND jelszo='$password'";
    //echo "LEKÉRDEZÉS". $sql;
    //$result = $conn->query($sql);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["felhasznalonev"];
        echo "True";
    } else {
        echo "False";
    }

    //echo "AjAX";


    // if ($result->num_rows > 0) {
    //     echo "True";
    // } else {
    //     echo "False";
    // }

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

if (isset($_POST["savedSubService"])) {
    $mainServiceID = $_POST["mainServiceID"];
    $subServiceName = $_POST["savedSubService"];
    $subServicePrice = $_POST["subServicePrice"];
    $subServiceDuration = $_POST["subServiceDuration"];

    $sql = "INSERT INTO szolgaltatas_alkategoria (megnevezes, ar, idotartam, foKat_id)
    VALUES ('$subServiceName', '$subServicePrice', '$subServiceDuration', '$mainServiceID')";
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
    $editedSubServicePrice = $_POST["editedSubservicePrice"];
    $editedSubServiceDuration = $_POST["editedSubServiceDuration"];

    // echo $editedSubService;
    // echo $editedSubServiceID;

    $sql =
        "UPDATE szolgaltatas_alkategoria 
    SET megnevezes='$editedSubService', ar='$editedSubServicePrice', idotartam='$editedSubServiceDuration'
    WHERE id='$editedSubServiceID'";
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
