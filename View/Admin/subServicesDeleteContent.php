<?php
    
    $sql = "SELECT * FROM szolgaltatas_alkategoria WHERE id=".$_GET['id'];
    $result = $conn->query($sql);
    $row = $result -> fetch_array(MYSQLI_ASSOC);
    //print_r($row) ;

    $service_name = $row["megnevezes"];
    $service_id = $row["id"];
    // echo $service_name;
    // echo $service_id;
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-5">
            <form action="" >
                <div class="mb-3">
                    <label for="nameOfService" class="form-label">Szolgáltatás neve</label>
                    <input type="text" class="form-control" id="nameOfSubService" name="nameOfService" value="<?php echo $service_name ?>">
                    <input type="hidden" id="subServiceID" value="<?php echo $service_id ?>">
                </div>
                <button type="button" class="btn btn-primary" id="subServiceDelete">Törlés</button>
            </form>
            <!-- <script>console.log($('#nameOfSubService').val());</script> -->
        <div id="result"></div>
    </div>
    <div class="col"></div>
</div>

<script src="../../Resources/js/Admin/index2.js"></script>
