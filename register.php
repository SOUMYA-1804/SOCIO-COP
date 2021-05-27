<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Registration Page</title>
<link rel="stylesheet" href="register.css"/>
</head>
<body>
<form action=""  method="POST">
<h2>Registration Form</h2>
<label  for="r1" id="un">Username :</label>
<input type="text" name="uname" id="r1" required><br/>
<label  for="r2" id="em">Email :</label>
<input type="text" name="email" id="r2" required><br/>
<label  for="r3" id="pwd">Password :</label>
<input type="password" name="pass" id="r3" required><br/>
<br /><br />
<centre><h2>Recovery questions</h2></centre>

<label for="question1" id="q1">Enter question 1: </label><input type="text" name="question1" id="question1" required> &nbsp;&nbsp;&nbsp; 
<label for="answer1" id="ans1">Enter answer:</label><input type="text" name="answer1" id="answer1" required><br />
<label for="question2" id="q1">Enter question 2:</label><input type="text" name="question2" id="question2" required> &nbsp;&nbsp;&nbsp; 
<label for="answer2" id="ans2">Enter answer:</label><input type="text" name="answer2" id="answer2" required><br />
<input type="submit" name="reg" id="button"></button>
<a href="userlogin.php">Login</a>
</form>
</body>
</html>

<?php
include ("connection.php");
if(isset($_POST['reg'])){
    if(!empty($_POST['uname']) && !empty($_POST['email']) && !empty($_POST['pass'])){

        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $question1 = $_POST['question1'];
        $question2 = $_POST['question2'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];

        
        $query="insert into users(username,email,pwd,question1,question2,answer1,answer2) values ('$uname','$email','$pass','$question1','$question2','$answer1','$answer2')";

        $run = mysqli_query($conn,$query) or die(mysqli_error());

        if($run){
            echo '<script>echo("Form submitted successfully")</script>';
            header("location:userlogin.php");
        }
        else{
            echo '<script>echo("Form submitted successfully")</script>';
        }
    }    
    else{
        echo "all fields required";
    }
}

?>