<?php
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
    <title>Manage HOD</title>
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

        .hod-list th,
        .hod-list td {
            text-align: center;
        }

        /* Center the "Manage HOD" heading */
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
        <h4 class="center-heading">Manage HOD</h4>
    </div>

    <div class="container">
    <br><br>
        <a href="add_hod.php" class="btn btn-primary mb-2">Add HOD</a>
        <table class="table table-bordered hod-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>HOD Name</th>
                    <th>HOD Number</th>
                    <th>Year of Work</th>
                    <th>Faculty</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch HOD details from the database and display them in rows -->
                <?php
                // Perform database query to get HOD information
                $query = "SELECT * FROM hod";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $hodId = $row['id'];
                    $hodName = $row['HODName'];
                    $hodNumber = $row['HODNum'];
                    $yearOfWork = $row['Year'];
                    $faculty = $row['Faculty'];
                ?>
                    <tr>
                        <td><?php echo $hodId; ?></td>
                        <td><?php echo $hodName; ?></td>
                        <td><?php echo $hodNumber; ?></td>
                        <td><?php echo $yearOfWork; ?></td>
                        <td><?php echo $faculty; ?></td>
                        <td>
                            <a href="edit_hod.php?id=<?php echo $hodId; ?>" class="btn btn-info btn-sm">Edit</a>
                            <a href="view_hod.php?id=<?php echo $hodId; ?>" class="btn btn-success btn-sm">View</a>
                            <a href="deleteHOD.php?id=<?php echo $hodId; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this HOD?')">Delete</a>
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
