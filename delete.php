<?php
include 'dbconnect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM student WHERE roll_no='$id'");
}
header("Location: view.php");
exit();
?>