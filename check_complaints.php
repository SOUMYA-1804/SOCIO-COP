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
$sql = "SELECT complaint_ID, username, location, date_time, category, description, status FROM complaints WHERE status!='Accepted' ORDER BY complaint_ID ASC"; 
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
                
                <td><a href="take_action.php?complaint_ID=<?php echo $rows['complaint_ID']; ?>"><?php echo $rows['complaint_ID'];?></a></td> 
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
    <!-- <h6> Click on any row to take a action <h6> -->
    <a  href='home page admin.php' title='BACK TO HOME'>BACK TO HOME</a><br><br>
</body> 
  
</html> 