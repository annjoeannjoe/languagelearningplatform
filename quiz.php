<?php
session_start();
include 'nav.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "language_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['question'])) {

    $language = 'Chinese';
    $query = "SELECT * FROM quiz WHERE language = '$language' ORDER BY RAND() LIMIT 5";
    $result = $conn->query($query);
    $questions = $result->fetch_all(MYSQLI_ASSOC);
    $_SESSION['questions'] = $questions;
    // echo "Questions";
    // print_r($_SESSION['questions']);
    $row = $questions[0];
    $currentQuestion = 0;
    // echo "Current: " . $currentQuestion;
} else {
    echo "Check Get: Have Get data";

    $currentQuestion = $_GET['question'];
    $row = $_SESSION['questions'][$currentQuestion];
}
// Display the question and choices
$question = $row['question'];
$choice1 = $row['choice1'];
$choice2 = $row['choice2'];
$choice3 = $row['choice3'];
$choice4 = $row['choice4'];
$answer = $row['answer'];
$questionId = $row['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST['choice'] == $_POST['answer']) {
        $_SESSION['mark'] += 1;
    }
    if ($_POST['currentQuestion'] < 4) {

        $currentQuestion = $_POST['currentQuestion'] + 1;
        echo "Check curr" . $currentQuestion;
        header("Location: question.php?question=$currentQuestion");
    } else {
        $mark = $_SESSION['mark'];
        header("Location: marks.php?mark=$mark");
        session_destroy();
    }
}

?>

<html>
<style>
    .btn-outline-success{
        width: 150px;
    }
</style>
<head>
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    
    <div class="container-fluid">
        <br>
        <h1> Quiz </h1>
        <br>
        <form method="POST">
            <div class="card">
                <div class="card-header">
                    <h5 class="d-flex justify-content-center card-title">
                        Question
                        <?php echo $currentQuestion + 1 ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <p class="card-text">
                            <?php echo $question; ?>
                        </p>
                    </div>
                    
                </div>
            </div>
            <br>
        
            <br>
            <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-outline-success" name="choice" value="1">
                            <?php echo $choice1; ?>
                        </button> &nbsp;
                        <button type="submit" class="btn btn-outline-success" name="choice" value="2">
                            <?php echo $choice2; ?>
                        </button> &nbsp;
                        <button type="submit" class="btn btn-outline-success" name="choice" value="3">
                            <?php echo $choice3; ?>
                        </button> &nbsp;
                        <button type="submit" class="btn btn-outline-success" name="choice" value="4">
                            <?php echo $choice4; ?>
                        </button><br>
                    </div>
            <input type="hidden" name="questionId" value="<?php echo $questionId; ?>">
            <input type="hidden" name="currentQuestion" value="<?php echo $currentQuestion ?>">
            <input type="hidden" name="answer" value="<?php echo $answer; ?>">
        </form>
    </div>
</body>

</html>