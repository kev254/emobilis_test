<?php

date_default_timezone_set('Africa/Nairobi');
	$host="localhost";
	$name="root";
	$pass="";
	$db="credit_system";
	$date=date("Y-m-d");
	$conn= new mysqli($host,$name,$pass,$db);
    if(!$conn){
        echo "Coonection to server Failed";
        exit;
    }
    
?>