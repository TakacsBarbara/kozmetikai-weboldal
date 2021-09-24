<?php

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


$sql = "INSERT INTO vendegek (vezeteknev, keresztnev, szuletesi_datum, email, tel_szam, allergia, gyogyszer)
VALUES ('John', 'Doe', '1985-01-13', 'john@example.com', '06204240927', 'Nincs', 'Nincs')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully". "<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// sql to delete a record
$sql = "DELETE FROM vendegek WHERE id=2";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully". "<br>";
} else {
  echo "Error deleting record: " . $conn->error. "<br>";
}

$sql = "UPDATE vendegek SET vezeteknev='Doe' WHERE keresztnev='Doe'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully". "<br>";
} else {
  echo "Error updating record: " . $conn->error. "<br>";
}

$sql = "UPDATE vendegek SET keresztnev='John' WHERE vezeteknev='Doe'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully". "<br>";
} else {
  echo "Error updating record: " . $conn->error. "<br>";
}

$sql = "SELECT * FROM vendegek";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Vezetéknév: " . $row["vezeteknev"]. " - Keresztnév: " . $row["keresztnev"]. "<br>";
  }
} else {
  echo "0 results";
}



$conn->close();

?>