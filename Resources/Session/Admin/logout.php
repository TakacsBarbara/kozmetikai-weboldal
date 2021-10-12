<?php

session_start();
unset($_POST["username"]);
unset($_POST["password"]);
header("Location: ./../../../View/Admin/adminLogin.php");

?>