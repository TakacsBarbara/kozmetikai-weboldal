<div class="container admin-login-form-style">
    <div class="row">
        <div class="col-12 form-title">
            <h1>Új felhasználói fiók létrehozása</h1>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col-0 col-md-5 col-lg-6 img-container admin-login-form">
            <img src="./../../Resources/img/Logo_kör.png" alt="logo-img-circle" id="logo-img-circle" width="350px">
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5 admin-login-form">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Felhasználónév</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó újra</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                </div>
                <div id="regMessage"></div>
                <button type="button" class="admin-reg-btn" id="registration">Regisztráció</button>
            </form>
        </div>
        <div class="col-0 col-lg-1"></div>
    </div>
</div>