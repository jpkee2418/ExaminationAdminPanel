<?php

// Include the database connection file
include "../db_conn.php";

// Initialize variables
$deanNum = $year = $deanName = $faculty = $email = $contactNo = "";
$successMessage = $errorMessage = "";

if (isset($_POST['submit'])) {
    // Get form data
    $deanNum = $_POST['deanNum'];
    $year = $_POST['year'];
    $deanName = $_POST['deanName'];
    $faculty = $_POST['faculty'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];

    // Perform database query to insert Dean information
    $query = "INSERT INTO dean (DeanNum, Year, DeanName, Faculty, Email, contactno) VALUES ('$deanNum', '$year', '$deanName', '$faculty', '$email', '$contactNo')";

    if (mysqli_query($conn, $query)) {
        // Insertion successful
        $successMessage = "Dean information has been saved successfully.";
    } else {
        // Insertion failed
        $errorMessage = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Dean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom styles for the webpage */
        body {
            padding: 20px;
            background-color: #e0dbdf;
        }

        .navbar {
            background-color: #381030;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .back-btn {
            color: white;
            font-size: 20px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto; /* Center the container horizontally */
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .submit-btn {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="javascript:history.back()" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
        <span class="navbar-brand">Add Dean</span>
        <div></div>
    </div>

    <div class="container">
        <div class="form-container">
           
            <?php if (!empty($successMessage)) { ?>
                <div class="alert alert-success text-center"><?php echo $successMessage; ?></div>
            <?php } ?>
            <?php if (!empty($errorMessage)) { ?>
                <div class="alert alert-danger text-center"><?php echo $errorMessage; ?></div>
            <?php } ?>
            <form method="post">
                <div class="form-group">
                    <label for="deanNum">Dean Number:</label>
                    <input type="text" class="form-control" id="deanNum" name="deanNum" required>
                </div>
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" id="year" name="year" required placeholder="2023">
                </div>
                <div class="form-group">
                    <label for="deanName">Dean Name:</label>
                    <input type="text" class="form-control" id="deanName" name="deanName" required>
                </div>
                <div class="form-group">
                    <label for="faculty">Faculty:</label>
                    <select class="form-control" id="faculty" name="faculty" required>
                        <option value="">Select Faculty</option>
                        <option value="Technological Studies">Technological Studies</option>
                        <option value="Applied Science">Applied Science</option>
                        <option value="Business Studies">Business Studies</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="contactNo">Contact No:</label>
                    <input type="text" class="form-control" id="contactNo" name="contactNo" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary submit-btn">Submit</button>
            </form>
        </div>
    </div>

<!-- this backend part done by 
2018ICTS05 -Jayapradha.P   https://www.linkedin.com/in/jayapradha-p-8a1a2a214
2018ICTS79 -Kishorkanth.P  https://www.linkedin.com/in/kishor-prakash-749581233
 -->

</body>
</html>
