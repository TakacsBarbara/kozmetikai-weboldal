<?php
if (isset($_GET['loginrequired']) && $_GET['loginrequired'] == 1) {
    echo "<div id='login-message-container'><p id='required-login-message'>Kérlek jelentkezz be!</p></div>";
} else {
    echo "<div class='sign-in-title'><h1>Bejelentkezés</h1></div>";
}
?>
<div class="container page-content-container">
    <div class="row">
        <div class="col-12">
            <div class="user-login-page">
                <div class="container user-login-form-style">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-12 col-md-6 user-login-form">
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
                                <a href="userRegistration.php"><button type="button" class="user-reg-btn" id="user-registration">Regisztráció</button></a>
                            </form>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>