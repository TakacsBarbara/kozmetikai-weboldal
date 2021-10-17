<?php
if (isset($_SESSION["username"])) {

    $sql = "SELECT * FROM szolgaltatas_fokategoria WHERE id=" . $_GET['id'];
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $main_service_name = $row["szolgaltatas_neve"];
    $main_service_id = $row["id"];
?>

<div class="container">
    <div class="new-service-title-container">
        <h1>Új szolgáltatás felvétele</h1>
        <div id="result"></div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="">
                <div class="mb-3">
                    <label for="mainService" class="form-label">Szolgáltatáshoz tartozó kategória</label>
                    <input type="text" class="form-control" id="mainService" name="mainService" value="<?php echo $main_service_name ?>" readonly>
                    <input type="hidden" id="mainServiceID" value="<?php echo $main_service_id ?>">
                    <label for="nameOfService" class="form-label services-form-label-style">Új szolgáltatás neve*</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService">
                    <label for="priceOfService" class="form-label services-form-label-style">Szolgáltatás ára</label>
                    <input type="text" class="form-control" id="priceOfService" name="priceOfService" placeholder="3500">
                    <label for="durationOfService" class="form-label services-form-label-style">Szolgáltatás időtartama (perc)</label>
                    <input type="text" class="form-control" id="durationOfService" name="durationOfService" placeholder="30">
                </div>
                <button type="button" class="services-btn" id="subServiceSave">Mentés</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php
} else {
  header("Location: ./adminLogin.php?loginrequired=1");
}
?>