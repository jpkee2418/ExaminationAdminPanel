<?php
// lecturer.php

// Start a session to access session data
session_start();

// Include the database connection file
require_once "../db_conn.php";

// Check if the user is a Lecturer and logged in
if ($_SESSION['role'] !== 'Lecturer' || !isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        body {
            background-color: #e0dbdf;
        }
        .navbar {
            background-color: #381030;
        }
        .navbar a:hover {
            color: #d0955e !important;
        }
        .navbar-brand {
            color: blue;
        }
        .ml-auto {
            margin-left: auto !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <h2 class="navbar-brand">Lecturer Page</h2>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <?php if (isset($_SESSION['lectNum']) && isset($_SESSION['username'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lecturer Number: <?=$_SESSION['lectNum']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Name: <?=$_SESSION['username']?></a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="lecturer-change-password.php">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <div class="card" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">
                    Name: <?=$_SESSION['username']?>
                    <br><br>
                    Role: <?=$_SESSION['role']?>
                </h5>
            </div>
        </div> 
    </div>
</body>
</html>
