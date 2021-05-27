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
<label for="uname" id="un">Dept ID:</label>
<input type="text" name="user" placeholder="Enter deptID" id="uname"><br/>
 
<label for="upass" id="ps">Password:</label>
<input type="password" name="pass" placeholder="Enter Password" id="upass"><br/>
 
<button type="submit" value="Login" name="Login"  id="submit">Login</button>
 
</div>
 
</form>
</div>
 
</body>
</html>

<?php
include("connection.php");
// include("session.php");
if(isset($_POST['Login'])){
if(!empty($_POST['user']) && !empty($_POST['pass']))
{
$username=$_POST['user'];
$password=$_POST['pass'];
//echo "Inside if loop to check username & password";
$query="SELECT deptID, pwd from adminlogin where deptID='$username' and pwd='$password'";
//$query1="SELECT uname from adminlogin where deptID='$username' and pwd='$password'";
//$res="mysqli_query($conn,$query1);
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count>0)
{
     echo 'Login successfull';
     session_start();
     $_SESSION['myusername']=$username;
     $_SESSION['socio-cop']='true';
     $_SESSION['login_user'] = $username;
     header('location:home page admin.php');
}
}
else {
     echo 'wrong username or password';
}
}
?>

