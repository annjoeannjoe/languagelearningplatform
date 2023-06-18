<?php
include 'nav.php';
$conn = mysqli_connect('localhost', 'root', '', 'language_db');
$user = "John";
// $language = "Japanese";
$language = $_GET['language'];
if (isset($_GET['mark'])) {
    $mark = $_GET['mark'];
    $get_score_sql = "SELECT * FROM quiz_score WHERE user = '$user'";
    $result = $conn->query($get_score_sql);

    // Check if the score exists in the database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $score = $row["score"];
    }

    $percentage = $mark / 5 * 100;
    if ($percentage > 80) {
        $result_text = "Awesome!";
    } else if ($percentage > 40) {
        $result_text = "Keep It On!";
    } else {
        $result_text = "Do More Practice!";
    }

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['quiz'])){
        header("Location: quiz.php?language=$language");
    }
    else if (isset($_POST['lesson'])){
        if ($_POST['language']=="Japanese"){
            header("Location: japanese.php");
        }
        else if ($_POST['language']=="Korean"){
            header("Location: korean.php");
        }
        else if ($_POST['language']=="Chinese"){
            header("Location: chinese.php");
        }
    }
}
?>
<html>

<head>
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    .quiz-complete {
        color: #ffc800;
        text-align: center;
        padding: 100px;
    }

    .score .card-header {
        background-color: #ffc800;
        color: white;
        font-weight: bold;
    }

    .score .card-title {
        text-align: center;
        color: #ffc800
    }

    .accuracy .card-header {
        background-color: #58cc02;
        color: white;
        font-weight: bold;
    }

    .accuracy .card-title {
        text-align: center;
        color: #58cc02
    }

    .total .card-header {
        background-color: #fc9404;
        color: white;
        font-weight: bold;
    }

    .total .card-title {
        text-align: center;
        color: #fc9404;
    }

    .btn-quiz {
        background-color: #1cb0f6;
        color: white;
        border-radius: 30px;
    }

    .btn-quiz:hover {
        color: white;
        transform: scale(1.02);
    }

    .btn-lesson {
        background-color: white;
        color: #1cb0f6;
        border-color: #1cb0f6;
        border-radius: 30px;
    }

    .btn-lesson:hover {
        color: #1cb0f6;
        transform: scale(1.02);
    }
</style>

<body>
    <h1 class="quiz-complete">Quiz Completed!</h1>
    <div class="d-flex justify-content-center">
        <div class="score">
            <div class="card" style="max-width: 18rem;">
                <div class="card-header">Score Gained</div>
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-star"></i>
                        &nbsp;
                        <?php echo $mark ?>
                    </h5>
                </div>
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="accuracy">
            <div class="card" style="max-width: 18rem;">
                <div class="card-header">
                    <?php echo $result_text ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-percentage"></i>
                        &nbsp;
                        <?php echo $percentage ?>
                    </h5>
                </div>
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;
        <div class="total">
            <div class="card" style="max-width: 18rem;">
                <div class="card-header">Total Score</div>
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-trophy"></i>
                        &nbsp;
                        <?php echo $score ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <form method="POST">
            <input type="hidden" name="language" value="<?php echo $language ?>">
            <button type="submit" name="lesson" class="btn btn-lesson">Continue with Lesson!</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" name="quiz" class="btn btn-quiz">One More Quiz!</button>
        </form>
    </div>

</body>

</html>