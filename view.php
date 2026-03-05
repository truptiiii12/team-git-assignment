<?php include 'dbconnect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f4f4f4; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .search-container { margin-bottom: 20px; }
        .btn-edit { color: blue; text-decoration: none; }
        .btn-delete { color: red; text-decoration: none; }
    </style>
</head>
<body>
    <h2>Student Database</h2>
    
    <div class="search-container">
        <form method="GET">
            <input type="text" name="search" placeholder="Search by Roll No">
            <button type="submit">Search</button>
            <a href="view.php">Reset</a>
        </form>
    </div>

    <table>
        <tr>
            <th>Roll No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        <?php
        $query = "SELECT * FROM student";
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $s = mysqli_real_escape_with_string($conn, $_GET['search']);
            $query = "SELECT * FROM student WHERE roll_no = '$s'";
        }
        
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['roll_no']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['contact']}</td>
                        <td>
                            <a href='update.php?id={$row['roll_no']}' class='btn-edit'>Edit</a> | 
                            <a href='delete.php?id={$row['roll_no']}' class='btn-delete' onclick='return confirm(\"Delete this record?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>
    <br><a href="index.html">Back to Registration</a>
</body>
</html>