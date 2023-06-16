<?php
// Create connection
$conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
session_start();
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
        background-color: #E5F6DF;
    }
    /* Make whole document located at center*/
   .centered {
    position: absolute;
    left: 50%;
    transform: translate(-50%, 0%);
    }


    /* Button Centered*/
    .buttonCentered {
    text-align: center;
    position: relative;
    font-family: 'Times New Roman', Times, serif;
}


    /*Background of the form*/
    .content {
    background:#E5F6DF;
    padding: 0 18px;

    }

    .btn{
    cursor: pointer;
    width:500px;
    color: #dfdfd4 ;
    background-color:#8d7a54;  
   
    }

    .btn:hover{
     background-color: #dfdfd4 ;
    color:#8d7a54;
    }

    a:link  {
    font-family: 'Times New Roman', Times, serif;
    text-decoration:none;
}

h2{
   font-family:'Times New Roman', Times, serif;
   border-radius:100px;
   text-align: center;
   
}

/*Image */
.image{
    width:300px;
     height:300px;
}

</style>
<?php
include_once("nav.php");?>
</head>
<body class="body">



<div class="centered">
<form class=content action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="post" enctype="multipart/form-data">
<br>
<br>
<h2 style="color:#543b23"><b>Forum Discussion Room</b><h2>
<br>
<br>

<!--Forum Room Topic-->
<div class=buttonCentered>
<button type="submit" class="btn" name="ForumRoom1" style="font-family:'Times New Roman', Times, serif;font-size:30px;border-radius:100px;">JAPANESE</button>
<br><br>
<button type="submit" class="btn" name="ForumRoom2" style="font-family:'Times New Roman', Times, serif;font-size:30px;border-radius:100px;">CHINESE</button>
<br><br>
<button type="submit" class="btn" name="ForumRoom3" style="font-family:'Times New Roman', Times, serif;font-size:30px;border-radius:100px;">KOREAN</button>
<br><br>
</div>
<br>
<img class="image" src="image/Forum.png" >
</form>


</div>



    


</body>
</html>

<?php
if(isset($_POST["ForumRoom1"])){ 
    echo("<script>window.location.href='Forum_Homepage.php'; </script>"); 
    $_SESSION['forum_room_id']='T1';
}

//NEED TO CHANGE
if(isset($_POST["ForumRoom2"])){ 
    echo("<script>window.location.href='Forum_Homepage.php'; </script>"); 
    $_SESSION['forum_room_id']='T2';
}

//NEED TO CHANGE
if(isset($_POST["ForumRoom3"])){ 
    echo("<script>window.location.href='Forum_Homepage.php'; </script>"); 
    $_SESSION['forum_room_id']='T3';
}

//nav bar need destroy session 
?>
