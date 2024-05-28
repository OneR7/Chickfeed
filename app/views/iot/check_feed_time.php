<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chickfeed";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Jakarta');
$date = date('H:i:s', time());

$sql = "SELECT * FROM jadwal WHERE waktu = '$date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "ON";
} else {
    echo "OFF";
}

$conn->close();
?>