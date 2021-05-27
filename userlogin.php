<?php
include("connection.php");
// include("session.php");
if(isset($_POST['Login'])){
if(!empty($_POST['user']) && !empty($_POST['pass']))
{
$username=$_POST['user'];
$password=$_POST['pass'];
//echo "Inside if loop to check username & password";
$query="SELECT username, pwd from users where username='$username' and pwd='$password'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
     echo 'Login successfull';
     session_start();
     $_SESSION['myusername']=$username;
     $_SESSION['socio-cop']='true';
     $_SESSION['login_user'] = $username;
     header('location:homepageuser.php');
}
else {
     echo '<script> alert("Invalid credentials");</script>';
}
}
else {
     echo '<script> alert("Enter username/password")</script>';
}
}
?>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
</head>
<link rel="stylesheet" href="login.css"/>
 
<body>
 
<div id="container">
<form action="" method="POST">
 
<div class="border-box">
<h2>Login Form</h2>
<label id="un"><b>Username:</b></label>
<input type="text" name="user" placeholder="Enter Username" id="uname"><br/>
 
<label id="ps"><b>Password:</b></label>
<input type="password" name="pass" placeholder="Enter Password" id="upass"><br/>
 
<button type="submit" value="Login" name="Login" id="submit" >Login</button><br /><br />

 
<centre>&nbsp;&nbsp;<a href="register.php">Register</a></centre>
<br /><br />
<centre><h4><a href="recoverPwd.php">Forgot Password</a></h4></centre>
</div>
 
</form>
</div>
 
</body>
</html>