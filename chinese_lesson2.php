<!DOCTYPE html>
<html>
<?php include 'nav.php'; ?>
<head>
  <title>Chinese Language Learning</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Custom CSS styles */
    .header {
      background-color: #C6E6C3;
      padding: 20px;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    .container {
      margin-top: 20px;
    }



    /*.container2{
        margin-top: 20px;
        padding: 30px;
        background-color: #f0f5f5;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }*/

    h5 {
      margin-bottom: 10px;
      font-size: 20px;
      color: #333;
    }
    
    h6 {
      font-size: 16px;
      color: #666;
      text-align: justify;
    
    }


    .message{
      margin-bottom: 10px;
    }

    .user{
      text-align: left;
    }

    .user .text{
      background-color: #ffffe6;
      padding: 10px;
      border-radius: 5px;
    }

    table{
        width: 100%;
        border-collapse: collapse;
    }
    
    th,td{
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ccc;
    }

    th{
        background-color: #ffff99;
        font-weight: bold;
    }

    tr:nth-child(odd){
        background-color:   #ffffcc;
    }

    .btn {
        margin-top: 20px;
        margin-bottom: 20px;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h3 style="background-color: #f5f5f5; padding: 10px;">
        <img src="images/China.png" alt="China Flag" style="width: 50px; height: auto; vertical-align: middle;">
        <span style="vertical-align: middle;">Chinese</span>
        </h3>
        </div>
    </div>

   <div class="container2">
      <br>
    <h5><b>Dialogue 1</b></h5>
    <h6><i>Used with friends or a less formal greeting (using Nǐ)</i></h6>
   </div>


   <div class="container">
    
        <?php
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
        $sql = "SELECT vocab, vocab_pronunciation, vocab_meaning FROM chinese_lesson WHERE chinese_id=1";
        $result = $conn->query($sql);

             // Check if records exist
             if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                  if (!empty($row['vocab']) || !empty($row['vocab_pronunciation']) || !empty($row['vocab_meaning'])) {
                    echo '<div class="message user">';
                    echo '<div class="text">'.$row['vocab'].'</div>';
                    echo '<div class="text">'.$row['vocab_pronunciation'].'</div>';
                    echo '<div class="text">'.$row['vocab_meaning'].'</div>';
                    echo '</div>';
                  }
                } 
              } else {
                echo "No records found";
            }
    
            // Close the database connection
            $conn->close();
            ?>
    </table>
   </div>
   <br>
   <div class="container2">
      <br>
    <h5><b>Dialogue 2</b></h5>
    <h6><i>The more correct greeting when respect or politeness is required (Using Nín)</i></h6>
   </div>


   <div class="container">
    
        <?php
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
        $sql = "SELECT vocab, vocab_pronunciation, vocab_meaning FROM chinese_lesson WHERE chinese_id IN (2,3)";
        $result = $conn->query($sql);

             // Check if records exist
             if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                  if (!empty($row['vocab']) || !empty($row['vocab_pronunciation']) || !empty($row['vocab_meaning'])) {
                    echo '<div class="message user">';
                    echo '<div class="text">'.$row['vocab'].'</div>';
                    echo '<div class="text">'.$row['vocab_pronunciation'].'</div>';
                    echo '<div class="text">'.$row['vocab_meaning'].'</div>';
                    echo '</div>';
                  }
                } 
              } else {
                echo "No records found";
            }
    
            // Close the database connection
            $conn->close();
            ?>
    </table>
   </div>
   <br>

   <div class="container2">
      <br>
    <h5><b>Vocabulary</b></h5>
   </div>


   <div class="container">
   <table>
        <tr>
            <th>Vocabulary</th>
            <th>Pronunciation</th>
            <th>Meaning (in English)</th>
        </tr>
        <?php
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
        $sql = "SELECT vocab, vocab_pronunciation, vocab_meaning FROM chinese_lesson WHERE chinese_id>=4";
        $result = $conn->query($sql);

        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                if (!empty($row['vocab']) || !empty($row['vocab_pronunciation']) || !empty($row['vocab_meaning'])) {
                    echo '<tr>';
                    echo '<td>' . $row['vocab'] . '</td>';
                    echo '<td>' . $row['vocab_pronunciation'] . '</td>';
                    echo '<td>' . $row['vocab_meaning'] . '</td>';
                    echo '</tr>';
                }
            }
        } else {
            echo "No records found";
        }
        
        // Close the database connection
        $conn->close();
        ?>
    </table>
   </div>
   <div class="row justify-content-end">
        <div class="col-12 text-right">
            <a href="chinese.php" class="btn btn-primary">Finish</a>
        </div>
    </div>



    
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>

  </script>
</body>
</html>
