<!--
This code is used to display all the new complaints created by the citizens.
    -->

    <!DOCTYPE html>
<?php
   include('session.php');

   $user_check = $login_session;
   

  
// SQL query to select data from database 
$sql = "SELECT complaint_ID, username, location, date_time, category, description, status FROM complaints WHERE username='$user_check' ORDER BY complaint_ID ASC"; 
$result = $conn->query($sql); 
// $conn->close();  

$score_sql = "SELECT COUNT(complaint_ID)*100 AS score FROM `complaints` WHERE status='Accepted' AND username='$user_check'";
$score_result = $conn->query($score_sql);
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
    <h1>Dear <?php echo $user_check; ?></h1>
    <?php   // LOOP TILL END OF DATA  
                while($score_row=$score_result->fetch_assoc()) 
                { 
            ?> 
        <h3> SCORE : <?php echo $score_row['score']; ?> </h3>
    <?php
                }
            ?>
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
            <?php   // LOOP TILL END OF DATA  
                while($rows=$result->fetch_assoc()) 
                { 
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                
                <td><?php echo $rows['complaint_ID']; ?></td>
                <td><?php echo $rows['username'];?></td> 
                <td><?php echo $rows['location'];?></td> 
                <td><?php echo $rows['date_time'];?></td>
                <td><?php echo $rows['category'];?></td> 
                <td><?php echo $rows['description'];?></td>
                <td><?php echo $rows['status'];?></td>
            </tr> 
            <?php 
                } 
             ?> 
        </table> 
    </section> 

    <a  href='homepageuser.php' title='BACK TO HOME'>BACK TO HOME</a><br><br>
    <!-- <a  href='lodgecomp.php' title='LODGE ANOTHER COMPLAINT'>LODGE ANOTHER COMPLAINT</a><br><br> -->
</body> 
  
</html> 