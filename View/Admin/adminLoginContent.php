<?php

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