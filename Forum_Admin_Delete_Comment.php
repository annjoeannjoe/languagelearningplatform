<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";



if(isset($_POST["deleteComment"])){ 
    $Comment_ID=filter_input(INPUT_POST, 'commentId');


    //Admin Delete Comment
    $deletePost="DELETE FROM forum_comment WHERE Comment_Name='$userName' AND Comment_Id='$Comment_ID'";

   $run = mysqli_query($conn,$deletePost);   
   if ($run) {  
    echo"<script>window.location.href='Forum_Admin_Manage_Room.php';</script>"; 

   }else{  
       echo "Error: ".mysqli_error($conn);  
   }  
    
 } 
?>
