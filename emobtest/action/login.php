<?php
session_start();
include('../includes/dbconnect.php');

if (isset($_POST['btnLogin'])) {
    $userid = $conn->real_escape_string($_POST['email']);
    $pwd = $conn->real_escape_string($_POST['password']);

    

    $chk = 0;

    if (empty($userid) || empty($pwd)) {
        $chk = 1;
        $_SESSION['e-msg'] = "Enter your email and password";
        echo "<script>window.history.back();</script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `useremail` = ? AND `password` = ?");
    $stmt->bind_param("ss", $userid, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0 && $chk == 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] ="$row";
        header("Location: ../customers.php");
        exit();
        

        
        
    } else {
        $_SESSION['e-msg'] = "Invalid user input";
        echo "<script>window.history.back();</script>";
        exit();
    }
} 
?>
