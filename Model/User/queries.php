<?php

$sql = "SELECT * FROM szolgaltatas_fokategoria";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM szolgaltatas_alkategoria";
$result2 = $conn->query($sql2);

$mainServices = $result;
$subServices = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$sql3 =
    "SELECT vendegkonyv.ertekeles, vendegkonyv.hozzaszolas_datuma, vendegek.keresztnev
    FROM vendegkonyv
    JOIN vendegek
    ON vendegek.id = vendegkonyv.vendeg_id
    WHERE vendegkonyv.megjelenites=1";
$opinions = $conn->query($sql3);

if (isset($_SESSION["userId"])) {
    $userId = $_SESSION["userId"];

    $sql =
        "SELECT idopontfoglalas.id, idopontfoglalas.idopont_datuma, idopontfoglalas.idopont_kezdete, idopontfoglalas.jovahagyva, 
    szolgaltatas_alkategoria.megnevezes, szolgaltatas_alkategoria.ar, szolgaltatas_alkategoria.idotartam
    FROM idopontfoglalas
    JOIN szolgaltatas_alkategoria
    ON szolgaltatas_alkategoria.id = idopontfoglalas.szAlkat_id
    WHERE idopontfoglalas.vendeg_id='$userId'";

    $reservations = $conn->query($sql);

    $sql_1 =
        "SELECT idopontfoglalas.idopont_datuma, idopontfoglalas.idopont_kezdete, szolgaltatas_alkategoria.megnevezes, szolgaltatas_alkategoria.ar,
        vendegek.vezeteknev, vendegek.keresztnev, vendegek.email, vendegek.tel_szam
        FROM idopontfoglalas
        JOIN szolgaltatas_alkategoria
        ON szolgaltatas_alkategoria.id = idopontfoglalas.szAlkat_id
        WHERE idopontfoglalas.vendeg_id='$userId'
        JOIN vendegek
        ON vendegek.id = idopontfoglalas.vendeg_id
        WHERE idopontfoglalas.vendeg_id='$userId'";

    $reservationDatas = $conn->query($sql_1);

    echo ($reservationDatas);

    function collectReservedAppointment($conn)
    {
        $sqlResApp = "SELECT szAlkat_id FROM idopontfoglalas WHERE id=" . $_GET['id'];
        $resultResApp = $conn->query($sqlResApp);
        $rowResApp = $resultResApp->fetch_array(MYSQLI_ASSOC);

        return $rowResApp;
    }

    function getReservedAppointment($conn, $subserviceId)
    {
        $sqlSub = "SELECT * FROM szolgaltatas_alkategoria WHERE id=" . $subserviceId;
        $resultSub = $conn->query($sqlSub);
        $rowSub = $resultSub->fetch_array(MYSQLI_ASSOC);

        return $rowSub;
    }

    function getMainService($conn, $mainserviceId)
    {
        $sqlMain = "SELECT szolgaltatas_neve FROM szolgaltatas_fokategoria WHERE id=" . $mainserviceId;
        $resultMain = $conn->query($sqlMain);
        $rowMain = $resultMain->fetch_array(MYSQLI_ASSOC);

        return $rowMain;
    }

    function getMainServices($conn)
    {
        $sql = "SELECT szolgaltatas_neve FROM szolgaltatas_fokategoria";
        $result = $conn->query($sql);

        return $result;
    }

    function getSubServices($conn, $mainserviceId)
    {
        $sql = "SELECT megnevezes FROM szolgaltatas_alkategoria WHERE foKat_id=" . $mainserviceId;
        $resultSub = $conn->query($sql);

        return $resultSub;
    }
}
