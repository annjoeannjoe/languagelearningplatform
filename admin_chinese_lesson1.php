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

    .container2{
        margin-top: 20px;
        padding: 30px;
        background-color: #fdfff2;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

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

    .container3{
        margin-top: 20px;
        padding: 30px;
        background-color: #fdfff2;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
        background-color: #99c2ff;
        font-weight: bold;
    }

    tr:nth-child(odd){
        background-color: #cce0ff;
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
    <h5><b>Pinyin</b></h5>
    <br>
    <h6>
    Designed in the People’s Republic of China during the mid-1950s, pinyin is a phonetic system of the Chinese language. It adopts the roman alphabet to represent phonetic sounds in Mandarin Chinese. There have been many different systems of transcription used for learning Chinese pronunciation. Whereas China’s capital was once called “Peking” in English, using pinyin it is now written “Beijing”.
    </h6>
   </div>
   <br>

   <div class="container3">
    <h5><b>Tone</b></h5>
    <h6>In Chinese the variation of a syllable’s pitch may distinguish meaning. There are four tones, indicated respectively by the following tone marks:</h6>
    <br>
    <table>
        <tr>
            <th>Tone</th>
            <th>Tone Mark</th>
            <th>Description</th>
            <th>Example</th>
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
        $sql = "SELECT tone, tone_mark, tone_description, tone_example FROM chinese_lesson";
        $result = $conn->query($sql);

        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                if (!empty($row['tone']) || !empty($row['tone_mark']) || !empty($row['tone_description']) || !empty($row['tone_example'])) {
                    echo '<tr>';
                    echo '<td>' . $row['tone'] . '</td>';
                    echo '<td>' . $row['tone_mark'] . '</td>';
                    echo '<td>' . $row['tone_description'] . '</td>';
                    echo '<td>' . $row['tone_example'] . '</td>';
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
   <br>
   <div class="container3">
    <h5><b>Initials</b></h5>
    <h6>There are 21 initials in Chinese and 12 of them have almost the same pronunciation as English.</h6>
    <br>
    <table>
        <tr>
            <th>Initials</th>
            <th>Pronunciation</th>
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
        $sql = "SELECT initial, pronunciation FROM chinese_lesson";
        $result = $conn->query($sql);


        // Check if records exist
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                if (!empty($row['initial']) || !empty($row['pronunciation'])) {
                    echo '<tr>';
                    echo '<td>' . $row['initial'] . '</td>';
                    echo '<td>' . $row['pronunciation'] . '</td>';
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
   <br>
   <div class="row justify-content-end">
        <div class="col-12 text-right">
            <a href="admin_chinese.php" class="btn btn-primary">Finish</a>
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
