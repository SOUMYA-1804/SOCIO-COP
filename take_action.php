<?php 
include('session.php');
$url =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
// echo $url.'this is the url ****';
  
    
// Use parse_url() function to parse the URL  
// and return an associative array which 
// contains its various components 
$url_components = parse_url($url); 
  
// Use parse_str() function to parse the 
// string passed via URL 
parse_str($url_components['query'], $params); 
      
// Display result 

$c = $params['complaint_ID'];
// echo $c." <-- this is the captured complaint id";


// This code is used to display all the new complaints created by the citizens.


   $user_check = $login_session;
   $ses_sql = mysqli_query($conn,"select uname from adminlogin where deptID = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql);
   $uname = $row['uname'];
   

  
// SQL query to select data from database 

   
   $fetch_comp_row_sql = mysqli_query($conn,"SELECT complaint_ID, username, location, date_time, category, description, status FROM complaints WHERE status!='Accepted' AND complaint_ID='$c' ORDER BY complaint_ID ASC");
   $one_row = mysqli_fetch_array($fetch_comp_row_sql,MYSQLI_ASSOC);

   $cid = $one_row['complaint_ID'];
   $username = $one_row['username'];
   $location = $one_row['location'];
   $date_time = $one_row['date_time'];
   $category = $one_row['category'];
   $description = $one_row['description'];
   $status = $one_row['status'];

   if(isset($_POST['submit'])){
    $new_status = $_POST['new_status'];
    
    $update_query="update complaints SET status='$new_status' where complaint_ID='$cid'";

    $run = mysqli_query($conn,$update_query) or die(mysqli_error());

    if($run){
        echo "Status changed successfully";
        header("location:check_complaints.php");
    }
    else{
        echo "Status is not changed";
    }
}
  
?> 
<!--// HTML code to display data in tabular format  -->
<!DOCTYPE html> 
<html lang="en"> 
  
<head> 
    <meta charset="UTF-8"> 
    <title>GFG User Details</title> 
    <!-- CSS FOR STYLING THE PAGE --> 
    <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid black; 
        } 
  
        h1 { 
            text-align: center; 
            color: #006600; 
            font-size: xx-large; 
            font-family: 'Gill Sans', 'Gill Sans MT',  
            ' Calibri', 'Trebuchet MS', 'sans-serif'; 
        } 
  
        td { 
            background-color: #E4F5D4; 
            border: 1px solid black; 
        } 
  
        th, 
        td { 
            font-weight: bold; 
            border: 1px solid black; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .submit_center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100px;
        }
    </style> 
</head> 
  
<body> 
    <section> 
    <h1>Dear <?php echo $uname; ?></h1>
        <!-- TABLE CONSTRUCTION--> 
        <table> 
            <tr> 
                <th>complaint_ID</th>
                <th>username</th>
                <th>location</th>
                <th>date_time</th>
                <th>category</th>
                <th>description</th>
                <th>status</th>
            </tr> 
            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                
                <td><?php echo $one_row['complaint_ID'];?></td> 
                <td><?php echo $one_row['username'];?></td> 
                <td><?php echo $one_row['location'];?></td> 
                <td><?php echo $one_row['date_time'];?></td>
                <td><?php echo $one_row['category'];?></td> 
                <td><?php echo $one_row['description'];?></td>
                <td><?php echo $one_row['status'];?></td>
            </tr> 
            
            <!-- <?php 
                // } 
            // ?>  -->
        </table> 
        
        
        <img class="center" width="240" height="180" src="imageView.php?complaint_ID=<?php echo $one_row["complaint_ID"]; ?>" />
        <br /> <br /> <br />
        
        <form action="" method="POST" enctype="multipart/form-data">
        <select name="new_status" id="new_status" class="center">
            <option> Select action </option>
            <option value="Rejected">Rejected</option>
            <option value="Accepted">Accepted</option>
        </select>
        <button  class="submit_center" type="submit" name='submit' value="submit">Submit</button>
        </form>
    </section> 
</body> 
  
</html> 