<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $language = $_POST['language'];
  $lesson_title = $_POST['lesson_title'];
  $lesson_materials = $_POST['lesson_materials'];

  $servername = "localhost";
  $username = "root";
  $password = "development1234#";
  $dbname = "language_learning";

  //create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Check the connection
  if($conn -> connect_error){
    die("Connection failed" .$conn->connect_error);
  }

  //Prepare the SQL Statement
  $sql = "INSERT INTO addLesson (language, lesson_title, lesson_materials) VALUES('$language', '$lesson_title', '$lesson_materials')";


  //execute the sql statement
  if($conn -> query($sql) === TRUE){
    // redirect the admin back to the interface after word is added

    switch($language){
        case 'Chinese':
            header("Location: ;lesson_materials.php");
            break;
        case 'Japanese':
            header("Location: admin_japanese.php");
            break;
        case 'Korean':
            header("Location: lesson_materials.php");
            break;
        default:
        header("Location: home.php");
        break;
    }
    exit();
  }else{
    echo "Error: " . $sql."<br>".$conn->error;
  }

  //Close database connection
  $conn-> close();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add New Lesson</title>
  <!-- Include necessary CSS and JavaScript libraries -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <?php include 'nav.php'; ?>

  <div class="container mt-4">
    <h3>Add New Lesson</h3>
    <br>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="language"><b>Language:</b></label>
        <select class="form-control" id="language" name="language" required>
          <option value="" disabled selected>Select Language</option>
          <option value="Chinese">Chinese</option>
          <option value="Japanese">Japanese</option>
          <option value="Korean">Korean</option>

        </select>
      </div>

      <div class="form-group">
        <label for="word"><b>Lesson Title</b></label>
        <input type="text" class="form-control" id="lesson_title" name="lesson_title" required>
      </div>

      <div class="form-group">
        <label for="pronunciation"><b>Lesson Materials</b></label>
        <textarea class="form-control" id="lesson_materials" name="lesson_materials" rows="6" required></textarea>
      </div>

      <br>
      
      <a href="admin_japanese.php" class="btn btn-danger cancel-button">Cancel</a>
      <button type="submit" class="btn btn-primary">Add Lesson</button>
    </form>
  </div>

  <!-- Include necessary JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
