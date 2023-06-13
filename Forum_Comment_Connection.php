<?php   
$conn = mysqli_connect('localhost', 'Student', '1234','osp group project');

session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";


if(isset($_POST["post"])){ 
    $Forum_Comment = filter_input(INPUT_POST, 'inputComment');
    $Forum_ID=filter_input(INPUT_POST, 'id');

    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todayDateTime= date("M-d-Y H:i:s"); 

      //If question box is not blank, update database
  if(preg_replace('/\s+/', '', $Forum_Comment )!="") {

    //Insert Query
    $query = "INSERT INTO forum_comment (Comment_Name,Comment_Content,Comment_Date_Time,Forum_Post_Id)
    values ('$userName','$Forum_Comment','$todayDateTime','$Forum_ID')";
    $run = mysqli_query($conn,$query);   
    if ($run) {  
     echo"<script>window.location.href='Forum_Homepage.php';</script>"; 

    }else{  
        echo "Error: ".mysqli_error($conn);  
    }  
    
 } else if(preg_replace('/\s+/', '', $Forum_Comment )==""){
    echo("<script> alert('Posted Failed. Cannot leave the comment blank'); window.location.href='Forum_Homepage.php'; </script>"); 
  
  }

}
 ?> 
