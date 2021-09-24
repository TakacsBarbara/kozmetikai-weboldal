<?php require_once('Controller/RegistrationController.php'); ?>

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

   <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-3">
                    <label for="lastName" class="form-label">Vezetéknév *</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName?>">
                    <span> <?php echo $lastNameErr ?> </span>
                </div>
                <div class="mb-3">
                    <label for="firstName" class="form-label">Keresztknév *</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName?>">
                    <span> <?php echo $firstNameErr ?> </span>
                </div>
                <div class="mb-3">
                    <label for="dateOfBirth" class="form-label">Születés dátuma *</label>
                    <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="éééé-hh-nn" value="<?php echo $dateOfBirth?>">
                    <span> <?php echo $dateOfBirthErr ?> </span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail cím *</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>">
                    <span> <?php echo $emailErr ?> </span>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefonszám *</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone?>">
                    <span> <?php echo $phoneErr ?> </span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó *</label>
                    <input type="password" class="form-control" id="password"  name="password" value="<?php echo $password?>">
                    <span> <?php echo $passwordErr ?> </span>
                    <div>
                        <p>A jelszó megfelelő, ha:</p>
                        <ul>
                            <li>legalább 8 karakter hosszú</li>
                            <li>legalább 1 kisbetűt tartalmaz</li>
                            <li>legalább 1 nagybetűt tartalmaz</li>
                            <li>legalább 1 számot tartalmaz</li>
                            <li>legalább 1 különleges karaktert tartalmaz</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Jelszó újra *</label>
                    <input type="password" class="form-control" id="password2" name="password2" value="<?php echo $password2?>">
                    <span> <?php echo $password2Err ?> </span>
                </div>
                <div class="mb-3">
                    <label for="allergy" class="form-label">Allergia</label>
                    <textarea type="text" class="form-control" id="allergy" name="allergy" placeholder="pl. Penicillin "><?php echo $allergy?></textarea>
                </div>
                <div class="mb-3">
                    <label for="medicine" class="form-label">Állandó gyógyszerek</label>
                    <textarea type="text" class="form-control" id="medicine" name="medicine" placeholder="Nincs"><?php echo $medicine?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Regisztráció</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <!-- input adatok ellenőrzése, mi megy be az adatbázisba?-->
    
</body>
</html>