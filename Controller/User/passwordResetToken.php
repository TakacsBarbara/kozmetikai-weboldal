<?php

include "./../../Model/User/db.php";
include "./../Email/mail.php";
include "./../../View/User/layouts/header.php";

function showResultMessage($class, $color, $message)
{
    echo ('<div class="container user-forgot-password-style">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 ' . $class . '" style="color:' . $color . '; padding:0 20px; border-radius:10px;height: 100px; text-align: center; line-height: 100px; font-size: 32px; font-family: Poiret One, cursive;">' . $message . '</div>
                    <div class="col-3"></div>
                </div>
            </div>');
}

if (isset($_POST['password-reset-token']) && $_POST['email']) {

    $emailId = $_POST['email'];
    $result = mysqli_query($conn, "SELECT * FROM vendegek WHERE email='" . $emailId . "'");
    $row = mysqli_fetch_array($result);

    if ($row) {

        $token = md5($emailId) . rand(10, 9999);

        $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));

        $expDate = date("Y-m-d H:i:s", $expFormat);

        $update = mysqli_query($conn, "UPDATE vendegek SET reset_link_token='" . $token . "', exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

        $link = "<a href='http://localhost/PHP/View/User/resetUserPassword.php?key=" . $emailId . "&token=" . $token . "'>jelszó beállítása</a>";

        $message = "Kedves " . $row["keresztnev"] . "!<br><br>Az alábbi linkre kattintva tudod beállítani új jelszavad: " . $link . "<br><br>Üdvözlettel,<br>Hegyi Judit";
        $mail->AddAddress($row["email"], $row["vezeteknev"] . ' ' . $row["keresztnev"]);
        $mail->Subject  =  'Lashes and More - Új jelszó beállítása';
        $mail->Body    = $message;
        // $mail->Body    = 'Új jelszó beállítása: ' . $link . '';

        if ($mail->Send()) {
            showResultMessage("alert-success", "#0a9b0f", "Az emailt sikeresen elküldtük!");
        } else {
            showResultMessage("alert-danger", "#c70c0c", "Email küldése sikertelen!");
        }
    } else {
        showResultMessage("alert-danger", "#c70c0c", "A megadott email cím nem létezik!");
    }
}
