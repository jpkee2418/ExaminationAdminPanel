<?php
// Include the database connection file
include "../db_conn.php"; 

// Initialize variables
$id = $deanName = $deanNumber = $yearOfWork = $faculty = $email = $contactNo = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Get the Dean ID from the query string
    $id = $_GET['id'];

    // Perform database query to get Dean information
    $query = "SELECT * FROM dean WHERE id = '$id'";
    
    // Check if the connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $deanName = $row['DeanName'];
        $deanNumber = $row['DeanNum'];
        $yearOfWork = $row['Year'];
        $faculty = $row['Faculty'];
        $email = $row['Email'];
        $contactNo = $row['contactno'];
    } else {
        // Dean not found
        $errorMessage = "Dean not found.";
    }
}

// Handle form submission for updating Dean information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $deanName = $_POST['deanName'];
    $deanNumber = $_POST['deanNumber'];
    $yearOfWork = $_POST['yearOfWork'];
    $faculty = $_POST['faculty'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];

    // Perform database query to update Dean information
    $query = "UPDATE dean SET DeanName = '$deanName', DeanNum = '$deanNumber', Year = '$yearOfWork', Faculty = '$faculty', Email = '$email', contactno = '$contactNo' WHERE id = '$id'";
    
    // Check if the connection is successful
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $query)) {
        // Update successful
        header("Location: manage_dean.php");
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
    <title>Edit Dean</title>
    <!-- Add necessary CSS and JavaScript if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: #381030;
            color: white;
            padding: 10px;
        }

        .navbar-brand {
            color: white;
            text-decoration: none;
        }
        
        .navbar h4 {
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }
        
        /* Custom styles for the form container */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #f4f6f8;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="container d-flex align-items-center">
            <a href="javascript:history.back()" class="navbar-brand">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <h4>Edit Dean</h4>
        </div>
    </div>

    <div class="container mt-5">
        <?php if (!empty($errorMessage)) { ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="deanName" class="form-label">Dean Name:</label>
                <input type="text" class="form-control" id="deanName" name="deanName" value="<?php echo $deanName; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deanNumber" class="form-label">Dean Number:</label>
                <input type="text" class="form-control" id="deanNumber" name="deanNumber" value="<?php echo $deanNumber; ?>" required>
            </div>
            <div class="mb-3">
                <label for="yearOfWork" class="form-label">Year of Work:</label>
                <input type="text" class="form-control" id="yearOfWork" name="yearOfWork" value="<?php echo $yearOfWork; ?>" required>
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
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contactNo" class="form-label">Contact No:</label>
                <input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $contactNo; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
