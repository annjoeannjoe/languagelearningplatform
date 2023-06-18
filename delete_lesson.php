<?php
// Check if the addLessonId parameter is present in the URL
if (isset($_GET['addLessonId'])) {
  // Get the addLessonId from the URL
  $addLessonId = $_GET['addLessonId'];

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "development1234#";
  $dbname = "language_learning";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM addlesson WHERE addLesson_id = ?");

  // Bind the parameter
  $stmt->bind_param("i", $addLessonId);

  // Execute the statement
  if ($stmt->execute()) {
    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    switch($language){
        case 'Japanese':
            header("Location: admin_japanese.php");
            break;

        case 'Chinese':
            header("Location: admin_chinese.php");
            break;
        
        case 'Korean':
            header("Location: admin_korean.php");
            break;
        
        default:
        header("Location: admin_japanese.php"); //need change to admin_home.php
        break;

    }
    // Redirect back to the admin interface
    
    exit();
  } else {
    // Handle the case where the delete operation fails
    echo "Error deleting lesson: " . $conn->error;
  }
} else {
  // Handle the case where the addLessonId parameter is missing
  echo "Invalid request.";
}
?>