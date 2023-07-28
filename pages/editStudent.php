<?php
// Include the database connection file
include "../db_conn.php"; 

// Initialize variables
$id = $studentName = $regNo = $yearOfStudy = $faculty = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the student ID from the query string
    $id = $_GET['id'];

    // Perform database query to get student information
    $query = "SELECT * FROM students WHERE id = '$id'";
    
    // Check if the connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $studentName = $row['StudentName'];
        $regNo = $row['RegNo'];
        $yearOfStudy = $row['Year'];
        $faculty = $row['Faculty'];
    } else {
        // Student not found
        $errorMessage = "Student not found.";
    }
}

// Handle form submission for updating student information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $studentName = $_POST['studentName'];
    $regNo = $_POST['regNo'];
    $yearOfStudy = $_POST['yearOfStudy'];
    $faculty = $_POST['faculty'];

    // Perform database query to update student information
    $query = "UPDATE students SET StudentName = '$studentName', RegNo = '$regNo', Year = '$yearOfStudy', Faculty = '$faculty' WHERE id = '$id'";
    
    // Check if the connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $query)) {
        // Update successful
        header("Location: manageStudent.php");
        exit();
    } else {
        // Update failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <!-- Add necessary CSS and JavaScript if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0dbdf;
        }

        .navbar {
            background-color: #381030;
            color: white;
            padding: 10px 0;
            text-align: center;
            display: flex;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
            flex-grow: 1;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
        }

        .navbar a:hover {
            color: #d0955e;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Custom styles for the form container */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        /* Custom styles for buttons */
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-container .btn {
            flex-grow: 1;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="manageStudent.php" class="btn btn-secondary ml-2"><i class="fas fa-arrow-left"></i> Back</a>
        <h2>Edit Student Details</h2>
    </div>

    <div class="container">
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="studentName" class="form-label">Student Name:</label>
                <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo $studentName; ?>" required>
            </div>
            <div class="mb-3">
                <label for="regNo" class="form-label">Registration Number:</label>
                <input type="text" class="form-control" id="regNo" name="regNo" value="<?php echo $regNo; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yearOfStudy" class="form-label">Year of Study:</label>
                <input type="text" class="form-control" id="yearOfStudy" name="yearOfStudy" value="<?php echo $yearOfStudy; ?>" required>
            </div>
            <div class="mb-3">
                <label for="faculty" class="form-label">Faculty:</label>
                <select class="form-control" id="faculty" name="faculty" required>
                    <option value="">Select Faculty</option>
                    <option value="Technological Studies" <?php if ($faculty === "Technological Studies") echo "selected"; ?>>Technological Studies</option>
                    <option value="Applied Science" <?php if ($faculty === "Applied Science") echo "selected"; ?>>Applied Science</option>
                    <option value="Business Studies" <?php if ($faculty === "Business Studies") echo "selected"; ?>>Business Studies</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="manageStudent.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>


