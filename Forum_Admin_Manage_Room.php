<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="admin";
$room_ID=$_SESSION['forum_room_id'];
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
        background-image: url("image/ForumBackground.png");
        background-color: #E5F6DF;
        background-repeat: repeat-y;
    }
    /* Make whole document located at center*/
   .centered {
    position: absolute;
    left: 50%;
    transform: translate(-50%, 0%);
    }

    /*Background of the post*/
    .content {
      border: 1px solid black;
      border-radius: 5px;
    padding: 0 18px;
    width:1000px;
    background-color:white ;

    }

    .commentContentBox {
      border: 1px solid black;
      border-radius: 5px;
    padding: 0 18px;
    width:950px;
      background-color: white;
    }


    /*Font */
    .nameFont{
      font-family:'Times New Roman', Times, serif;
      font-size:16px;
    }

    .dateFont{
      font-family:'Times New Roman', Times, serif;
      font-size:13px;
      color: #a6a6a6;
    }

    .topicFont{
      font-family:'Times New Roman', Times, serif;
      font-size:18px;
    }

    .questionFont{
      font-family:'Times New Roman', Times, serif;
      font-size:18px;
    }

    /*Comment Button */
    .collapsible{ 
      cursor: pointer;
    }

    /*Comment Icon */
    .CommentIcon{
      background-color:	#e9d3af;
    color:	 black;
    border: none;
    cursor: pointer;
    }

  .CommentIcon:hover{
    background-color:	  #e9d3af;
    color:	 blue;
  }

  /*Like Icon */
  .LikeIcon{
      background-color:	 #e9d3af;
    color:	 black;
    border: none;
    cursor: pointer;
    
    }

  .LikeIcon1{
      background-color:	white;
    color:	 black;
    border: none;
    cursor: pointer;
    
    }

  /*Form Size of like button */
.form{
  height:8px;
  width:0px;

}

    /*Add Comment box */
    .commentContent {
      height:auto;
      border: 1px solid black;
      background-color: #eedec3;
      border-radius: 5px;
    padding: 0 18px;
    width:1000px;
    display: none;
  overflow: hidden;
}

    /*Back Link */
  .back:hover {
    color: black;
  }

  /*Post delete button */
  .PostDeleteButton{
    float:right;
    color:red;
    background-color:white;
    border: none;
    text-decoration: underline;

  }

  .PostDeleteButton:hover{
    color: black;
    text-decoration: none;
  }


</style>
</head>
<body class="body" >

