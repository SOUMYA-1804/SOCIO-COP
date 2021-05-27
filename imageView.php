<?php
    require_once "connection.php";
    if(isset($_GET['complaint_ID'])) {
        $complaint_ID = $_GET['complaint_ID'];
        $sql = "SELECT image FROM complaints WHERE complaint_ID='$complaint_ID' ";
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . "image/jpeg");
        echo $row["image"];
	}
	mysqli_close($conn);
?>