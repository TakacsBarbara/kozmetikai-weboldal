<?php  //print_r($_GET["id"]);
    
    $sql = "SELECT * FROM szolgaltatas_alkategoria WHERE id=".$_GET['id'];
    //echo "LEKÉRDEZÉS". $sql;
    $result = $conn->query($sql);
    $row = $result -> fetch_array(MYSQLI_ASSOC);

    $service_name = $row["megnevezes"];
    $service_id = $row["id"];
    $service_price = $row["ar"];
    $service_duration = $row["idotartam"];

    //print_r($row);
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="" >
                <div class="mb-3">
                    <label for="nameOfService" class="form-label">Szolgáltatás neve</label>
                    <input type="text" class="form-control" id="nameOfService" name="nameOfService" value="<?php echo $service_name ?>">
                    <label for="nameOfService" class="form-label">Szolgáltatás ára</label>
                    <input type="text" class="form-control" id="priceOfService" name="priceOfService" value="<?php echo $service_price ?>">
                    <label for="nameOfService" class="form-label">Szolgáltatás időtartama</label>
                    <input type="text" class="form-control" id="durationOfService" name="durationOfService" value="<?php echo $service_duration ?>">
                    <input type="hidden" id="serviceID" value="<?php echo $service_id ?>">
                </div>
                <button type="button" class="btn btn-primary" id="subServiceEdit">Módosítás</button>
            </form>
        <div id="result"></div>
    </div>
    <div class="col"></div>
</div>
