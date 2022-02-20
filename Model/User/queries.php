<?php

$sql =
    "SELECT idopontfoglalas.id, idopontfoglalas.idopont_datuma, idopontfoglalas.idopont_kezdete, idopontfoglalas.jovahagyva, 
szolgaltatas_alkategoria.megnevezes, szolgaltatas_alkategoria.ar, szolgaltatas_alkategoria.idotartam
 FROM idopontfoglalas
 JOIN szolgaltatas_alkategoria
 ON szolgaltatas_alkategoria.id = idopontfoglalas.szAlkat_id
 WHERE idopontfoglalas.vendeg_id=13";

$reservations = $conn->query($sql);
