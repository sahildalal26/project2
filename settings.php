<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "g03";

$conn = new mysqli($host, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

