<?php
include("session.php");
?>

<!DOCTYPE html>
<html>
<link href='homepageuser.css' rel='stylesheet' type='text/css'>
<body>
<h1>Welcome <?php echo $login_session; ?></h1> 
      
  <div class="bg">

  <br><img src="homepageuser.png"  >
      <a  href='view_complaints_user.php' title='VIEW COMPLAINT HISTORY'>VIEW COMPLAINT HISTORY</a><br><br>
      <a  href='lodgecomp.php' title='LODGE COMPLAINT'>LODGE COMPLAINT</a><br><br>
      
      <a  href='feedback.php' title='FEEDBACK'>FEEDBACK</a><br>
      <h2><a href = "userchangepassword.php">Change password</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
      <br><br><br><br><br>
      <div class="container">
      <div class="vertical-center">
      
      </div>
</div>
</div>
 
</body>>
</html>