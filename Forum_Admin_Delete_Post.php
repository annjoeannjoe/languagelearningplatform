<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";
$room_ID=$_SESSION['forum_room_id'];


if(isset($_POST["deletePost"])){ 
    $Forum_ID=filter_input(INPUT_POST, 'id');


    //Admin Delete Post
    $deletePost="DELETE FROM forum WHERE Forum_Name='$userName' AND Forum_Id='$Forum_ID' AND Forum_Room_Id='$room_ID'";

   $run = mysqli_query($conn,$deletePost);   
   if ($run) {  
    echo"<script>window.location.href='Forum_Admin_Manage_Room.php';</script>"; 

   }else{  
       echo "Error: ".mysqli_error($conn);  
   }  
    
 } 

?>

