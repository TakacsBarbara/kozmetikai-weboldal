<?php
if (isset($_SESSION["username"])) {
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="" >
                <div class="mb-3">
                    <label for="nameOfService" class="form-label">Szolgáltatás neve</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService">
                </div>
                <button type="button" class="btn btn-primary" id="mainServiceSave">Mentés</button>
            </form>
        <div id="result"></div>
    </div>
    <div class="col"></div>
</div>

<?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
?>