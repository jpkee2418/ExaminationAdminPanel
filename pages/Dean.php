<?php 
session_start();
include "../db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dean Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        /* Custom styles for the webpage */
        body {
            background-color: #e0dbdf; /* Background color */
        }
        .navbar {
            background-color: #381030; /* Navbar background color */
            color: white; /* Text color in the navbar */
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .navbar a {
            color: white; /* Text color for links in the navbar */
            text-decoration: none;
            margin-right: 15px;
        }
        .navbar a:hover {
            color: #d0955e; /* Hover color for links in the navbar */
        }
        .container-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .container-box .box {
            padding: 20px;
            background-color: #f4f6f8; /* Container background color */
            border: 1px solid #ddd; /* Container border */
            border-radius: 5px;
            flex-basis: 45%;
            text-align: center;
            transition: transform 0.2s;
        }
        .container-box .box:hover {
            transform: scale(1.05); /* Increase size on hover */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow on hover */
        }
        .container-box .box h3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <!-- Dean's name and Dean number -->
            <span>Welcome, <?=$_SESSION['username']?> (Dean Number: <?=$_SESSION['deanNum']?>)</span>
        </div>
        <div>
            <a href="../logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="container-box">
            <!-- Container 1 - Manage Students -->
            <div class="box">
                <h3>Manage Students</h3>
                <a href="manageStudent.php" class="btn btn-primary">Go to Students</a>
            </div>
            <!-- Container 2 - Manage Lecturers -->
            <div class="box">
                <h3>Manage Lecturers</h3>
                <a href="manage_lecturer.php" class="btn btn-primary">Go to Lecturers</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php } else {
    header("Location: ../index.php");
} ?>
