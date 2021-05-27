<?php
include("session.php");
?>

<html>
<head>
<title>Change Password</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmChange" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Change Password</td>
</tr>
<tr>
<td width="40%"><label>Username</label></td>
<td width="60%"><input type="text" name="username" class="txtField"/><span id=""  class="required"></span></td>
</tr>
<tr>
<td width="40%"><label>Current Password</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</body></html>


<?php
if(isset($_POST['submit'])){
$user_name=$_POST['username'];
$currentPassword=$_POST['currentPassword'];
$newpassword=$_POST['newPassword'];
$confirmpassword=$_POST['confirmPassword'];

include("connection.php");
// session_start();
// $_SESSION["userId"] = "9";
// $conn = mysqli_connect("localhost", "root", "test", "blog_samples") or die("Connection Error: " . mysqli_error($conn));


    $result = mysqli_query($conn, "SELECT * from users WHERE username='$user_name'");
    $row = mysqli_fetch_array($result);
    if ($newpassword== $confirmpassword) {
        mysqli_query($conn, "UPDATE users set pwd='$newpassword' WHERE username='$user_name'");
        $message = "Password Changed";
        header("location:userlogin.php");
    } else
        $message = "Current Password is not correct";

}
else{
    echo 'all fields required';
}
?>