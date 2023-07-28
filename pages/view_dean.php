<?php
// Include the database connection file
include "../db_conn.php";

// Initialize variables
$id = $deanName = $deanNumber = $yearOfWork = $faculty = $email = $contactNo = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the Dean ID from the query string
    $id = $_GET['id'];

    // Perform database query to get Dean information
    $query = "SELECT * FROM dean WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $deanName = $row['DeanName'];
        $deanNumber = $row['DeanNum'];
        $yearOfWork = $row['Year'];
        $faculty = $row['Faculty'];
        $email = $row['Email'];
        $contactNo = $row['contactno'];
    } else {
        // Dean not found
        $errorMessage = "Dean not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Dean</title>
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

        .dean-details {
            margin-top: 20px;
        }

        .dean-details th,
        .dean-details td {
            text-align: center;
        }

        .back-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View Dean Details</h2>
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <table class="table dean-details">
            <tr>
                <th>ID</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Dean Name</th>
                <td><?php echo $deanName; ?></td>
            </tr>
            <tr>
                <th>Dean Number</th>
                <td><?php echo $deanNumber; ?></td>
            </tr>
            <tr>
                <th>Year of Work</th>
                <td><?php echo $yearOfWork; ?></td>
            </tr>
            <tr>
                <th>Faculty</th>
                <td><?php echo $faculty; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><?php echo $contactNo; ?></td>
            </tr>
        </table>
        <a href="manage_dean.php" class="btn btn-primary back-btn">Back</a>
    </div>
</body>
</html>
