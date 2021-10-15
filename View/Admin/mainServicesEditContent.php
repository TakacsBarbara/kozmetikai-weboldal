<?php 
if (isset($_SESSION["username"])) {

    $sql = "SELECT * FROM szolgaltatas_fokategoria WHERE id=".$_GET['id'];
    $result = $conn->query($sql);
    $row = $result -> fetch_array(MYSQLI_ASSOC);

    $service_name = $row["szolgaltatas_neve"];
    $service_id = $row["id"];
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="" >
                <div class="mb-3">
                    <label for="nameOfService" class="form-label">Szolgáltatás neve</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService" value="<?php echo $service_name ?>">
                    <input type="hidden" id="serviceID" value="<?php echo $service_id ?>">
                </div>
                <button type="button" class="btn btn-primary" id="mainServiceEdit">Módosítás</button>
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