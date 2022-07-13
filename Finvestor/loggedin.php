<?php
#to logout
  session_start();
  session_destroy();

  session_start();

  $_SESSION['login'] = 'login.php';
  $_SESSION['user'] = "";
  $_SESSION['state'] = "Log In";
  $_SESSION['user_type'] = "";
  $_SESSION['log'] = false;


  header("Location: index.php");
 ?>
