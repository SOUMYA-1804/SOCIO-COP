<!DOCTYPE html>
<?php
include('session.php');
?>

<html>
 <body>

<style>
    h3 {text-align: center;}
    a {text-align: center;}
    div {text-align: center;}

    .frame {
  height: 300px;
  width: 400px;
  background:
    linear-gradient(
    rgb(54, 207, 195),
    rgba(7, 66, 100, 0.95)),
    url(https://dl.dropboxusercontent.com/u/22006283/preview/codepen/clouds-cloudy-forest-mountain.jpg) no-repeat center center;
  background-size: cover;
  margin-left: auto;
  margin-right: auto;
  border-top: solid 1px rgba(255,255,255,.5);
  border-radius: 5px;
  box-shadow: 0px 2px 7px rgba(0,0,0,0.2);
  overflow: hidden;
  transition: all .5s ease;
}

.frame-long {
  height: 300px;
}

.frame-short {
  height: 400px;
  margin-top: 50px;
  box-shadow: 0px 2px 7px rgba(0,0,0,0.1);
}
</style>
<h3>FEEDBACK</h3>
<div class="container">
    <div class="frame">
     <form action="#" method="post" target="_blank">
        <br> <br>
        <p> GIVE FEEDBACK: </p>
        <textarea rows="8" cols="40" name="description" id="Description" required></textarea>
        <br> <br>
        <button type="submit" name="submit" value="Submit">Submit</button>
        </form>
    </div>
</div>
<h2><a href = "homepageuser.php">Back to Home</a></h2>
</body>
</html>

<?php
//include ("connection.php");
if(isset($_POST['submit'])){
    //if(!empty($_POST['uname']) && !empty($_POST['email']) && !empty($_POST['pass'])){

        $feedback=$_POST['description'];
        $login_session = $_SESSION['login_user'];
        

       

        
        $query="insert into feedback(username,feedback) values ('$login_session','$feedback')";

        $run = mysqli_query($conn,$query) or die(mysqli_error());

        if($run){
            echo "Form submitted successfully";
            header("location:homepageuser.php");
        }
        else{
            echo "Form not submitted";
        }
    }    
    else{
        echo "all fields required";
    }


?>


