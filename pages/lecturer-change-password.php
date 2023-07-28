<?php
// lecturer-change-password.php

// Start a session to access session data
session_start();

// Include the database connection file
require_once "../db_conn.php";

// Check if the user is a Lecturer and logged in
if ($_SESSION['role'] !== 'Lecturer' || !isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted password
    $newPassword = $_POST["newPassword"];

    // Sanitize the input to prevent SQL injection (Optional but recommended)
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    // Update the lecturer's password in the database
    $lecturerID = $_SESSION['id'];
    $sql = "UPDATE lecturer SET Password = '$newPassword' WHERE id = $lecturerID";
    if ($conn->query($sql) === TRUE) {
        // Password updated successfully
        header("Location: lecturer.php");
        exit;
    } else {
        // Error updating password
        $error_message = "Error updating password. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        /* Custom styles for the webpage */
        body {
            background-color: #e0dbdf; /* Background color */
        }
        .form-bg {
            background-color: #f4f6f8; /* Form background color */
        }
        .navbar {
            background-color: #4b0150; /* Navbar background color */
        }
        .navbar .nav-link {
            color: white; /* Text color in the navbar */
            text-align: center; /* Center align the link in the navbar */
        }
        .navbar .nav-link:hover {
            color: yellow; /* Hover color for the link */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand mx-auto" href="#">Change Password</a>
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
            }
            ?>
            <div class="mb-3">
                <label for="newPassword">New Password:</label>
                <input type="password" name="newPassword" class="form-control" required>
            </div>
            <input type="submit" value="Change Password" class="btn btn-primary d-block mx-auto">
        </form>
    </div>
</body>
</html>
