<?php

/*
   this backend part done by 
2018ICTS05 -Jayapradha.P   https://www.linkedin.com/in/jayapradha-p-8a1a2a214
2018ICTS79 -Kishorkanth.P  https://www.linkedin.com/in/kishor-prakash-749581233

*/

// Add error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include "../db_conn.php";

// Check if the database connection is successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Dean</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
            background-color: #e0dbdf;
        }

        .navbar {
            background-color: #381030;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }

        .navbar a:hover {
            color: #d0955e;
        }

        .dean-list th,
        .dean-list td {
            text-align: center;
        }

        /* Center the "Manage Dean" heading */
        .center-heading {
            text-align: center;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="javascript:history.back()"><i class="fas fa-arrow-left"></i> Back</a>
          
        </div>
        <h4 class="center-heading">Manage Dean</h4>
    </div>

    <div class="container">
    <br><br>
        <a href="add_dean.php" class="btn btn-primary mb-2">Add Dean</a>
        <table class="table table-bordered dean-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dean Name</th>
                    <th>Dean Number</th>
                    <th>Year of Work</th>
                    <th>Faculty</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch Dean details from the database and display them in rows -->
                <?php
                // Perform database query to get Dean information
                $query = "SELECT * FROM dean";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $deanId = $row['id'];
                    $deanName = $row['DeanName'];
                    $deanNumber = $row['DeanNum'];
                    $yearOfWork = $row['Year'];
                    $faculty = $row['Faculty'];
                    $email = $row['Email'];
                    $contactNo = $row['contactno'];
                ?>
                    <tr>
                        <td><?php echo $deanId; ?></td>
                        <td><?php echo $deanName; ?></td>
                        <td><?php echo $deanNumber; ?></td>
                        <td><?php echo $yearOfWork; ?></td>
                        <td><?php echo $faculty; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $contactNo; ?></td>
                        <td>
                            <a href="edit_dean.php?id=<?php echo $deanId; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="view_dean.php?id=<?php echo $deanId; ?>" class="btn btn-success btn-sm">View</a>
                            <a href="deleteDean.php?id=<?php echo $deanId; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Dean?')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
