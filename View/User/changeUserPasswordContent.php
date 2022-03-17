<?php
if (isset($_SESSION["userId"])) {
?>

    <div class="form">
        <div class="container new-user-password">
            <div class="new-password-title-container">
                <h1>Jelszó módosítása</h1>
                <div id="result"></div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
                    <form action="">
                        <div class="mb-3">
                            <label for="act-pswd" class="form-label new-password-form-label-style">Aktuális jelszó*</label>
                            <input type="password" class="form-control" id="act-pswd" name="act-pswd">
                            <label for="new-pswd" class="form-label new-password-form-label-style">Új jelszó*</label>
                            <input type="password" class="form-control" id="new-pswd" name="new-pswd">
                            <small>Legalább 8 karakter hosszúnak kell lennie!</small><br>
                            <label for="conf-pswd" class="form-label new-password-form-label-style">Jelszó újra*</label>
                            <input type="password" class="form-control" id="conf-pswd" name="conf-pswd">
                        </div>
                        <button type="button" class="new-password-btn" id="pswdChange">Módosítás</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

<?php
} else {
    header("Location: ./userLogin.php?loginrequired=1");
}
?>