<div class="centered">
<!--Create New Post-->

    <!--Button-->
    <br> 
  <a href="Forum_Admin_Destroy_Session.php" class="back" style="font-family:'Times New Roman', Times, serif;font-size:20px;float:left;"> Back</a>
    <br>
    <br>
  
    <br>
    <br>
    <br>
  <?php 
          $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
          $query = "SELECT * FROM forum WHERE Forum_Room_Id='$room_ID' ORDER BY Forum_Date DESC;";
          $run = mysqli_query($conn, $query);
          
           if ($num = mysqli_num_rows($run)>0) {   
           
                while ($result = mysqli_fetch_assoc($run)) {  
                  
                  $id= $result['Forum_Id']; 
          
                  //Count Number Of Comment
                  $commentCount = "SELECT * FROM forum_comment WHERE Forum_Post_Id='$id' ORDER BY Comment_Date_Time DESC";
                  $run2 = mysqli_query($conn, $commentCount);
                  $SumOfComment= mysqli_num_rows($run2); 
                  
                   //Count Number Of Like
                   $LikeCount = "SELECT * FROM forum_post_like WHERE Forum_Post_Id='$id'";
                   $run3 = mysqli_query($conn, $LikeCount);
                   $SumOfLike= mysqli_num_rows($run3);  

                     echo "
                     <div  class='content'>
                     <table>
                      <form  action='Forum_Admin_Delete_Post.php' method='POST' class='form'>
                    <td colspan='2'><input type='hidden' class='inputComment' id='id' name='id' value=".$result['Forum_Id']."></td>
                      <button type='submit' name='deletePost' class='PostDeleteButton'>Delete</button>
                      </form>
                          <tr>  
                               <td class='nameFont'><b>&nbsp;&nbsp;".$result['Forum_Name']."</b></td>  
                          </tr>   
                          <tr >  
                              <td class='dateFont'>&nbsp;&nbsp;".$result['Forum_Date']."</td>  
                          </tr>  
                          <tr style='height:20px'></tr>
                          <tr >  
                          <td class='topicFont'><b>&nbsp;&nbsp;".$result['Forum_Topic']."</b></td>  
                      </tr>  
                       <tr >  
                              <td class='questionFont'>&nbsp;&nbsp;".$result['Forum_Question']."</td>  
                        <tr style='height:10px'></tr>
                          </table> </div>";?>

            <!--Show Like Count-->
            <form class="form">
            &nbsp;
            <?php echo " <td colspan='2'></td>";?>
            <button  class="LikeIcon" style="float:left;height:40px;width:70px;" disabled><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
          </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;">&nbsp;<?php echo"$SumOfLike"?></span></button>
          </form>


            <div class="collapsible">
            <!--ShowComment-->
            <button type="button" name="comment" class="CommentIcon" style="float:left;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
          <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
          </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;"> &nbsp;<?php echo"$SumOfComment"?></span></button>
          </div> 


          <div class="commentContent">                                               
          <?php 
          $commentQuery = "SELECT * FROM forum_comment WHERE Forum_Post_Id='$id' ORDER BY Comment_Date_Time DESC";
          $run1 = mysqli_query($conn, $commentQuery);
          $SumOfComment= mysqli_num_rows($run1);        


          echo"<br><h4>Comments:</h4><br>";
           if ($num1 = mysqli_num_rows($run1)>0) {  
                while ($comment= mysqli_fetch_assoc($run1)) {  
                  
                  $commentId= $comment['Comment_Id'];

                      //Count Number Of CommentLike
                      $CommentLikeCount = "SELECT * FROM forum_comment_like WHERE Forum_Post_Id='$id' AND Comment_Id='$commentId'";
                      $run6 = mysqli_query($conn, $CommentLikeCount);
                      $SumOfCommentLike= mysqli_num_rows($run6); 

                     echo "
                     <div  class='commentContentBox'>
                     <table>
                     <form  action='Forum_Admin_Delete_Comment.php' method='POST' class='form'>
                     <td colspan='2'><input type='hidden' class='inputComment' id='id' name='commentId' value=".$comment['Comment_Id']."></td>
                       <button type='submit' name='deleteComment' class='PostDeleteButton'>Delete</button>
                       </form>
                          <tr>  
                               <td class='nameFont'><b>&nbsp;&nbsp;".$comment['Comment_Name']."</b></td>  
                          </tr>   
                          <tr>  
                              <td class='dateFont'>&nbsp;&nbsp;".$comment['Comment_Date_Time']."</td>  
                          </tr>  
                          <tr style='height:10px'></tr>
                          <tr>  
                              <td class='questionFont'>&nbsp;&nbsp;".$comment['Comment_Content']."</td>  
                          <tr style='height:10px'></tr>
                          <tr>
                         ";
            ?>  
            <!--Show Comment Like-->
            <td><form class="form">
                    &nbsp;
                    <?php echo " <td colspan='2'></td>";?>
                    <?php echo " <td colspan='2'></td>";?>
                    <button  class="LikeIcon1" style="float:right;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                  </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;">&nbsp;<?php echo"$SumOfCommentLike"?></span></button>
                  </form></td>
  
 <!--Collapsible division-->                      
<?php
        echo" </tr></table></div><br>";   }} echo"</div> <br><br><br><br>";         }}
else{echo "<span style=\"color:#669999;font-size:20px;  font-family: 'Times New Roman', Times, serif;\"><b>No Post Found</b></span>";}
?>

<!--Collapsible-->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>


</body>
</html>