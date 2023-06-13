<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";


if(isset($_POST["deleteCommentLike"])){ 
    $Forum_ID=filter_input(INPUT_POST, 'id');
    $Comment_ID=filter_input(INPUT_POST, 'commentId');


     //Delete Like
     $deleteLike="DELETE FROM forum_comment_like WHERE User_Like_Comment='$userName' AND Forum_Post_Id='$Forum_ID' AND Comment_Id='$Comment_ID'";

    $run = mysqli_query($conn,$deleteLike);   
    if ($run) {  
     echo"<script>window.location.href='Forum_Homepage.php';</script>"; 

    }else{  
        echo "Error: ".mysqli_error($conn);  
    }  
    
 } 
?>
