<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $greeting = $_POST['greeting'];
  $greeting_pronunciation = $_POST['greeting_pronunciation'];
  $greeting_meaning = $_POST['greeting_meaning'];
  $reply = $_POST['reply'];
  $reply_pronunciation = $_POST['reply_pronunciation'];
  $reply_meaning = $_POST['reply_meaning'];

  $servername = "localhost";
  $username = "root";
  $password = "development1234#";
  $dbname = "language_learning";

  //create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  //check the connection
  $sql = "INSERT INTO japanese_lesson (greeting, greeting_pronunciation, greeting_meaning, reply, reply_pronunciation, reply_meaning) VALUES('$greeting', '$greeting_pronunciation', '$greeting_meaning', '$reply', '$reply_pronunciation', '$reply_meaning')";


  //execute the sql statement
  if($conn->query($sql) === TRUE){
    // redirect the admin back to the interface after word is added

    header("Location: admin_japanese_lesson2.php");
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
  <title>Add Greetings</title>
  <!-- Include necessary CSS and JavaScript libraries -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
  <?php include 'nav.php'; ?>

  <div class="container mt-4">
    <h3>Add Greetings</h3>
    <br>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="category"><b>Greetings</b></label>
        <input type="text" class="form-control" id="greeting" name="greeting" required>
        <br>
        <label for="category"><b>Greetings Pronunciation</b></label>
        <input type="text" class="form-control" id="greeting_pronunciation" name="greeting_pronunciation" required>
        <br>
        <label for="category"><b>Greetings Meaning</b></label>
        <input type="text" class="form-control" id="greeting_meaning" name="greeting_meaning" required>
        <br>
      </div>
      <div class="form-group">
        <label for="category"><b>Reply</b></label>
        <input type="text" class="form-control" id="reply" name="reply" required>
        <br>
        <label for="category"><b>Reply Pronunciation</b></label>
        <input type="text" class="form-control" id="reply_pronunciation" name="reply_pronunciation" required>
        <br>
        <label for="category"><b>Reply Meaning</b></label>
        <input type="text" class="form-control" id="reply_meaning" name="reply_meaning" required>
        <br>
      </div>
     
      <br>
      <!-- Add more input fields for additional word information if needed -->
      <a href="admin_japanese.php" class="btn btn-danger cancel-button">Cancel</a>
      <button type="submit" class="btn btn-primary">Add Greetings</button>
    </form>
  </div>

  <!-- Include necessary JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
