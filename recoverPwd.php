<?php
include ("connection.php");
if(isset($_POST['recover'])){
    if(!empty($_POST['emailId'])){

        $email=$_POST['emailId'];
        
        $sql = "SELECT email,question1,question2 FROM users WHERE email='$email' "; 
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_array($result,MYSQLI_ASSOC);
        // $uname = $rows['uname'];
    }
        else{
            echo "Form not submitted";
        }
    }
    else{
        echo "All fields required";
    }
    if(!empty($_POST['answer1'])){
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];

        $pwd_sql = "SELECT pwd FROM users WHERE email='$email' AND answer1='$answer1' AND answer2='$answer2'";
        $pwd_result = mysqli_query($conn,$pwd_sql);
        $pwd_row = mysqli_fetch_array($pwd_result,MYSQLI_ASSOC);
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Registration Page</title>
<link rel="stylesheet" href="register.css"/>
</head>
<body>
<form action=""  method="POST">
<h2>Password Recovery</h2>
<label  for="emailId" id="un">emailId :</label>
<input type="text" name="emailId" id="emailId" required><br/>

<?php 
if(!empty($rows['question1'])){

    ?>
	<?php echo $rows['question1']; ?> : <input type="text" name="answer1" id="answer1"></input><br />
	<?php echo $rows['question2']; ?> : <input type="text" name="answer2" id="answer2"></input>

<?php 
}
?>
<br />
<input type="submit" name="recover" id="button"></button>

<?php
if(!empty($pwd_row['pwd'])){
    ?>
    Your password is : <h4><?php echo $pwd_row['pwd'];?></h4>
<?php
    }
?>
<a href="userlogin.php">Login</a>
</form>
</body>
</html>