<?php 


$email = $password = $emailErr = $passwordErr = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kozmetika_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


// if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
   /*
   if (empty($POST["email"])) {
       $emailErr = "Nem adott meg e-meil címet!";
    } else {
        $email = test_input($POST["email"]);
        
        if ($email != adatbázis_email) {
            $emailErr = "Az e-mail cím helytelen!";
        } 
    }
    */
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM admin WHERE felhasznalonev='$username' AND jelszo='$password'";
        //echo "LEKÉRDEZÉS". $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Sikeres bejelentkezés";
        } else {
            echo "Sikertelen bejelentkezés!";
        }
       
    }

    if (isset($_POST["savedMainService"])) {
        $savedMainService = $_POST["savedMainService"];
        echo $savedMainService;

        //$conn->query('SET foreign_key_checks = 0');         // CSAK EZZEL MŰKÖDIK

        $sql = "INSERT INTO szolgaltatas_fokategoria (szolgaltatas_neve) VALUES ('$savedMainService')";
       
      // $sql = "INSERT INTO szolgaltatas_fokategoria (szolgaltatas_neve) VALUES ('árvíztűrőtükörfúrógép')";
        //$sql = "INSERT INTO szolgaltatas_fokategoria VALUES ( 1, '$mainService')";

        //$conn->query('SET foreign_key_checks = 1');   
        
        $result = $conn->query($sql);

        if ($result === TRUE) {
            echo "Új szolgáltatás rögzítése sikeresen megtörtént!";
        } else {
            echo "Új szolgáltatás rögzítése sikertelen! <br> Error: " . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_POST["deletedMainService"])) {
        $deletedMainService = $_POST["deletedMainService"];

        $sql = "DELETE FROM szolgaltatas_fokategoria WHERE szolgaltatas_neve='$deletedMainService'";

        //$sql = "DELETE FROM szolgaltatas_fokategoria WHERE id=12";

        $result = $conn->query($sql);
        //echo $conn -> affected_rows;
        
        if ($result === TRUE) {
            echo "Szolgáltatás törlése sikerült!";
        } else {
            echo "Szolgáltatás törlése sikertelen volt! <br> Error: " . $sql . "<br>" . $conn->error;
        }
        
    }


?>