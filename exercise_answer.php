<!DOCTYPE html>
<?php include 'nav.php'; ?>
<html>
<head>
    <title>Exercise Answers</title>
    <style>
        .question-container {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #faffcf;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px; /* Adjust the width as needed */
            margin-left: auto;
            margin-right: auto;
        }

        .question-number {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .your-answer {
            color: blue;
        }

        .correct-answer {
            color: green;
        }

        .btn-primary{
            margin-right: 450px;
        }
    </style>
</head>
<body>
<br>
    <h3><center>Japanese - Exercise Answers</center></h3>
    <br>

    <?php
    // Start the session
    session_start();

    // Retrieve the questions, question order, and answers from the session
    $questions = $_SESSION['questions'];
    $questionOrder = $_SESSION['question_order'];
    $answers = $_SESSION['answers'];

    // Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "development1234#";
    $dbname = "language_learning";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Iterate over each question in the question order and display the question, options, and its respective answer
    foreach ($questionOrder as $index => $questionId) {
        $question = $questions[$questionId];
        $questionText = $question["question"];
        $choices = $question["choices"];

        // Check if the answer for this question exists in the $answers array
        $selectedChoice = isset($answers["question_$questionId"]) ? $answers["question_$questionId"] : '';

        echo "<div class='question-container'>";
        echo "<p class='question-number'>Question " . ($index + 1) . "</p>";
        echo "<p>$questionText</p>";

        // Display all the options for the question
        foreach ($choices as $choice) {
            echo "<label><input type='radio' disabled ";
            if ($selectedChoice === $choice) {
                echo "checked ";
            }
            echo "value='$choice'>$choice</label><br>";
        }

        // Retrieve the correct answer from the database
        $sql = "SELECT final_answer FROM exercise WHERE id = $questionId";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row["final_answer"];
            echo "<br>";
            echo "<span class='your-answer'>Your answer:</span> $selectedChoice <br>";
            echo "<span class='correct-answer'>Correct answer:</span> $answer <br>";
        } else {
            echo "No answer found for the question.";
        }

        echo "</div>";
    }

    // Close the database connection
    $conn->close();
    ?>

    
<div class="row justify-content-center">
        <div class="col-12 text-right">
            <a href="japanese.php" class="btn btn-primary">Finish</a>
        </div>
    </div>
</body>
</html>
