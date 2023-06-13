<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";


if(isset($_POST["deleteLike"])){ 
    $Forum_ID=filter_input(INPUT_POST, 'id');


     //Delete Like
     $deleteLike="DELETE FROM forum_post_like WHERE User_Like='$userName' AND Forum_Post_Id='$Forum_ID'";

    $run = mysqli_query($conn,$deleteLike);   
    if ($run) {  
     echo"<script>window.location.href='Forum_Homepage.php';</script>"; 

    }else{  
        echo "Error: ".mysqli_error($conn);  
    }  
    
 } 
?>
