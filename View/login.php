<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

    <?php 
        $email = $password = $emailErr = $passwordErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($POST["email"])) {
                $emailErr = "Nem adott meg e-meil címet!";
            } else {
                $email = test_input($POST["email"]);

                /* if ($email != adatbázis_email) {
                    $emailErr = "Az e-mail cím helytelen!";
                } */
            }
            if (empty($POST["password"])) {
                $passwordErr = "Nem adott meg jelszót!";
            } else {
                $password = test_input($POST["password"]);

                /* if ($password != adatbázis_jelszó) {
                    $passwordErr = "A megadott jelszó helytelen!";
                } */
            }
        }

        function test_input($data) {                    /* Itt is kell input ellenőrzés??? */
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    ?>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Belépés</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <!-- input adatok ellenőrzése, mi megy be az adatbázisba?-->
    
</body>
</html>