<?php
  $conn = mysqli_connect('localhost', 'Student', '1234','osp group project');
  session_start();
/*NEED TO HAVE LOGIN FEATURE FIRST */
//$userName=$_SESSION['user_name'];
$userName="Jane";
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
    width:1000px

    }

    .commentContentBox {
      border: 1px solid black;
      border-radius: 5px;
    padding: 0 18px;
    width:950px;
      background-color: white;
    }

    /*Add post button */
    .btn{
    cursor: pointer;
    width:150px;
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

    /*Link */
    .aComment{
      text-decoration:none;
      color: white;
      font-family:'Times New Roman', Times, serif;
      font-size:16px;
      cursor: pointer;
    background-color:	#007bff;
    border-radius: 10px;
    border: none;
    height:40px;
    }

    .aComment:hover{
      text-decoration:none;
      color: black;
    }

    /*Comment Button */
    .collapsible{ 
      cursor: pointer;
    }

    /*Comment Icon */
    .CommentIcon{
      background-color:	 white;
    color:	 black;
    border: none;
    cursor: pointer;
    }

  .CommentIcon:hover{
    background-color:	 whitesmoke;
    color:	 blue;
  }

  /*Like Icon */
  .like{
    cursor: pointer;
  }


  .LikeIcon{
      background-color:	 white;
    color:	 black;
    border: none;
    cursor: pointer;
    
    }

  .LikeIcon:hover{
    background-color:	 whitesmoke;
    color:	 blue;
  }

  .UserHasLiked{
    background-color:	 white;
    color:	 blue;
    border: none;
  }

  .UserHasLiked:hover{
    background-color:	 white;
    color:	 black;
  }

  /*Boarder For Like and Comment */
  .likeCommentBoarder{
    border: 1px solid black;
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
      background-color:#d9d9d9;
      border-radius: 5px;
    padding: 0 18px;
    width:1000px;
    display: none;
  overflow: hidden;
}

 /*Add Comment Button */
 .commentBtn{
    cursor: pointer;
    background-color:	#007bff;
    border-radius: 10px;
    border: none;
    }

    /*Back Link */
  .back:hover {
    color: black;
  }

</style>
</head>
<body >

<div class="centered">
<!--Create New Post-->

    <!--Button-->
    <br> 
  <a href="Forum_Destroy_Session.php" class="back" style="font-family:'Times New Roman', Times, serif;font-size:20px;float:left;"> Back</a>
  <button  type="submit" class="btn btn-primary" name="create" id="create" style="font-family:'Times New Roman', Times, serif;font-size:18px;float:right;"><a href="Forum_AddPost.php"><span style="color:white">Create A Post<span></a></button>
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
                          </table>  </div> 
                         "  ;
               
                  //Check whether certain user has liked
                   $CheckUserLikeStatus = "SELECT * FROM forum_post_like WHERE Forum_Post_Id='$id' AND User_Like='$userName'";
                   $run4 = mysqli_query($conn, $CheckUserLikeStatus);
                   if($num2 = mysqli_num_rows($run4)>0){
            ?> <!--Delete Like-->
            <form  action="Forum_Post_Delete_Like.php" method="POST" class="form">
                    &nbsp;
                    <?php echo " <td colspan='2'><input type='hidden' class='inputComment' id='id' name='id' value=".$result['Forum_Id']."></td>";?>
             <button type="submit" name="deleteLike" class="UserHasLiked" style="float:left;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                  </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;">&nbsp;<?php echo"$SumOfLike"?></span></button>
                  </form>

                  <?php }else{?>

                    <!--Like-->
                    <form  action="Forum_Post_Like.php" method="POST" class="form">
                    &nbsp;
                    <?php echo " <td colspan='2'><input type='hidden' class='inputComment' id='id' name='id' value=".$result['Forum_Id']."></td>";?>
                    <button type="submit" name="like" class="LikeIcon" style="float:left;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                  </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;">&nbsp;<?php echo"$SumOfLike"?></span></button>
                   </form>

                   <?php }?>

                         <div class="collapsible">
                          <!--Comment-->
                          <button type="button" name="comment" class="CommentIcon" style="float:left;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                      </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;"> &nbsp;<?php echo"$SumOfComment"?></span></button>
                </div> 


                         <div class="commentContent">     
                   <!--Add Comment-->                 
            <form id="form" action="Forum_Comment_Connection.php" method="POST">
            <table>
            <?php echo " <td colspan='2'><input type='hidden' size='109' class='inputComment' id='id' name='id' value=".$result['Forum_Id']."></td>";?>
            <tr> 
            <td colspan="2"><input type="text" size="108" class="inputComment" id="inputComment" name="inputComment" placeholder="&nbsp; Enter your comment here"></td>
            &nbsp;&nbsp;  
            <td><button type="submit" class="aComment" name="post" >Add Comment</button></td>
            </tr>
            </table>

            <br>    
            </form>
                            
                    
<?php 
          $commentQuery = "SELECT * FROM forum_comment WHERE Forum_Post_Id='$id' ORDER BY Comment_Date_Time DESC";
          $run1 = mysqli_query($conn, $commentQuery);
          $SumOfComment= mysqli_num_rows($run1);        


          echo" <h4>Comments:</h4>";
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
                        

               //Check whether certain user has liked
               $CheckUserCommentLikeStatus = "SELECT * FROM forum_comment_like WHERE Forum_Post_Id='$id' AND User_Like_Comment='$userName' AND Comment_Id='$commentId'";
               $run5 = mysqli_query($conn, $CheckUserCommentLikeStatus);
               if($num3 = mysqli_num_rows($run5)>0){
            ?>  
                <!--Delete Comment Like-->
            <td><form  action="Forum_Comment_Like_Delete.php" method="POST" class="form">
                    &nbsp;
                    <?php echo " <td colspan='2'><input type='hidden' class='inputComment' id='id' name='id' value=".$result['Forum_Id']."></td>";?>
                    <?php echo " <td colspan='2'><input type='hidden' class='inputComment' id='commentId' name='commentId' value=".$comment['Comment_Id']."></td>";?>
                    <button type="submit" name="deleteCommentLike" class="UserHasLiked" style="float:right;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                  </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;">&nbsp;<?php echo"$SumOfCommentLike"?></span></button>
                  </form></td>

                  <?php }else{?>

                    <!--Like Comment-->
                  <td> <form  action="Forum_Comment_Like.php" method="POST" class="form">
                    &nbsp;
                    <?php echo " <td colspan='2'><input type='hidden' class='inputComment' id='id' name='id' value=".$result['Forum_Id']."></td>";?>
                    <?php echo " <td colspan='2'><input type='hidden' class='inputComment' id='commentId' name='commentId' value=".$comment['Comment_Id']."></td>";?>
                    <button type="submit" name="commentLike" class="LikeIcon" style="float:right;height:40px;width:70px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                  </svg><span style="font-family:'Times New Roman', Times, serif;font-size:18px;">&nbsp;<?php echo"$SumOfCommentLike"?></span></button>
                   </form></td>

                   <?php }?>
     
          
     
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