<?php
include 'dbconnect.php';
$id = $_GET['id'];
$res = $conn->query("SELECT * FROM student WHERE roll_no='$id'");
$row = $res->fetch_assoc();

if (isset($_POST['btn_update'])) {
    $new_contact = $_POST['contact'];
    $conn->query("UPDATE student SET contact='$new_contact' WHERE roll_no='$id'");
    header("Location: view.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Update Student</title></head>
<body>
    <h3>Update Contact for <?php echo $row['first_name']; ?> (Roll: <?php echo $id; ?>)</h3>
    <form method="POST">
        <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required>
        <button type="submit" name="btn_update">Save Changes</button>
    </form>
    <a href="view.php">Cancel</a>
</body>
</html>