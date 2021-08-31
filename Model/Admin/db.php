<?php 


// $email = $password = $emailErr = $passwordErr = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kozmetika_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Set charset
mysqli_set_charset($conn,"utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>