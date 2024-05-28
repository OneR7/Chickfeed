<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chickfeed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT status FROM kontrol WHERE id=1");
$row = $result->fetch_assoc();
echo $row['status'];


$conn->close();
?>
