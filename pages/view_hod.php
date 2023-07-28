<?php
// Include the database connection file
include "../db_conn.php";

// Initialize variables
$id = $hodName = $hodNumber = $yearOfWork = $faculty = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the HOD ID from the query string
    $id = $_GET['id'];

    // Perform database query to get HOD information
    $query = "SELECT * FROM hod WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hodName = $row['HODName'];
        $hodNumber = $row['HODNum'];
        $yearOfWork = $row['Year'];
        $faculty = $row['Faculty'];
    } else {
        // HOD not found
        $errorMessage = "HOD not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View HOD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: #e0dbdf;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }

        .hod-details {
            margin-top: 20px;
        }

        .hod-details th,
        .hod-details td {
            text-align: center;
        }

        .back-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View HOD Details</h2>
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <table class="table hod-details">
            <tr>
                <th>ID</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>HOD Name</th>
                <td><?php echo $hodName; ?></td>
            </tr>
            <tr>
                <th>HOD Number</th>
                <td><?php echo $hodNumber; ?></td>
            </tr>
            <tr>
                <th>Year of Work</th>
                <td><?php echo $yearOfWork; ?></td>
            </tr>
            <tr>
                <th>Faculty</th>
                <td><?php echo $faculty; ?></td>
            </tr>
        </table>
        <a href="manage_hod.php" class="btn btn-primary back-btn">Back</a>
    </div>
</body>
</html>
