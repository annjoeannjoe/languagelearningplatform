<!DOCTYPE html>

<html>
<head>
  <title>Admin New Language Interface</title>
  <!-- Include necessary CSS and JavaScript libraries -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Include your custom CSS styles -->
  <style>
    /* CSS styles here */
  </style>
</head>
<body>
  <?php include 'nav.php'; ?>

  <div class="container">
    <!--<h3>New Course: <?php echo $_GET['course_name']; ?></h3>-->
    <!-- Add your new course content here -->

    <?php 
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
        $sql = "SELECT course_name FROM course where course_id=1"; //need to manually change the id
        $result = $conn->query($sql);

        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div>
                    <br>
                    <h3><center><?php echo "Manage ". $row["course_name"] . " Language"; ?></center></h3>
                    <br>
                </div>
                <?php
            }
        } else {
            echo "No records found";
        }

        

        // Close the database connection
        $conn->close();
        ?>



<?php
    // Fetch lessons from the database
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

    // Execute the SQL statement
    $sql = "SELECT addLesson_id, lesson_title, language FROM addlesson";
    $result = $conn->query($sql);

    

    // Fetch the lessons from the database and merge with hardcoded data
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($row['language'] === 'Japanese') {
          $lessons[] = $row;
        }
      }
    }

    // Close the database connection
    $conn->close();

    function deleteLesson($addLessonId, &$lessons)
    {
      // Check if the lesson has an addLesson_id
      if (!isset($addLessonId)) {
        echo "Cannot delete hardcoded row.";
        return;
      }

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
        // Remove the lesson from the array
        foreach ($lessons as $key => $lesson) {
          if (isset($lesson['addLesson_id']) && $lesson['addLesson_id'] == $addLessonId) {
            unset($lessons[$key]);
            break;
          }
        }

        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Return a success message
        echo "Lesson deleted successfully.";
      } else {
        // Handle the case where the delete operation fails
        echo "Error deleting lesson: " . $conn->error;
      }
    }

  ?>

<div class="row">
      <div class="col-md-10 mx-auto">
        <!-- Section for managing lessons -->
        <div class="card">
          <div class="card-header">
            Lessons
          </div>
          <div class="card-body">
            <!-- Include forms or tables to manage lessons -->
            <div class="text-right mb-3">
            <a class="btn btn-success add-lesson-btn" href="add_new_lesson.php">
              <i class="fas fa-plus-circle"></i> Add Lesson
            </a>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Lesson Title</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $lesson['lesson_title'] . '</td>';
                    echo '<td>';

                    if (isset($lesson['details_file'])) {
                      echo '<a href="' . $lesson['details_file'] . '" class="btn details-button"><i class="fas fa-eye"></i> Details</a>';
                    } else {
                      echo '<a href="#" class="btn details-button" disabled><i class="fas fa-eye"></i> Details</a>';
                    }

                    if (isset($lesson['edit_file'])) {
                      echo '<a href="' . $lesson['edit_file'] . '" class="btn btn-primary action-buttons"><i class="fas fa-edit"></i> Edit</a>';
                    } else {
                      echo '<a href="#" class="btn btn-primary action-buttons" disabled><i class="fas fa-edit"></i> Edit</a>';
                    }

                    // Check if the row has a lesson ID
                    if (isset($lesson['addLesson_id'])) {
                      echo '<button class="btn btn-danger action-buttons delete-lesson-btn" data-toggle="modal" data-target="#deleteConfirmationModal" data-addlesson-id="' . $lesson['addLesson_id'] . '"><i class="fas fa-trash"></i> Delete</button>';
                    } else {
                      echo '<button class="btn btn-danger action-buttons" ><i class="fas fa-trash"></i> Delete</button>';
                    }

                    echo '</td>';
                    echo '</tr>';
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        

  </div>

  <!-- Include necessary JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
