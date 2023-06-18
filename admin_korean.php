<!DOCTYPE html>
<html>
<head>
  <title>Korean Language Admin Interface</title>
  <!-- Include necessary CSS and JavaScript libraries -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Include your custom CSS styles -->
  <style>
    /* CSS styles here */
    .add-lesson-btn {
      float: right;
    }

    .details-button {
      margin-right: 10px;
      background-color: #00a2c2;
      color: white;
    }

    .details-button:hover {
      background-color: #0387a1;
      color: white;
    }

    .action-buttons {
      margin-right: 10px;
    }
  </style>
</head>
<body>
  <?php include 'nav.php'; ?>

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

    $lessons = array(
      array('id' => 1, 'lesson_title' => 'Lesson 1: Hangul', 'details_file' => 'admin_korean_lesson1.php', 'edit_file' => 'add_korean_lesson1.php'),
      array('id' => 2, 'lesson_title' => 'Lesson 2: Greetings in Korean', 'details_file' => 'admin_korean_lesson2.php', 'edit_file' => 'add_korean_lesson2.php')
    );

    // Fetch the lessons from the database and merge with hardcoded data
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        if ($row['language'] === 'Korean') {
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

  <div class="container-fluid mt-4">
    <!-- Add your admin dashboard content here -->
    <h3><center>Manage Korean Language</center></h3>
    <br>
    <!-- Include different sections for managing content -->
    <div class="row">
      <div class="col-md-10 mx-auto">
        <!-- Section for managing lessons -->
        <div class="card">
          <div class="card-header">
            Lessons
          </div>
          <div class="card-body">
            <!-- Include forms or tables to manage lessons -->
            <a class="btn btn-success add-lesson-btn" href="add_new_lesson.php">
              <i class="fas fa-plus-circle"></i> Add Lesson
            </a>
            <br><br>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Lesson Title</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($lessons as $lesson) {
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
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this lesson?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Include necessary JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <!-- Include your custom JavaScript code -->
  <script>
    // Add event listener to the delete lesson button
    $(document).on('click', '.delete-lesson-btn', function() {
      // Get the addLesson_id of the lesson to be deleted
      var addLessonId = $(this).data('addlesson-id');

      // Update the confirm delete button's data-addlesson-id attribute
      $('#confirmDeleteBtn').attr('data-addlesson-id', addLessonId);
    });

    // Add event listener to the confirm delete button in the modal
    $(document).on('click', '#confirmDeleteBtn', function() {
      // Get the addLesson_id from the button's data-addlesson-id attribute
      var addLessonId = $(this).data('addlesson-id');

      // Redirect to the delete_lesson.php file passing the addLesson_id as a parameter
      window.location.href = 'delete_lesson.php?addLessonId=' + addLessonId;
    });
  </script>
</body>
</html>
