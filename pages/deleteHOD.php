<?php
// Include the database connection file
include "../db_conn.php";

$successMessage = $errorMessage = "";

if (isset($_GET['id'])) {
    $hodId = $_GET['id'];

    // Perform database query to delete HOD information
    $query = "DELETE FROM hod WHERE id = '$hodId'";

    if (mysqli_query($conn, $query)) {
        // Deletion successful
        $successMessage = "HOD with ID: $hodId has been deleted successfully.";
    } else {
        // Deletion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}

// Redirect to manageHOD.php after deletion
header("Location: manage_hod.php");
exit();
?>
