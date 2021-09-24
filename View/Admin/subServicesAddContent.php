<?php

$sql = "SELECT * FROM szolgaltatas_fokategoria WHERE id=" . $_GET['id'];
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
//print_r($row) ;

$main_service_name = $row["szolgaltatas_neve"];
$main_service_id = $row["id"];
// echo $service_name;
// echo $service_id;
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="">
                <div class="mb-3">
                    <label for="mainService" class="form-label">Szolgáltatáshoz tartozó főkategória</label>
                    <input type="text" class="form-control" id="mainService" name="mainService" value="<?php echo $main_service_name ?>">
                    <label for="nameOfService" class="form-label">Új szolgáltatás neve</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService">
                    <label for="priceOfService" class="form-label">Szolgáltatás ára</label>
                    <input type="text" class="form-control" id="priceOfService" name="priceOfService">
                    <label for="durationOfService" class="form-label">Szolgáltatás időtartama</label>
                    <input type="text" class="form-control" id="durationOfService" name="durationOfService">
                </div>
                <button type="button" class="btn btn-primary" id="subServiceSave">Mentés</button>
            </form>

            <div id="result"></div>

        </div>
        <div class="col"></div>
    </div>