
 <?php 
        $lastName = $firstName = $dateOfBirth = $email = $phone = $password = $password2 = $allergy = $medicine = "";
        $lastNameErr = $firstNameErr = $dateOfBirthErr = $emailErr = $phoneErr = $passwordErr = $password2Err = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["lastName"])) {
                $lastNameErr = "Vezetéknév kitöltése kötelező!";
            } else {
                /*RegEx : '/^[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű\s]$/' vagy "/^[\w\s]+.{2,}$/ui" vagy "/^([A-ZÁÉÍÓÖŐÚÜŰ]([a-záéíóöőúüű'-.]+\s?)){2,}$/" vagy "/^[\w.-]+\s?){2,}$/u 
                "/^[a-zA-ZÁÉÍÓÖŐÚÜŰáéíóöőúüű-.' ]*$/" vagy /^([A-ZÁÉÍÓÖŐÚÜŰ]([A-ZÁÉÍÓÖŐÚÜŰa-záéíóöőúüű'-.\s]+))$/
                ([A-ZÁÉÍÓÖŐÚÜŰ]([a-záéíóöőúüű'-.]+\s?)){2,}$/    vagy   /^[A-ZÁÉÍÓÖŐÚÜŰ]([a-záéíóöőúüű]+-?[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű]+)$/gm */

               $lastName = test_input($_POST["lastName"]);

               if (!preg_match("/^[A-ZÁÉÍÓÖŐÚÜŰ]([a-záéíóöőúüű]+\s?[\-\s\.]?\s?[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű]*)$/", $lastName)) {
                    $lastNameErr = "A vezetéknév formátuma nem megfelelő!";
                }
            }
            if (empty($_POST["firstName"])) {
                $firstNameErr = "Keresztnév kitöltése kötelező!";
            } else {
                $firstName = test_input($_POST["firstName"]);

                if (!preg_match("/^[A-ZÁÉÍÓÖŐÚÜŰ]([a-záéíóöőúüű]+\s?([A-ZÁÉÍÓÖŐÚÜŰa-záéíóöőúüű]*))$/", $firsttName)) {
                    $firstNameErr = "A keresztnév formátuma nem megfelelő";
                }
            }
            if (empty($_POST["dateOfBirth"])) {
                $dateOfBirthErr = "Születési dátum kitöltése kötelező!";
            } else {
                /* ((19[2-9][0-9]|20[0-2][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])) 1920-2029 vagy  ((19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])) 1900-2099 */

               $dateOfBirth = test_input($_POST["dateOfBirth"]);

                if (!preg_match("/^((19[2-9][0-9]|20[0-2][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/", $dateOfBirth)) {
                    $dateOfBirthErr = "A dátum formátuma nem megfelelő!";
                }
            }
            if (empty($_POST["email"])) {
                $emailErr = "E-mail cím kitöltése kötelező!";
            } else {
                $email = test_input($_POST["email"]);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Az e-mail cím formátuma nem mgefelelő!";
                }
            }
            if (empty($_POST["phone"])) {
                $phoneErr = "Telefonszám kitöltése kötelező!";
            } else {
                $phone = test_input($_POST["phone"]);

                /*  Feltétel a telelfon formátumra ???
                if ()*/
            }
            if (empty($_POST["password"])) {
                $passwordErr = "Jelszó megadása kötelező!";
            } else {
                $password = test_input($_POST["password"]);

                /* ((?=.*[A-Z])(?=.*[0-9])(?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|]\]).{8,})      (?=.*[*.!@$%^&(){}[]:;<>,.?/~_+-=|\])*/

                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[*.!@$%^&(+){}[]:;<>,.?\/~_-=|]).{8,}$/", $password)) {
                    $passwordErr = "A megadott jelszó nem felel meg a követelményeknek!";
                }
            }        
            if (empty($_POST["password2"])) {
                $password2Err = "Megerősítő jelszó megadása kötelező!";
            } else {
                $password2 = test_input($_POST["password2"]);

                if ($password != $password2) {
                    $password2Err = "A két jelszó nem egyezik!";
                }
            }
            if (empty($_POST["allergy"])) {
                $allergy = "";
            } else {
                $allergy = test_input($_POST["allergy"]);
            }
            if (empty($_POST["medicine"])) {
                $medicine = "";
            } else {
                $medicine = test_input($_POST["medicine"]);
            }

            /*echo "{$lastName}<br>";
            echo "{$firstName}<br>";
            echo "{$dateOfBirth}<br>";
            echo "{$email}<br>";
            echo "{$phone}<br>";
            echo "{$password}<br>";
            echo "{$password2}<br>";
            echo "{$allergy}<br>";
            echo "{$medicine}<br>";*/
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } 

    ?>