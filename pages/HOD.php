<?php
session_start();
include "../db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
    // Perform database query to get the total number of lecturers
    $query = "SELECT COUNT(*) AS total_lecturers FROM lecturer"; // Assuming the table name is 'lecturer'
    $result = mysqli_query($conn, $query);

    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Get the total number of lecturers
    $totalLecturers = $row['total_lecturers'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: #e0dbdf;
        }
        .navbar {
            background-color: #4b0150;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            color: white;
        }
        .navbar .logo {
            width: 742px; /* Set the desired width */
            height: 197px; /* Set the desired height */
            margin-right: 10px;
        }
        .navbar .nav-link {
            color: white;
            margin-left: 20px;
        }
        .navbar .nav-link:hover {
            color: #d0955e;
        }
        .navbar .dashboard-links {
            display: flex;
            align-items: center;
        }
        .navbar .dashboard-links a {
            color: white;
            margin-right: 20px;
        }
        .navbar .dashboard-links a:hover {
            color: #d0955e;
        }
        .container {
            margin-top: 20px;
        }
        .total-lecturers-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            text-align: center;
        }
        .total-lecturers {
            font-size: 24px;
            font-weight: bold;
            color: #381030;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 bg-dark">
        <nav class="navbar">
            <a class="navbar-brand" href="#">HOD Page</a>
            <div class="dashboard-links">
                <a class="nav-link" href="add_lecturer.php">Add Lecturer</a>
                <a class="nav-link" href="manage_lecturer.php">Manage Lecturer</a>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        Role: <?php echo $_SESSION['role'];?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container mt-4">
    <!-- Total Lecturers Card -->
    <div class="total-lecturers-card">
        <h4 class="text-center">Welcome, <?php echo $_SESSION['name']; ?></h4>
        <h5 class="text-center card-subtitle mb-2 text-muted">Role: <?php echo $_SESSION['role']; ?></h5>
        <div class="mt-4 total-lecturers">
            Total Lecturers: <?php echo $totalLecturers; ?>
        </div>
        <div class="mt-4">
            <a href="change_password-hod.php" class="btn btn-primary">Change Password</a>
        </div>
    </div>
</div>

</body>
</html>

<?php 
    } else {
        header("Location: ../index.php");
    } 
?>
