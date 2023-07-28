<?php
// hod-login.php

// Start a session to store login status
session_start();

// Include the database connection file
require_once "../db_conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted credentials from the form
    $hodNum = $_POST["hodNum"];
    $password = $_POST["password"];

    // Sanitize the input to prevent SQL injection (Optional but recommended)
    $hodNum = mysqli_real_escape_string($conn, $hodNum);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to fetch HOD data based on HOD number and password
    $sql = "SELECT * FROM hod WHERE HODNum = '$hodNum' AND Password = '$password'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful and if a matching row was found
    if ($result->num_rows === 1) {
        // HOD login successful, store session data and redirect to hod.php
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['HODName'];
        $_SESSION['hodNum'] = $hodNum; // Store the HOD number in the session
        $_SESSION['role'] = 'HOD'; // Set the role to HOD
        header("Location: HOD.php");
        exit;
    } else {
        // Login failed, show an error message
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOD Login</title>
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
        <a class="navbar-brand mx-auto" href="#">HOD LOGIN</a>
    </nav>
    <div class="container d-flex justify-content-center align-items-center"
        style="min-height: 100vh; background-color: #e0dbdf;">
        <form class="border shadow p-3 rounded form-bg"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
            method="post" 
            style="width: 450px;">
            <h1 class="text-center p-3">HOD Login</h1>
            <?php
            if (isset($error_message)) {
                echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
            }
            ?>
            <div class="mb-3">
                <label for="hodNum">HOD Number:</label>
                <input type="text" name="hodNum" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <input type="submit" value="Login" class="btn btn-primary d-block mx-auto">
        </form>
    </div>
</body>
</html>

