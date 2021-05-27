<?php
   include('connection.php');
   session_start();
   
   // $user_check = $_SESSION['login_user'];
   
   // $ses_sql = mysqli_query($conn,"select username from users where username = '$user_check' ");
   
   // $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   // $login_session = $row['username'];
   $login_session = $_SESSION['login_user'];
   // $complaint_ID = $_SESSION['complaint_ID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:userlogin.php");
      die();
   }

?>