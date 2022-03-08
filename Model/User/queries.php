<?php

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
}
