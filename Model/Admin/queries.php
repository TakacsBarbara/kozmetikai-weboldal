<?php


    $sql = "SELECT * FROM szolgaltatas_fokategoria";
    //echo "LEKÉRDEZÉS". $sql;
    $result = $conn->query($sql);

    $row = $result;
    // $row = $result -> fetch_array(MYSQLI_ASSOC);

    

    /*
    if ($result->num_rows > 0) {
        echo "Sikeres bejelentkezés";
    } else {
    
        echo "Sikertelen bejelentkezés!";
    }
    */

?>