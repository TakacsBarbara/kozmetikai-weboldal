<?php
if (isset($_SESSION["username"])) {
?>

<div class="form">
    <div class="container">
        <div class="new-service-title-container">
            <h1>Jelszó módosítása</h1>
            <div id="result"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-5">
                <form action="">
                    <div class="mb-3">
                        <label for="act-pswd" class="form-label services-form-label-style">Aktuális jelszó*</label>
                        <input type="password" class="form-control" id="act-pswd" name="act-pswd">
                        <label for="new-pswd" class="form-label services-form-label-style">Új jelszó*</label>
                        <input type="password" class="form-control" id="new-pswd" name="new-pswd">
                        <label for="conf-pswd" class="form-label services-form-label-style">Jelszó újra*</label>
                        <input type="password" class="form-control" id="conf-pswd" name="conf-pswd">
                    </div>
                    <button type="button" class="services-btn" id="pswdChange">Módosítás</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</div>

<?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
?>