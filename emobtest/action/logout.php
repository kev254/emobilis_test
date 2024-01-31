<?php
	session_start();

	if(isset($_GET['logout'])){
		unset($_SESSION['user']);
		header("location:../index.php");
		exit();
	}
	else{
		echo "<script>window.history.back();</script>";
	exit();
	}
?>