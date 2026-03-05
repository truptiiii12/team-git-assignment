<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fsdl4"; // Your specified database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>