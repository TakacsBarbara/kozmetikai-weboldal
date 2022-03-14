<?php
if (isset($_GET['loginrequired']) && $_GET['loginrequired'] == 1) {
    echo "<div id='login-message-container'><p id='required-login-message'>Kérem jelentkezzen be!</p></div>";
}
?>

<div class="container user-login-form-style">
    <div class="row">
        <!-- <div class="col-6">
            <img src="./../../Resources/img/Logo_kör.png" alt="logo-img-circle" width="350px">
        </div> -->
        <div class="col-3"></div>
        <div class="col-6 user-login-form">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="email-address" class="form-label">Email cím</label>
                    <input type="text" class="form-control" id="email-address" name="email-address">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-2">
                    <a href="./forgotPasswordUser.php">Elfelejtette jelszavát?</a>
                </div>
                <div id="loginMessage"></div>
                <button type="button" class="user-login-btn" id="user-login">Belépés</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>