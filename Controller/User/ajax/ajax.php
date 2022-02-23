<?php

include "../../../Model/User/db.php";
session_start();

if (isset($_POST["serviceName"])) {
    $serviceName = $_POST["serviceName"];
    $result = mysqli_fetch_array($conn->query("SELECT idotartam FROM szolgaltatas_alkategoria WHERE megnevezes='$serviceName'"));

    echo $result["idotartam"];
}

if (isset($_POST["categoryValue"])) {
    $category = $_POST["categoryValue"];
    $sql1 = mysqli_fetch_array($conn->query("SELECT id FROM szolgaltatas_fokategoria WHERE szolgaltatas_neve='$category'"));

    $categoryID = $sql1["id"];

    $sql2 = "SELECT megnevezes FROM szolgaltatas_alkategoria WHERE foKat_id='$categoryID'";
    $result = $conn->query($sql2);

    $options = "";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            $options .= '<option value="' . $value . '">' . $value . '</option>';
        }
    }

    echo $options;
}

if (isset($_POST["selectedServiceName"])) {
    $selectedServiceName = $_POST["selectedServiceName"];
    $result = mysqli_fetch_array($conn->query("SELECT id FROM szolgaltatas_alkategoria WHERE megnevezes='$selectedServiceName'"));

    echo $result["id"];
}

if (isset($_POST["reservationServiceId"])) {
    $reservationServiceId = $_POST["reservationServiceId"];
    $result = mysqli_fetch_array($conn->query("SELECT idotartam FROM szolgaltatas_alkategoria WHERE id='$reservationServiceId'"));

    echo $result["idotartam"];
}

if (isset($_POST["resServiceId"]) && isset($_POST["resDate"]) && isset($_POST["resAppointmentStart"]) && isset($_POST["resAppointmentEnd"]) && isset($_POST["guestId"])) {

    $resServiceId = $_POST["resServiceId"];
    $resDate = $_POST["resDate"];
    $resAppointmentStart = $_POST["resAppointmentStart"];
    $resAppointmentEnd = $_POST["resAppointmentEnd"];
    $guestId = $_POST["guestId"];

    $sql = "INSERT INTO idopontfoglalas (jovahagyva, idopont_datuma, idopont_kezdete, idopont_vege, vendeg_id, szAlkat_id)
            VALUES ('0', '$resDate', '$resAppointmentStart', '$resAppointmentEnd', '$guestId', '$resServiceId')";
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["reservedAppointmentIdToChange"]) && isset($_POST["newResServiceId"]) && isset($_POST["newResDate"]) && isset($_POST["newResAppointmentStart"]) && isset($_POST["newResAppointmentEnd"]) && isset($_POST["guestId"])) {

    $reservedAppointmentIdToChange = $_POST["reservedAppointmentIdToChange"];
    $newResServiceId = $_POST["newResServiceId"];
    $newResDate = $_POST["newResDate"];
    $newResAppointmentStart = $_POST["newResAppointmentStart"];
    $newResAppointmentEnd = $_POST["newResAppointmentEnd"];
    $guestId = $_POST["guestId"];

    $sql = "UPDATE idopontfoglalas
            SET jovahagyva=0, idopont_datuma='$newResDate', idopont_kezdete='$newResAppointmentStart', idopont_vege='$newResAppointmentEnd', vendeg_id='$guestId', szAlkat_id='$newResServiceId'
            WHERE id='$reservedAppointmentIdToChange'";
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["selectedDay"])) {
    $selectedDay = $_POST["selectedDay"];
    $result = $conn->query("SELECT idopont_kezdete, idopont_vege FROM idopontfoglalas WHERE idopont_datuma='$selectedDay'");

    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $array = json_encode($row);
    print_r($array);
}

if (isset($_POST["reservedServiceId"])) {
    $reservedServiceId = $_POST["reservedServiceId"];

    $sql = "DELETE FROM idopontfoglalas WHERE id='$reservedServiceId'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["selectedServiceId"])) {
    $selectedServiceId = $_POST["selectedServiceId"];

    $sql = "SELECT ar FROM szolgaltatas_alkategoria WHERE id='$selectedServiceId'";
    $result = $conn->query($sql);

    $row = mysqli_fetch_array($result);
    if ($row > 0) {
        echo $row["ar"];
    }
    // print_r($row);
}

function getResultValue($result)
{
    if ($result === TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}
