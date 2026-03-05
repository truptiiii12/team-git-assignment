<?php
include 'dbconnect.php';

// Fetching and cleaning data
$fname   = trim($_POST['fname']);
$lname   = trim($_POST['lname']);
$roll    = trim($_POST['roll']);
$pass    = trim($_POST['pass']);
$contact = trim($_POST['contact']);

// Insert query
$sql = "INSERT INTO student (first_name, last_name, roll_no, password, contact) 
        VALUES ('$fname', '$lname', '$roll', '$pass', '$contact')";

if ($conn->query($sql) === TRUE) {
    header("Location: view.php"); // Redirects to table view on success
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>