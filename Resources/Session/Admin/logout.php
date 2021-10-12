<?php

session_start();
unset($_SESSION["username"]);
unset($_SESSION["id"]);
header("Location: ./../../../View/Admin/adminLogin.php");

?>