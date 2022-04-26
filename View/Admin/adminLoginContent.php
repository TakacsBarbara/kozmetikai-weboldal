<?php
if (isset($_GET['loginrequired']) && $_GET['loginrequired'] == 1) {
    echo "<div id='login-message-container'><p id='required-login-message'>Kérem jelentkezzen be!</p></div>";
}
?>
<div class="container page-content-container">
    <div class="row">
        <div class="col-12">
            <div class="admin-login-page">
                <div class="row">
                    <div class="col-12 title">
                        <h1>Adminisztrációs felület</h1>
                    </div>
                </div>
                <div class="container admin-login-form-style">
                    <div class="row">
                        <div class="col-12 col-lg-6 img-container-admin">
                            <img src="./../../Resources/img/Logo_kör.png" alt="logo-img-circle" width="350px">
                        </div>
                        <div class="col-12 col-lg-5 admin-login-form">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Felhasználónév</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Jelszó</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div id="loginMessage"></div>
                                <button type="button" class="admin-login-btn" id="login">Belépés</button>
                            </form>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>