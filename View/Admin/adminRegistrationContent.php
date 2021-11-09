
<div class="container admin-login-form-style">
    <div class="row">
        <div class="col-6">
            <img src="./../../Resources/img/Logo_kör_500px_1.png" alt="logo-img-circle" width="350px">
        </div>
            <div class="col-5 admin-login-form">
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
        <div class="col"></div>
    </div>
</div>