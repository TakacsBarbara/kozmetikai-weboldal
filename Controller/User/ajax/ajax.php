<?php 

include "../../../Model/User/db.php";
session_start();

if (isset($_POST["serviceName"])) {
    $serviceName = $_POST["serviceName"];
    $result = mysqli_fetch_array($conn->query("SELECT idotartam FROM szolgaltatas_alkategoria WHERE megnevezes='$serviceName'"));
    
    echo $result["idotartam"];
}

if (isset($_POST["categoryValue"])) {
    $category = $_POST["categoryValue"];
    $sql1 = mysqli_fetch_array($conn->query("SELECT id FROM szolgaltatas_fokategoria WHERE szolgaltatas_neve='$category'"));
    
    $categoryID = $sql1["id"];

    $sql2 = "SELECT megnevezes FROM szolgaltatas_alkategoria WHERE foKat_id='$categoryID'";
    $result = $conn->query($sql2);

    $options = "";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) { 
            $options .= '<option value="' . $value . '">' . $value . '</option>';
        }
    }

    echo $options;
}

if (isset($_POST["savedMainService"])) {
    $savedMainService = $_POST["savedMainService"];

    $sql = "INSERT INTO szolgaltatas_fokategoria (szolgaltatas_neve) VALUES ('$savedMainService')";
    $result = $conn->query($sql);

    getResultValue($result);
}