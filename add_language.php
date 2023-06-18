<!DOCTYPE html>
<?php
include 'nav.php';
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
  
  
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "development1234#";
    $dbname = "language_learning";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database for Hiragana words
    $sql = "INSERT INTO course (course_name, course_description) VALUES ('$course_name','$course_description')";


     // execute the sql statement
    if ($conn->query($sql) === TRUE) {
    // redirect the admin back to the interface after the language is added
      header("Location: admin_home.php");
      exit();
    } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

    // Close the database connection
    $conn->close();
}
?>
<head>
    <style>
        .btn {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .container2 {
            margin-top: 20px;
            padding: 50px;
            background-color: #fdfff2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group label,
        .form-group .form-control {
            margin-left: 10px;
        }

        /* Override the width of the text boxes */
        .form-group .form-control {
            width: 900px;
        }

        .cancel-button {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <h3>Add New Language</h3>
        <div class="container2">
            <div class="row">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="word"><b>Language:</b></label>
                        <input type="text" class="form-control" id="course_name" name="course_name" required>
                    </div>
                    <div class="form-group">
                        <label for="pronunciation"><b>Language Description:</b></label>
                        <input type="text" class="form-control" id="course_description" name="course_description" required>
                    </div>
                    <br>
                    <!-- Add more input fields for additional word information if needed -->
                    <a href="admin_home.php" class="btn btn-danger cancel-button">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Language</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
