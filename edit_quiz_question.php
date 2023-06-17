<html>
<meta charset="UTF-8">
<?php
$conn = mysqli_connect('localhost', 'root', '', 'language_db');
$questionId = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM quiz WHERE id = ?");
$stmt->bind_param("i", $questionId);
$stmt->execute();

// Get the result
$result = $stmt->get_result();
$question = $result->fetch_assoc();
$stmt->close();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data

    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $language = $_POST['language'];
    $choice1 = $_POST['choice1'];
    $choice2 = $_POST['choice2'];
    $choice3 = $_POST['choice3'];
    $choice4 = $_POST['choice4'];
    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE quiz SET question = ?, language = ?, answer = ?, choice1 = ?, choice2 = ?, choice3 = ?, choice4 = ? WHERE id = ?");
    $stmt->bind_param("ssissssi", $question, $language, $answer, $choice1, $choice2, $choice3, $choice4, $questionId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo "Data updated successfully";
    } else {
        echo "Error updating data";
    }

    // Close the statement and database connection
    $stmt->close();
    header("Location: add_quiz_question.php");
    exit();
}
$conn->close();
?>


<head>
    <title>Edit Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>


<body class="container-fluid">
    <br>

    <h1>
        <center>Edit Quiz Question</center>
    </h1>
    <form method="POST" action="">
        <div class="form-floating">
            <input class="form-control" id="question" name="question" value='<?php echo $question['question']; ?>' required></textarea>
        <label for="floatingInput">Question</label>
    </div>
    <br>
    <div class="form-floating">
        <select class="form-select" name="language" aria-label="Default select example" required>
            <option value="Chinese" <?php if ($question['language'] == 'Chinese') {
                echo ("selected");
            } ?>>Chinese</option>
            <option value="Japanese" <?php if ($question['language'] == 'Japanese') {
                echo ("selected");
            } ?>>Japanese</option>
            <option value="Korean" <?php if ($question['language'] == 'Korean') {
                echo ("selected");
            } ?>>Korean</option>
        </select>
        <label for="floatingSelect">Language</label>
    </div>
    <br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Choice 1</span>
        </div>
        <input type="text" class="form-control" id="choice1" name="choice1" value="<?php echo $question['choice1']; ?>"
            required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Choice 2</span>
        </div>
        <input type="text" class="form-control" id="choice2" name="choice2" value="<?php echo $question['choice2']; ?>"
            required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Choice 3</span>
        </div>
        <input type="text" class="form-control" id="choice3" name="choice3" value="<?php echo $question['choice3']; ?>"
            required>
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Choice 4</span>
        </div>
        <input type="text" class="form-control" id="choice4" name="choice4" value="<?php echo $question['choice4']; ?>"
            required>
    </div>
    <div class="form-floating">
        <select class="form-select" name="answer" required>
            <option value="1" <?php if ($question['answer'] == 1) {
                echo ("selected");
            } ?>>Choice 1</option>
            <option value="2" <?php if ($question['answer'] == 2) {
                echo ("selected");
            } ?>>Choice 2</option>
            <option value="3" <?php if ($question['answer'] == 3) {
                echo ("selected");
            } ?>>Choice 3</option>
            <option value="4" <?php if ($question['answer'] == 4) {
                echo ("selected");
            } ?>>Choice 4</option>
        </select>
        <label for="floatingSelect">Answer</label>
    </div>
    <br>
    <div><center>
    <button class="btn btn-success" type="submit">Save</button>

    </center>
    </div>
    </form>

    </div>
</body>

</html>