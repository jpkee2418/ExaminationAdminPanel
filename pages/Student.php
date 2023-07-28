<?php 
   session_start();
   include "../db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
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
            <h2 class="navbar-brand">Student Page</h2>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    <?php if(isset($_SESSION['regNo'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registration Number: <?=$_SESSION['regNo']?></a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Student.php -->
<!-- ... Your previous HTML code ... -->

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <div class="card" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="card-title">
                Name: <?=$_SESSION['username']?>
                <br><br>
                Role: <?=$_SESSION['role']?>
                <?php if ($_SESSION['role'] === 'Student') { ?>
                    <br><br>
                    <a href="change-password.php" class="btn btn-primary">Change Password</a>
                <?php } ?>
            </h5>
        </div>
    </div> 
</div>

<!-- ... Rest of your HTML code ... -->

</body>
</html>

<?php 
    } else {
        header("Location: ../index.php");
    } 
?>
