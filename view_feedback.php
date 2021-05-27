<!--
This code is used to display all the new complaints created by the citizens.
    -->

    <!DOCTYPE html>
<?php
   include('session.php');

   $user_check = $login_session;
   $ses_sql = mysqli_query($conn,"select uname from adminlogin where deptID = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $uname = $row['uname'];
   

  
// SQL query to select data from database 
$sql = "SELECT * FROM feedback "; 
$result = $conn->query($sql); 
$conn->close();  
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
    </style> 
</head> 
  
<body> 
    <section> 
    <h1>Dear <?php echo $uname; ?></h1>
        <!-- TABLE CONSTRUCTION--> 
        <table> 
            <tr> 
                <th>Feedback</th>
               
            </tr> 
            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                { 
                    $curr_feedback= $rows['feedback'];
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <!-- <td><?php echo('<a href="take_action.php?complaint_ID='.$rows['complaint_ID'].'">'.$rows['complaint_ID'].'</a>'); $_SESSION['complaint_ID'] = $curr_complaint_id; ?></td> -->
                <!-- <td><a href="take_action.php?complaint_ID=<?php //$_SESSION['complaint_ID'] = $rows['complaint_ID']; ?>" method="post"><?php //echo $rows['complaint_ID'];?></a></td>  -->
                <td><?php echo $rows['feedback'];?></td> 
                
            </tr> 
            <?php 
                } 
             ?> 
        </table> 
    </section> 
    <h2><a href = "homepageuser.php">Back to Home</a></h2>
    <!-- <h6> Click on any row to take a action <h6> -->
</body> 
  
</html> 