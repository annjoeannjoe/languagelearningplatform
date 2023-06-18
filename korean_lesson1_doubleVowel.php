<!DOCTYPE html>
<?php
include 'nav.php';
?>
<head>
    <style>
        .card {
            width: 200px;
            margin: 0 70px; /*Adjust margin for horizontal spacing */
            margin-bottom: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            background-color: #D9FFF2; /* Lighter card background color */
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 14px;
            color: #888;
        }

        .container_korea{
            margin-top: 20px;
            padding: 30px;
            background-color: #fdfff2;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .back-btn{
            margin-bottom: 20px;
            float: left;
            background-color: #888888;
            border-color: #888888;
        }

        .back-btn:hover{
            background-color: #555555;
            
        }

        .btn {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <h3 style="background-color: #f5f5f5; padding: 10px;">
                <img src="images/korea.png" alt="Korea Flag" style="width: 50px; height: auto; vertical-align: middle;">
                <span style="vertical-align: middle;">Korean</span>
            </h3>
        </div>
    </div>
    <br>
    <h4><center>Lesson 1: Hangul</center></h4>
    <br>

    <h6><center><i>Double Vowels</i></center></h6>

    <div class="container_korea">
    <div class="row justify-content-center">
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

        // Query the database 
        $sql = "SELECT * FROM korean_lesson WHERE category = 'double_vowel'";
        $result = $conn->query($sql);

        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["word"]; ?></h5>
                            <p class="card-text"><?php echo $row["pronunciation"]; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No records found";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-12 text-right">
            <a href="korean_lesson1.php" class="btn btn-primary back-btn">Back</a>
            <a href="korean_lesson1_plainConsonant.php" class="btn btn-primary">Next</a>
        </div>
    </div>

</body>
