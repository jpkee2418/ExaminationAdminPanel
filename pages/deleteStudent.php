<?php
// Include the database connection file
include "../db_conn.php";

$successMessage = $errorMessage = "";

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Perform database query to delete student information
    $query = "DELETE FROM students WHERE id = '$studentId'";

    if (mysqli_query($conn, $query)) {
        // Deletion successful
        $successMessage = "Student with ID: $studentId has been deleted successfully.";
    } else {
        // Deletion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}

// Redirect to manageStudent.php after deletion
header("Location: manageStudent.php");
exit();
?>
