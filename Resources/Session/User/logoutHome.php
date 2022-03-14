<?php

session_start();
unset($_SESSION["userId"]);
header("Location: ./../../../View/User/homePage.php");
