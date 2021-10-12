<?php

// session_start();

// if (count($_POST) > 0) {
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $sql = "SELECT * FROM admin WHERE felhasznalonev='$username' AND jelszo='$password'";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_array($result);
//     if (is_array($row)) {
//         $_SESSION["id"] = $row["id"];
//         $_SESSION["username"] = $row["felhasznalonev"];
//     } else {
//         $loginMessage = "Invalid Username or Password!";
//     }
// }
// if (isset($_SESSION["id"])) {
//     header("Location: ./");
// }

if (isset($_SESSION["username"])) {
    echo $_SESSION["username"];
}

?>


<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Felhasználónév</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="button" class="btn btn-primary" id="login">Belépés</button>
            </form>

            <div id="loginMessage"></div>

        </div>
        <div class="col"></div>
    </div>