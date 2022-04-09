<?php


$sql = "SELECT * FROM szolgaltatas_fokategoria";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM szolgaltatas_alkategoria";
$result2 = $conn->query($sql2);

$mainServicesMobil = $result;
$subServicesMobil = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$sqlDesktop = "SELECT * FROM szolgaltatas_fokategoria";
$resultDesktop = $conn->query($sqlDesktop);

$sqlDesktop2 = "SELECT * FROM szolgaltatas_alkategoria";
$resultDesktop2 = $conn->query($sqlDesktop2);

$mainServicesDesktop = $resultDesktop;
$subServicesDesktop = mysqli_fetch_all($resultDesktop2, MYSQLI_ASSOC);

$sql3 =
    "SELECT vendegkonyv.id, vendegkonyv.ertekeles, vendegkonyv.hozzaszolas_datuma, vendegek.vezeteknev, vendegek.keresztnev, vendegek.email
    FROM vendegkonyv
    JOIN vendegek
    ON vendegek.id = vendegkonyv.vendeg_id
    WHERE vendegkonyv.megjelenites=0";
$opinions = $conn->query($sql3);

foreach ($subServicesDesktop as $row_number => $value) {
    //print_r($value["megnevezes"]);
}

foreach ($subServicesDesktop as $row_number) {
    //echo print_r($row_number)."<br>";
    foreach ($row_number as $key => $value) {
        // print_r($key . " ". $value);
        // echo "<br>";
    }
}
