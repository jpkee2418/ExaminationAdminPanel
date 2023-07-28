<?php
// Include the database connection file
include "../db_conn.php";

$successMessage = $errorMessage = "";

if (isset($_GET['id'])) {
    $deanId = $_GET['id'];

    // Perform database query to delete Dean information
    $query = "DELETE FROM dean WHERE id = '$deanId'";

    if (mysqli_query($conn, $query)) {
        // Deletion successful
        $successMessage = "Dean with ID: $deanId has been deleted successfully.";
    } else {
        // Deletion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}

// Redirect to manage_dean.php after deletion
header("Location: manage_dean.php");
exit();
?>
