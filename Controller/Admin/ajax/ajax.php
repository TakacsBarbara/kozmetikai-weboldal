<?php

include "../../../Model/Admin/db.php";
session_start();

function getResultValue($result)
{
    if ($result === TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM admin WHERE felhasznalonev='$username' AND jelszo='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row > 0) {
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["felhasznalonev"];
        echo "True";
    } else {
        echo "False";
    }
}

if (isset($_POST["actualPassword"]) && isset($_POST["newPassword"]) && isset($_POST["confirmPassword"])) {

    $actualPassword = $_POST["actualPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // echo $actualPassword;
    // echo " " . $newPassword;
    // echo " " . $confirmPassword;

    $sql1 = "SELECT * FROM admin WHERE jelszo='$actualPassword'";
    $result1 = $conn->query($sql1);

    //echo "<br><br>" ;
    //echo mysqli_num_rows($result1);

    if (mysqli_num_rows($result1) > 0) {
        //echo "Külső";
        // if ($newPassword == $confirmPassword) {
            //echo "Belső";
            $sql2 = "UPDATE admin SET jelszo='$newPassword' WHERE jelszo='$actualPassword'";
            $result2 = $conn->query($sql2);
            //$resultValue = getResultValue2($result2);

            //echo $result2;
            //echo $resultValue;
            
            if ($result2) {
                echo 2;
            }
            
        // } else {
        //     echo 3;
        // }
    }
}

if (isset($_POST["savedMainService"])) {
    $savedMainService = $_POST["savedMainService"];

    $sql = "INSERT INTO szolgaltatas_fokategoria (szolgaltatas_neve) VALUES ('$savedMainService')";
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["editedMainService"])) {
    $editedMainService = $_POST["editedMainService"];
    $editedMainServiceID = $_POST["editedMainServiceID"];

    $sql = "UPDATE szolgaltatas_fokategoria SET szolgaltatas_neve='$editedMainService' WHERE id='$editedMainServiceID'";
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["deletedMainService"])) {
    $deletedMainService = $_POST["deletedMainService"];
    $sql = "DELETE FROM szolgaltatas_fokategoria WHERE szolgaltatas_neve='$deletedMainService'";
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["savedSubService"])) {
    $mainServiceID = $_POST["mainServiceID"];
    $subServiceName = $_POST["savedSubService"];
    $subServicePrice = $_POST["subServicePrice"];
    $subServiceDuration = $_POST["subServiceDuration"];

    $sql = "INSERT INTO szolgaltatas_alkategoria (megnevezes, ar, idotartam, foKat_id)
            VALUES ('$subServiceName', '$subServicePrice', '$subServiceDuration', '$mainServiceID')";
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["editedSubService"])) {
    $editedSubService = $_POST["editedSubService"];
    $editedSubServiceID = $_POST["editedSubServiceID"];
    $editedSubServicePrice = $_POST["editedSubservicePrice"];
    $editedSubServiceDuration = $_POST["editedSubServiceDuration"];

    $sql =
        "UPDATE szolgaltatas_alkategoria 
         SET megnevezes='$editedSubService', ar='$editedSubServicePrice', idotartam='$editedSubServiceDuration'
         WHERE id='$editedSubServiceID'
        ";

    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["deletedSubService"])) {
    $deletedSubService = $_POST["deletedSubService"];
    $sql = "DELETE FROM szolgaltatas_alkategoria WHERE megnevezes='$deletedSubService'";
    $result = $conn->query($sql);

    getResultValue($result);
}
