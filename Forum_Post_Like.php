<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";


if(isset($_POST["like"])){ 
    $Forum_ID=filter_input(INPUT_POST, 'id');

    //Update Like Count
    $updateLike="INSERT INTO forum_post_like (User_Like,Forum_Post_Id)
    values ('$userName','$Forum_ID')";

    $run = mysqli_query($conn,$updateLike);   
    if ($run) {  
     echo"<script>window.location.href='Forum_Homepage.php';</script>"; 

    }else{  
        echo "Error: ".mysqli_error($conn);  
    }  
    
 } 
?>

