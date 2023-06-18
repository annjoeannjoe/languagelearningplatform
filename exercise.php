<!DOCTYPE html>
<?php include 'nav.php'; ?>
<html>
<head>
    <title>Exercise</title>
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

        .submit-button {
            margin-top: 20px;
            margin-right: 450px;
            margin-bottom: 20px;
            float: right;
        }

        .submit-button input[type="submit"] {
            padding: 10px 20px;
            background-color: #1a65f0;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        .submit-button input[type="submit"]:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>
    <br>
    <h3><center>Japanese - Exercise</center></h3>
    <br>

    <?php
    ob_start(); // Start output buffering

    // Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "development1234#";
    $dbname = "language_learning";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch random Japanese questions from the database and retrieve the question order
    $sql = "SELECT id, question, choice1, choice2, choice3, choice4 FROM exercise WHERE language = 'japanese' ORDER BY RAND()";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();

        $questions = [];
        $questionOrder = []; // Array to store the question order

        while ($row = $result->fetch_assoc()) {
            $questionId = $row["id"];
            $question = $row["question"];
            $choice1 = $row["choice1"];
            $choice2 = $row["choice2"];
            $choice3 = $row["choice3"];
            $choice4 = $row["choice4"];

            $questions[$questionId] = [
                "id" => $questionId,
                "question" => $question,
                "choices" => [$choice1, $choice2, $choice3, $choice4]
            ];

            $questionOrder[] = $questionId; // Add the question ID to the question order array
        }

        $_SESSION['questions'] = $questions;
        $questionOrder = array_keys($questions);
        shuffle($questionOrder);
        $_SESSION['question_order'] = $questionOrder;

        ob_start(); // Start another output buffering for the form content

        echo "<form method='POST'>";
        foreach ($questionOrder as $index => $questionId) {
            $question = $questions[$questionId];
            $questionText = $question["question"];
            $choices = $question["choices"];

            echo "<div class='question-container'>";
            echo "<p class='question-number'>Question " . ($index + 1) . "</p>";
            echo "<p>$questionText</p>";

            // Display all the options for the question
            foreach ($choices as $choice) {
                echo "<label><input type='radio' name='question_$questionId' value='$choice'>$choice</label><br>";
            }

            echo "</div>";
        }

        echo "<div class='submit-button'>";
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</div>";
        echo "</form>";

        $formContent = ob_get_clean(); // Capture the form content and clear the buffer

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            $answers = [];

            foreach ($questionOrder as $questionId) {
                $answerKey = "question_$questionId";
                if (isset($_POST[$answerKey])) {
                    $answers[$answerKey] = $_POST[$answerKey];
                }
            }

            $_SESSION['answers'] = $answers;

            // Redirect to the exercise answer page
            header("Location: exercise_answer.php");
            exit();
        }

        // Output the form content
        echo $formContent;

    } else {
        echo "No questions found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
