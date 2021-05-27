<?php

$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="socio-cop";

$conn = new mysqli($dbhost,$dbuser,$dbpass,$db);

//Check connection

if($conn->connect_error){
     echo "Connection was failed";
}
else{
    //echo "Connection was successful";
}