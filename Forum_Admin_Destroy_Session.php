<?php
session_start ();
  unset($_SESSION['forum_room_id']);
  // Redirect to the Forum Home Page
  header("Location:Forum_Admin_index.php");
  ?>
