<!DOCTYPE html>
<?php
include 'nav.php';
?>
<head>
    <style>
        .dialog-container{
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }   

        .dialog{
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .dialog .message{
            margin-bottom: 5px;
        }

        .dialog .message strong{
            font-weight: bold;
            color: #2c3e50; /* Change the color of the greeting */

        }

        .dialog .pronunciation .pronunciation{
            color: #c0392b; /* Change the color of the pronunciation */
        
        }

        .dialog .meaning .meaning{
            color: #27ae60; /* Change the color of the meaning */
         
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
                <img src="images/japan.png" alt="Japan Flag" style="width: 50px; height: auto; vertical-align: middle;">
                <span style="vertical-align: middle;">Japanese</span>
            </h3>
        </div>
    </div>
    <br>
    <h4><center>Lesson 2: Japanese Greetings</center></h4>
    <br>

    <h6><center><i>It is always good to learn some basic Japanese greetings at the start of learning this new language.</i></center></h6>
    <br>

    <div class="dialog-container">

    <h5><center>Meeting Japanese For The First Time</center></h5>
    <br><br>
    <h6>When meeting a Japanese friend for the first time, the greetings that we will normally say are:</h6>
    <?php 
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "development1234#";
        $dbname = "language_learning";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $dbname = "language_learning";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch greetings from the database
        $sql = "SELECT greeting, greeting_pronunciation, greeting_meaning FROM japanese_lesson";
        $result = mysqli_query($conn, $sql);

        $sql2 = "SELECT reply, reply_pronunciation, reply_meaning FROM japanese_lesson";
        $result2 = mysqli_query($conn, $sql2);
    ?>

    <div class="dialog">
        <?php

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="message">';
                echo '<strong>' . $row['greeting'] . '</strong>' ;
                echo '</div>';
                echo '<div class="pronunciation">';
                echo '<span class="pronunciation">' . $row['greeting_pronunciation'] . '</span>';
                echo '</div>';
                echo '<div class="meaning">';
                echo '<span class="meaning">' . $row['greeting_meaning'] . '</span>';
                echo '</div>'; 
                
            }
        } else {
            echo '<div class="message">No greetings found.</div>';
        }

        ?>
    </div>
    <br>
    <br>
    <h6>And most likely, your Japanese friend will reply you with:</h6>
    <div class="dialog">
        <?php

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                echo '<div class="message">';
                echo '<strong>' . $row['reply'] . '</strong>' ;
                echo '</div>';
                echo '<div class="pronunciation">';
                echo '<span class="pronunciation">' . $row['reply_pronunciation'] . '</span>';
                echo '</div>';
                echo '<div class="meaning">';
                echo '<span class="meaning">' . $row['reply_meaning'] . '</span>';
                echo '</div>'; 
                
            }
        } else {
            echo '<div class="message">No reply message found.</div>';
        }

        ?>
    </div>
    
</div>

<?php
//Close the databse connection
mysqli_close($conn);
?>
<div class="row justify-content-end">
        <div class="col-12 text-right">
            <a href="admin_japanese.php" class="btn btn-primary">Close</a>
        </div>
    </div>
</body>
