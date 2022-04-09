<?php

include "../../../Model/Admin/db.php";
include "./../../Email/mail.php";

session_start();

function getResultValue($result)
{
    if ($result === TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"]) && isset($_POST["reg"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // $sql = "INSERT INTO admin VALUES ('$username', '$password')";
    // $result = $conn->query($sql);
    // $row = mysqli_fetch_array($result);

    $sql = "INSERT INTO admin (felhasznalonev, jelszo) VALUES ('$username', '$password')";
    // $result = $conn->query($sql);
    $result = $conn->query($sql);

    getResultValue($result);
}

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

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

    $actualPassword = md5($_POST["actualPassword"]);
    $newPassword = md5($_POST["newPassword"]);
    $confirmPassword = md5($_POST["confirmPassword"]);
    $sql1 = "SELECT * FROM admin WHERE jelszo='$actualPassword'";
    $result1 = $conn->query($sql1);

    if (mysqli_num_rows($result1) > 0) {
        $sql2 = "UPDATE admin SET jelszo='$newPassword' WHERE jelszo='$actualPassword'";
        $result2 = $conn->query($sql2);

        if ($result2) {
            echo 2;
        }
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

if (isset($_POST["actualDate"])) {
    $actualDate = $_POST["actualDate"];

    $sql =
        "SELECT idopontfoglalas.id, idopontfoglalas.idopont_datuma, idopontfoglalas.idopont_kezdete, idopontfoglalas.idopont_vege, idopontfoglalas.jovahagyva, szolgaltatas_alkategoria.megnevezes,
    vendegek.vezeteknev, vendegek.keresztnev
    FROM idopontfoglalas
    JOIN szolgaltatas_alkategoria
    ON szolgaltatas_alkategoria.id = idopontfoglalas.szAlkat_id
    JOIN vendegek
    ON vendegek.id = idopontfoglalas.vendeg_id
    WHERE idopontfoglalas.idopont_datuma ='" . $actualDate . "'";

    $reservationDatas = $conn->query($sql);
    $row = mysqli_fetch_all($reservationDatas, MYSQLI_ASSOC);
    $array = json_encode($row);
    print_r($array);
}

if (isset($_POST["confirmedAppointmentId"])) {
    $confirmedAppointmentId = $_POST["confirmedAppointmentId"];

    $appointment = mysqli_fetch_array($conn->query("SELECT * FROM idopontfoglalas WHERE id='$confirmedAppointmentId'"));

    $guestId = $appointment["vendeg_id"];
    $guest = mysqli_fetch_array($conn->query("SELECT * FROM vendegek WHERE id='$guestId'"));
    $guestEmail = $guest["email"];
    $guestName = $guest["vezeteknev"] . " " . $guest["keresztnev"];

    $service = mysqli_fetch_array($conn->query("SELECT megnevezes FROM szolgaltatas_alkategoria WHERE id='$confirmedAppointmentId'"));

    $timestamp = strtotime($appointment["idopont_datuma"]);
    $appointmentDate = date("Y.m.d.", $timestamp);
    $appointmentStart = substr($appointment["idopont_kezdete"], 0, -3);
    $appointmentEnd = substr($appointment["idopont_vege"], 0, -3);

    $link = "<a href='http://localhost/PHP/View/User/appointmentBooking.php'>időpontfoglalás</a>";
    $message = "Kedves " . $guest["keresztnev"] . "!<br><br>Az általad lefoglalt időpontot (" . $appointmentDate . " " . $appointmentStart . " - " . $appointmentEnd . ") jóváhagytam.<br><br>Szeretettel várlak!<br><br>Üdvözlettel,<br>Hegyi Judit";
    $mail->AddAddress($guestEmail, $guestName);
    $mail->Subject  =  'Jóváhagyott időpont';
    $mail->Body    = $message;

    $sql = "UPDATE idopontfoglalas SET jovahagyva=1 WHERE id='$confirmedAppointmentId'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $mail->Send();
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["rejectedAppointmentId"])) {
    $rejectedAppointmentId = $_POST["rejectedAppointmentId"];

    $appointment = mysqli_fetch_array($conn->query("SELECT * FROM idopontfoglalas WHERE id='$rejectedAppointmentId'"));

    $guestId = $appointment["vendeg_id"];
    $guest = mysqli_fetch_array($conn->query("SELECT * FROM vendegek WHERE id='$guestId'"));
    $guestEmail = $guest["email"];
    $guestName = $guest["vezeteknev"] . " " . $guest["keresztnev"];

    $service = mysqli_fetch_array($conn->query("SELECT megnevezes FROM szolgaltatas_alkategoria WHERE id='$rejectedAppointmentId'"));

    $timestamp = strtotime($appointment["idopont_datuma"]);
    $appointmentDate = date("Y.m.d.", $timestamp);
    $appointmentStart = substr($appointment["idopont_kezdete"], 0, -3);
    $appointmentEnd = substr($appointment["idopont_vege"], 0, -3);

    $link = "<a href='http://localhost/PHP/View/User/appointmentBooking.php'>időpontfoglalás</a>";
    $message = "Kedves " . $guest["keresztnev"] . "!<br><br>Sajnálattal értesítelek, hogy az általad lefoglalt időpontban (" . $appointmentDate . " " . $appointmentStart . " - " . $appointmentEnd . ") nem tudlak fogadni.<br><br>Amennyiben szerenél új időpontot foglalni, az alábbi linken tudod megtenni: " . $link . "<br><br>Köszönöm megértésed!<br><br>Üdvözlettel,<br>Hegyi Judit";
    $mail->AddAddress($guestEmail, $guestName);
    $mail->Subject  =  'Lemondott időpont';
    $mail->Body    = $message;

    $sql = "UPDATE idopontfoglalas SET jovahagyva=2 WHERE id='$rejectedAppointmentId'";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $mail->Send();
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["opinionId"])) {
    $opinionId = $_POST["opinionId"];

    $sql = "DELETE FROM vendegkonyv WHERE id='$opinionId'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["confirmOpinionId"])) {
    $confirmOpinionId = $_POST["confirmOpinionId"];

    $sql = "UPDATE vendegkonyv SET megjelenites='1' WHERE id='$confirmOpinionId'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo 1;
    } else {
        echo 0;
    }
}
