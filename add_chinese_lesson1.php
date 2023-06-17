<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $initial = $_POST['initial'];
  $pronunciation = $_POST['pronunciation'];


  $servername = "localhost";
  $username = "root";
  $password = "development1234#";
  $dbname = "language_learning";

  //create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //check the connection
  if($conn -> connect_error){
    die("Connection failed" .$conn->connect_error);
  }

  //execute sql statement
  $sql = "INSERT INTO chinese_lesson (initial, pronunciation) VALUES('$initial', '$pronunciation')";



  //execute the sql statement
  if($conn->query($sql) === TRUE){
    // redirect the admin back to the interface after word is added

    header("Location: admin_chinese_lesson1.php");
    exit();
  }else{
    echo "Error: " . $sql."<br>".$conn->error;
  }

  $conn-> close();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Initial</title>
  <!-- Include necessary CSS and JavaScript libraries -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <?php include 'nav.php'; ?>

  <div class="container mt-4">
    <h3>Add Initial</h3>
    <br>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      
      <div class="form-group">
        <label for="word"><b>Initial:</b></label>
        <input type="text" class="form-control" id="initial" name="initial" required>
      </div>
      <div class="form-group">
        <label for="pronunciation"><b>Pronunciation:</b></label>
        <input type="text" class="form-control" id="pronunciation" name="pronunciation" required>
      </div>
      <br>
      <!-- Add more input fields for additional word information if needed -->
      <a href="admin_chinese.php" class="btn btn-danger cancel-button">Cancel</a>
      <button type="submit" class="btn btn-primary">Add Initial</button>
    </form>
  </div>

  <!-- Include necessary JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
