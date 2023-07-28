<?php
// Include the database connection file
include "../db_conn.php";

// Initialize variables
$id = $studentName = $regNo = $yearOfStudy = $faculty = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the student ID from the query string
    $id = $_GET['id'];

    // Perform database query to get student information
    $query = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $studentName = $row['StudentName'];
        $regNo = $row['RegNo'];
        $yearOfStudy = $row['Year'];
        $faculty = $row['Faculty'];
    } else {
        // Student not found
        $errorMessage = "Student not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: #e0dbdf;
            padding: 20px;
        }

        .navbar {
            background-color: #381030;
            color: white;
            padding: 10px 0;
            display: flex;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
        }

        .navbar a:hover {
            color: #d0955e;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
        }

        .student-details {
            margin-top: 20px;
        }

        .student-details th,
        .student-details td {
            text-align: center;
        }

        .back-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="manageStudent.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
        <h2>Student Details</h2>
    </div>

    <div class="container">
        
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <table class="table student-details">
            <tr>
                <th>ID</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Student Name</th>
                <td><?php echo $studentName; ?></td>
            </tr>
            <tr>
                <th>Registration Number</th>
                <td><?php echo $regNo; ?></td>
            </tr>
            <tr>
                <th>Year of Study</th>
                <td><?php echo $yearOfStudy; ?></td>
            </tr>
            <tr>
                <th>Faculty</th>
                <td><?php echo $faculty; ?></td>
            </tr>
        </table>
       
    </div>
</body>
</html>

