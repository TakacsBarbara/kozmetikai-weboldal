<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "CREATE DATABASE testphpDB";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully!";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

$conn->select_db("testphpDB");

// $sql = "CREATE TABLE MyGuests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
// if ($conn->query($sql) === TRUE) {
//     echo "Table MyGuests created successfully!";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

$sql = "CREATE TABLE GuestBook (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rating TINYINT(4) NOT NULL,
    comment TEXT NOT NULL,
    comm_date DATETIME NOT NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table GuestBook created successfully!";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>