<?php
// Include the database connection file
include "../db_conn.php";

$successMessage = $errorMessage = "";

if (isset($_GET['id'])) {
    $lecturerId = $_GET['id'];

    // Perform database query to delete lecturer information
    $query = "DELETE FROM lecturer WHERE id = '$lecturerId'";

    if (mysqli_query($conn, $query)) {
        // Deletion successful
        $successMessage = "Lecturer with ID: $lecturerId has been deleted successfully.";
    } else {
        // Deletion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}

// Redirect to manageLecturer.php after deletion
header("Location: manage_lecturer.php");
exit();
?>
