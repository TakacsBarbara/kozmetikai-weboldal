<?php


    $sql = "SELECT * FROM szolgaltatas_fokategoria";
    //echo "LEKÉRDEZÉS". $sql;
    $result = $conn->query($sql);

    //print_r($result);

    $sql_2 = "SELECT * FROM szolgaltatas_alkategoria";
    $result_2 = $conn->query($sql_2);

    $row = $result;
    //$row_2 = $result_2;
    //$row_2_t = $result_2->mysqli_fetch_all(MYSQLI_ASSOC);
    $row_2_t = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
    // $row = $result -> fetch_array(MYSQLI_ASSOC);

    //echo "foreach <br>";
    //print_r($row_2_t);

    foreach($row_2_t as $row_number => $value ) {
        //print_r($value["megnevezes"]);
    }

    foreach($row_2_t as $row_number) {
        //echo print_r($row_number)."<br>";
        foreach($row_number as $key=> $value) {
           // print_r($key . " ". $value);
           // echo "<br>";
        }
    }


    // echo "while <br>";
    // while($row_2_t = $result_2->fetch_array(MYSQLI_ASSOC)) {
    //     print_r ($row_2_t);
    // }
    

    /*
    if ($result->num_rows > 0) {
        echo "Sikeres bejelentkezés";
    } else {
    
        echo "Sikertelen bejelentkezés!";
    }
    */

?>