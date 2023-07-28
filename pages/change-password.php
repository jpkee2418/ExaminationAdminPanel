<?php
// Start a session to access session data
session_start();

// Include the database connection file
require_once "../db_conn.php";

// Check if the user is a Student and logged in
if ($_SESSION['role'] !== 'Student' || !isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit;
}

// Rest of the PHP code...

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        /* Custom styles for the webpage */
        body {
            background-color: #e0dbdf; /* Background color */
        }
        /* Add other custom styles as needed */

        /* Style for the navigation bar */
        .navbar {
            background-color: #4b0150; /* Navbar background color */
        }
        .navbar-brand {
            color: white; /* Brand text color */
            text-align: center; /* Center the brand text */
            font-size: 24px; /* Adjust the font size as needed */
        }
        .navbar .nav-item {
            margin-right: 10px; /* Adjust the spacing between menu items */
        }
        .navbar .nav-item .nav-link {
            color: white; /* Menu item text color */
            text-align: center; /* Center the menu item text */
            font-size: 18px; /* Adjust the font size as needed */
        }
        .navbar .nav-item .nav-link:hover {
            color: #d0955e; /* Hover color for menu items */
        }

    </style>
</head>
<body>
    <!-- Navbar from the previous page -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" class="nav-item active" href="#">CHANGE PASSWORD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto"> <!-- mx-auto to center the navigation items -->
                    <li class="nav-item">
                        <a class="nav-link" href="viewStudent.php">Profile</a>
                    </li>
                >
                    <li class="nav-item">
                        <a class="nav-link" href="Student.php">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center"
        style="min-height: 100vh; background-color: #e0dbdf;">
        <form class="border shadow p-3 rounded form-bg"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
            method="post" 
            style="width: 450px;">
            <h1 class="text-center p-3">Change Password</h1>
            <?php
            if (isset($error_message)) {
                echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
            } elseif (isset($success_message)) {
                echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
            }
            ?>
            <div class="mb-3">
                <label for="currentPassword">Current Password:</label>
                <input type="password" name="currentPassword" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="newPassword">New Password:</label>
                <input type="password" name="newPassword" class="form-control" required>
            </div>
            <input type="submit" value="Update Password" class="btn btn-primary d-block mx-auto">
        </form>
    </div>

    <!-- Include Bootstrap JS files (optional but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-oVi7LEHsIS2gmXtUPFn6Qbz8pQ1RavzazXpjHXqgyE0X3/1ZqKzF2f1KxUJ7bsK2" crossorigin="anonymous"></script>
</body>
</html>
