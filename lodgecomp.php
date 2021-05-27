<!DOCTYPE html>
<?php
include('session.php');
$success_text = '';
?>

<html>
 <body>
<link href='lodgecomp.css' rel='stylesheet' type='text/css'>
<style>
    h3 {text-align: center;}
    a {text-align: center;}
    div {text-align: center;}
</style>
<h3>LODGE COMPLAINT</h3>
<div class="container">
    <div class="frame">
    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
    <br> <h1> <?php echo $success_text; ?></h1> <br>
    
    <!-- <input type="submit" value="Upload Image" name="submit"> -->
    <!-- </form> -->
     <form action="" method="POST" target="_blank" enctype="multipart/form-data">
     Upload a Picture:
    <br> <br>
    <input type="file" name="fileToUpload" id="fileToUpload" value="" />
        <br> <br>
        <label for="location">Location: </label>
            <input type="text" placeholder="Enter the location" name='location'  id="location" required />
        <br> <br>
        <label for="date_time">DATE and TIME:</label>
        <input type="datetime-local" id="date_time" name="date_time" />
        <br> <br> 
        <label for="Description"> Traffic Chaos:  </label>
        <select name="TrafficChaos" id="Description">
            <option> Pick a Traffic Chao </option>
            <option value="Traffic Signal Faults">Traffic Signal Faults</option>
            <option value="Accident">Accident</option>
            <option value="Destructured Roads">Destructured Roads</option>
            <option value="Traffic Rules Violation">Traffic Rules Violation</option>
            <option value="Others"> Others </option>
        </select>
        <br> <br>
        <p> DESCRIPTION: </p>
        <textarea rows="5" cols="40" name='description'id="Description" required></textarea>
        <br> <br>
        <button type="submit" name='submit' value="submit">Submit</button>
        </form>
    </div>
</div>
<h2><a href = "homepageuser.php">Back to Home</a></h2>
</body>
</html>

<?php
include ("connection.php");
// session_start();

if(isset($_POST['submit'])){
   
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);

        $uname=$login_session;
        $location=$_POST['location'];
        $datetime=$_POST['date_time'];
        $category=$_POST['TrafficChaos'];
        $description=$_POST['description'];
        $status='';
        $success_text = 'Image uploaded successfully';
        
        $imgData = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));

        $query="insert INTO complaints (username,location,date_time,category,description,status,image) values ('$uname','$location','$datetime','$category','$description','New','$imgData')";

        $run = mysqli_query($conn,$query) or die(mysqli_error());

        if($run){
            echo "Form submitted successfully";
            header("location:view_complaints_user.php");
        }
        else{
            echo "Form not submitted";
        }
    }    
    else{
        echo "all fields required";
    }


?>


