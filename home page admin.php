<!DOCTYPE html>
<?php
   include('session.php');

   $user_check = $login_session;
   $ses_sql = mysqli_query($conn,"select uname from adminlogin where deptID = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $uname = $row['uname'];
   
?>

<html>
<style>
  a:link, a:visited{
    background-color:rgb(77, 77, 201);
  color:beige;
  width: 350px;
  height:100px;
  padding: 14px 25px;
  text-align:center;
  font-size:40px;
  text-decoration:cornsilk;
  display: inline-block;
  
  }
  a:hover, a:active {
  background-color: rgb(155, 118, 118);
  }
  img{
      
      height:560px;
      width:800px ;
      float:right;
  }
  .container { 
  height: 200px;
  position: relative;
  }
  .vertical-center {
  margin: 0;
  width: 200px;
  height:40px;
  position: absolute;
  top: 50%;
  left: 40%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

 
</style>
<body>
<h1>Welcome <?php echo $uname; ?></h1>
  <br><img src="police.png"  >
      <a  href='' title='VIEW PROFILE'>VIEW PROFILE</a><br><br>
      <a  href='check_complaints.php' title='CHECK COMPLAINTS'>CHECK COMPLAINTS</a><br><br>
      <!-- <a  href='' title='UPDATE STATUS AND SCORE'>UPDATE STATUS AND SCORE</a><br><br> -->
      <a  href='view_feedback.php' title='VIEW FEEDBACK'>VIEW FEEDBACK</a><br><br><br><br>
      <a  href='adminchangepassword.php' title='CHANGE PASSWORD'>CHANGE PASSWORD</a><br><br>
      <a  href='logout.php' title='LOGOUT'>LOG OUT</a><br><br>
      </div>
      </div>
      
 
</body>>
</html>
