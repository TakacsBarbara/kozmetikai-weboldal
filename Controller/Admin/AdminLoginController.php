
<?php 
        $email = $password = $emailErr = $passwordErr = "";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kozmetika_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
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
            print_r($_POST);
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $sql = "SELECT * FROM admin WHERE felhasznalonev='$username' AND jelszo='$password'";
                echo "LEKÉRDEZÉS". $sql;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "Sikeres bejelentkezés";
                }
               
            }
            
       // }

        function test_input($data) {                    /* Itt is kell input ellenőrzés??? */
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

      

    ?>