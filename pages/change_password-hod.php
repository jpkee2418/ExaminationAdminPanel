<?php
// change_password-hod.php

// Start a session to check the user login status
session_start();

// Include the database connection file
include "../db_conn.php";

// Check if the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['id']) || !isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit();
}

// Initialize variables
$errorMessage = $successMessage = "";

// Handle form submission for changing password
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['changePassword'])) {
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate the form fields
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $errorMessage = "Please fill in all the fields.";
    } else {
        // Sanitize the input to prevent SQL injection (Optional but recommended)
        $currentPassword = mysqli_real_escape_string($conn, $currentPassword);
        $newPassword = mysqli_real_escape_string($conn, $newPassword);
        $confirmPassword = mysqli_real_escape_string($conn, $confirmPassword);

        // Check if the current password matches the stored password in the database
        $hodId = $_SESSION['id'];
        $query = "SELECT Password FROM hod WHERE id = '$hodId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];

            if ($storedPassword === $currentPassword) {
                // Current password matches, update the password in the database
                if ($newPassword === $confirmPassword) {
                    $updateQuery = "UPDATE hod SET Password = '$newPassword' WHERE id = '$hodId'";
                    if (mysqli_query($conn, $updateQuery)) {
                        $successMessage = "Password changed successfully!";
                    } else {
                        $errorMessage = "Error updating password: " . mysqli_error($conn);
                    }
                } else {
                    $errorMessage = "New password and Confirm password do not match.";
                }
            } else {
                $errorMessage = "Incorrect current password. Please try again.";
            }
        } else {
            $errorMessage = "Error fetching data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password - HOD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Change Password</h2>
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <?php if (!empty($successMessage)) { ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
        <?php } ?>
        <form method="post">
            <div class="mb-3">
                <label for="currentPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" name="changePassword" class="btn btn-primary">Change Password</button>
        </form>
    </div>
</body>
</html>
