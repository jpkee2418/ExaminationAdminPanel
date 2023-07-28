<!-- filterlecturer.php -->
<?php
// Include the database connection file (replace "../db_conn.php" with your actual file path)
include "../db_conn.php";

// Check if the database connection is successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the faculty value from the AJAX request
$faculty = $_GET['faculty'];

// Function to filter lecturers by faculty
function filterLecturersByFaculty($faculty, $conn) {
    $query = "SELECT * FROM lecturer";
    if ($faculty !== '') {
        $query .= " WHERE Faculty = '$faculty'";
    }
    $result = mysqli_query($conn, $query);

    // Fetch lecturer details and generate the HTML markup for rows
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $lecturerId = $row['id'];
        $lecturerName = $row['lectName'];
        $lecturerNumber = $row['lectNum'];
        $yearOfWork = $row['Year'];
        $faculty = $row['Faculty'];

        $output .= '
        <tr class="faculty-row">
            <td>' . $lecturerId . '</td>
            <td>' . $lecturerName . '</td>
            <td>' . $lecturerNumber . '</td>
            <td>' . $yearOfWork . '</td>
            <td>' . $faculty . '</td>
            <td>
                <a href="edit_lecturer.php?id=' . $lecturerId . '" class="btn btn-info btn-sm">Edit</a>
                <a href="view_lecturer.php?id=' . $lecturerId . '" class="btn btn-success btn-sm">View</a>
                <a href="deleteLecturer.php?id=' . $lecturerId . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this lecturer?\')">Delete</a>
            </td>
        </tr>';
    }

    echo $output;
}

// Call the function to get the filtered lecturer rows and return the HTML response
filterLecturersByFaculty($faculty, $conn);
?>
