<?php
include 'nav.php';
$conn = mysqli_connect('localhost', 'root', '', 'language_db');
// Function to get questions by language from the database
function getQuestionsByLanguage($conn, $language)
{
    $stmt = $conn->prepare("SELECT * FROM quiz WHERE language = ?");
    $stmt->bind_param("s", $language);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $questions;
}

// Function to display questions in a table
function displayQuestions($questions)
{
    echo '<table class="table table-responsive">';
    echo '<thead class="thead-light"><tr><th>Question</th><th></th></tr></thead>';

    foreach ($questions as $question) {
        echo '<tr>';
        echo '<td>' . $question['question'] . '</td>';
        echo '<td>
        <button class="delete-button btn btn-danger" data-toggle="modal" data-target="#delete_question_modal" data-question-id="' . $question['id'] . '"><i class="fas fa-trash-alt"></i></button>
        <a href="edit_quiz_question.php?id='.$question['id'].'"><button class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button></a>
        
            </td>';
        echo '</tr>';
    }

    echo '</table>';
}

// Get questions for Japanese language
$japaneseQuestions = getQuestionsByLanguage($conn, 'Japanese');

// Get questions for Chinese language
$chineseQuestions = getQuestionsByLanguage($conn, 'Chinese');

// Get questions for Korean language
$koreanQuestions = getQuestionsByLanguage($conn, 'Korean');



// Add question into database
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if ($_POST["action"] == "add_question") {
        // Retrieve the form data
        $question = $_POST["question"];
        $language = $_POST["language"];
        $choice1 = $_POST["choice1"];
        $choice2 = $_POST["choice2"];
        $choice3 = $_POST["choice3"];
        $choice4 = $_POST["choice4"];
        $answer = $_POST["answer"];

        // Prepare and execute the SQL statement to insert the question
        $sql = "INSERT INTO quiz (question, language, choice1, choice2, choice3, choice4, answer)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $question, $language, $choice1, $choice2, $choice3, $choice4, $answer);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Question added successfully!";
        } else {
            echo "Failed to add the question.";
        }
        // Close the statement
        $stmt->close();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();        

    } else if ($_POST["action"] == "delete_question") {
        $questionId = $_POST["deleteQuestionId"];
        $sql = "DELETE FROM quiz WHERE id = $questionId";

        if ($conn->query($sql) === TRUE) {
            echo "Question deleted successfully";
        } else {
            echo "Error deleting question: " . $conn->error;
        }
        $conn->close();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<html>

<head>
    <title>Quiz Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script>
        $(document).ready(function () {
            $(".delete-button").click(function () {
                var questionId = $(this).data("question-id");
                $("#delete_question_modal").data("question-id", questionId);
                console.log(questionId)
                $("#deleteQuestionId").val(questionId); // Set the value of the hidden input field
                $("#deleteModal").modal("show");
            });
            $(".edit-button").click(function () {
                var questionId = $(this).data("question-id['id']");
                $("#delete_question_modal").data("question-id", questionId);
                console.log(questionId)
                $("#deleteQuestionId").val(questionId); // Set the value of the hidden input field
                $("#deleteModal").modal("show");
            });
        });
    </script>
</head>

<body>
    <div class="container-fluid">
        <br>
        <!-- Add quiz question button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_question_modal">
            <i class="fas fa-plus-circle"></i>
            Add
        </button>

        <!-- Modal to add quiz question -->
        <form method="POST">
            <div class="modal" id="add_question_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Quiz Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-floating">
                                <textarea class="form-control" id="question" name="question" required></textarea>
                                <label for="floatingTextarea">Question</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <select class="form-select" name="language" aria-label="Default select example"
                                    required>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Korean">Korean</option>
                                </select>
                                <label for="floatingSelect">Language</label>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Choice 1</span>
                                </div>
                                <input type="text" class="form-control" id="choice1" name="choice1" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Choice 2</span>
                                </div>
                                <input type="text" class="form-control" id="choice2" name="choice2" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Choice 3</span>
                                </div>
                                <input type="text" class="form-control" id="choice3" name="choice3" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Choice 4</span>
                                </div>
                                <input type="text" class="form-control" id="choice4" name="choice4" required>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" name="answer" required>
                                    <option value="1">Choice 1</option>
                                    <option value="2">Choice 2</option>
                                    <option value="3">Choice 3</option>
                                    <option value="4">Choice 4</option>
                                </select>
                                <label for="floatingSelect">Answer</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input name="action" value="add_question" hidden>
                            <button type="submit" class="btn btn-success">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Delete modal -->
        <form id="delete_question" method="POST">
            <input id="delete_id" name="delete_id" hidden>
            <div class="modal" id="delete_question_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this question?</p>
                        </div>
                        <div class="modal-footer">

                            <input name="action" value="delete_question" hidden>
                            <input id="deleteQuestionId" name="deleteQuestionId" hidden>
                            <button class="btn btn-danger" type="submit">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php
        // Display Japanese questions
        echo '<h2>Japanese Questions</h2>';
        displayQuestions($japaneseQuestions);

        // Display Chinese questions
        echo '<h2>Chinese Questions</h2>';
        displayQuestions($chineseQuestions);

        // Display Korean questions
        echo '<h2>Korean Questions</h2>';
        displayQuestions($koreanQuestions);
        ?>
    </div>
</body>

</html>