<?php
if (isset($_SESSION["username"])) {
?>

<div class="container">
    <div class="services-title-container">
        <h1>Új szolgáltatás kategória felvétele</h1>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="" >
                <div class="mb-3">
                    <label for="nameOfService" class="form-label">Kategória neve*</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService" required>
                </div>
                <button type="button" class="services-btn" id="mainServiceSave">Mentés</button>
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