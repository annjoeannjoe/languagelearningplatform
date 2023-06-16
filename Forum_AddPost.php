<?php
// Create connection
$conn = mysqli_connect('localhost', 'Student', '1234','osp group project');

session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";
$room_ID=$_SESSION['forum_room_id'];

/*Change time zone to asia time zone and get current date */
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDateTime= date("M-d-Y H:i:s"); 
$Forum_Question = filter_input(INPUT_POST, 'Question');
$Forum_Topic = filter_input(INPUT_POST, 'Topic');

//Update post to database
if(isset($_POST["post"])){ 

  //If question box is not blank, update database
  if(preg_replace('/\s+/', '', $Forum_Question )!="" && preg_replace('/\s+/', '', $Forum_Topic )!="") {
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO forum(Forum_Name,Forum_Topic,Forum_Question,Forum_Date,Forum_Room_Id)
values ('$userName','$Forum_Topic','$Forum_Question','$todayDateTime','$room_ID')";

if ($conn->query($sql)){
   echo("<script> alert('Posted Successfully.'); window.location.href='Forum_Homepage.php'; </script>"); 
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}else if(preg_replace('/\s+/', '', $Forum_Topic )==""){
  echo("<script> alert('Posted Failed. Cannot leave the topic blank'); window.location.href='Forum_AddPost.php'; </script>"); 

}else if(preg_replace('/\s+/', '', $Forum_Question )==""){
  echo("<script> alert('Posted Failed. Cannot leave the question blank'); window.location.href='Forum_AddPost.php'; </script>"); 

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

  <style>
      .body{
        background-color: #F6EDDF;
    }

    /* Make whole document located at center*/
   .centered {
    position: absolute;
    left: 50%;
    transform: translate(-50%, 0%);
    }

    /*Input Field*/
    .inputFieldLongText{
    font-family: 'Times New Roman', Times, serif;
    font-size: 16px;
    border-radius: 15px;
    border:1px;
    height:100px;
    background-color: #f2f2f2;
    }
    .inputFieldLongText:focus{
      background-color:#F6EDDF;
    }

    /* Button Centered*/
    .buttonCentered {
    text-align: center;
    position: relative;
    font-family: 'Times New Roman', Times, serif;
}

    /* Table Spacing*/
    .table {
    border-spacing: 100px;
    }

    /*Background of the form*/
    .content {
      background-color: #eedec3;
    padding: 0 18px;

    }

    .btn{
    
    cursor: pointer;
    width:150px;
    }

    a:link  {
    font-family: 'Times New Roman', Times, serif;
    text-decoration:none;
}

/*Image */
.image{
    width:400px;
     height:500px;
}

</style>

</head>
<body class=body >

<div class="centered">

<!--Create New Post-->
<br>
<br><br><br>
<div class="content">
  <br>
  
  <form id="form" action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="post" enctype="multipart/form-data">

    <header>
        <h4 style="font-family:'Times New Roman', Times, serif"> Add A New Discussion Topic</h4>
    </header>
    <hr>

    <!--Content-->
    <table >
    <tr>
  <td >
  <td colspan="2"><textarea class="inputFieldLongText" id="Topic" name="Topic" style="height:35px" cols="88" placeholder="&nbsp;Enter A Topic"></textarea> </td>
  </tr>
  <tr style="height:20px"></tr>
  <tr>
  <td >
  <td colspan="2"><textarea class="inputFieldLongText" id="Question" name="Question" rows="6" cols="88" placeholder="&nbsp;Write Something..."></textarea> </td>
  </tr>
  <tr style="height:20px"></tr>


      </table>
  <hr>

    <!--Button-->
  <div class=buttonCentered>
  <button type="submit" class="btn btn-primary" name="post" id="post" style="font-family:'Times New Roman', Times, serif;font-size:18px;border-radius: 100px;">Post</button>
  <button type="submit" class="btn btn-danger" name="cancel" id="cancel" style="font-family:'Times New Roman', Times, serif;font-size:18px;border-radius: 100px;"><span style="color:white">Cancel<span></button>
</div>

<br>

</form>

<?php
if(isset($_POST["cancel"])){  
  header("Location:Forum_Homepage.php");

}
?>


</div>
<img class="image" src="image/ForumAddPost.png" >
</body>
</html>
