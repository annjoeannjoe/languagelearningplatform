<!DOCTYPE html>
<html>
<?php include 'nav.php'; ?>
<head>
  <title>Korean Language Learning</title>
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
        <img src="images/Korea.png" alt="Korea Flag" style="width: 50px; height: auto; vertical-align: middle;">
        <span style="vertical-align: middle;">Korea</span>
        </h3>
        </div>
    </div>

   <div class="container2">
      <br>
      <h4><center>Lesson 2: Greeting in Korean</center></h4>
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

        // Query the database for Hiragana words
        $sql = "SELECT greeting, greeting_pronunciation, greeting_meaning FROM korean_lesson WHERE korean_id>=28";
        $result = $conn->query($sql);

             // Check if records exist
             if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                  if (!empty($row['greeting']) || !empty($row['greeting_pronunciation']) || !empty($row['greeting_meaning'])) {
                    echo '<div class="message user">';
                    echo '<div class="text">'.$row['greeting'].'</div>';
                    echo '<div class="text" style="color:red;">'.$row['greeting_pronunciation'].'</div>';
                    echo '<div class="text" style="color:blue;">'.$row['greeting_meaning'].'</div>';
                    echo '</div>';
                    echo '<br>';
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

   <div class="row justify-content-end">
        <div class="col-12 text-right">
            <a href="admin_korean.php" class="btn btn-primary">Finish</a>
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
