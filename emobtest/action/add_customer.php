<?php
session_start();
include('../includes/dbconnect.php');

if(isset($_POST['submit'])){
    $chk = 0;
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $points = "0";
    $addr1 = $conn->real_escape_string($_POST['address']);
    $customerType = "Regular customer";
    $customerStatus = "Active";
    $credit_limit=$conn->real_escape_string($_POST['credit_limit']);


    // -------------- Empty input field check 
    if(empty($name)){
        $chk=1;
        $_SESSION['msg']="Enter customer name";
        echo "<script>window.history.back();</script>";
        exit();
    }
    
    if(empty($phone)){
        $chk=1;
        $_SESSION['msg']="Enter customer phone";
        echo "<script>window.history.back();</script>";
        exit();
    }
    // -------------- Empty input field check end

    $check = mysqli_num_rows($conn->query("SELECT * FROM `p_customer` where `name`='$name' AND `phone`='$phone'"));
    if($check > 0){
        $chk=1;
        $_SESSION['msg']="This user already exist";
        echo "<script>window.history.back();</script>";
        exit();
    }

    if($chk==0){
        $insertCustomerInfo=$conn->query("INSERT INTO `p_customer`(`store`, `name`, `email`, `phone`, `address`, `customertype`, `customerstatus`, `points`, `date`, `credit_limit`) 
                                                                VALUES ('1', '$name', '$email', '$phone', '$addr1', '$customerType', '$customerStatus', '$points', '$date', '$credit_limit')");          
        $_SESSION['msg'] ="Information submit successfully";
        echo "<script>window.history.back();</script>";
        exit();
        
    }else{
        $_SESSION['msg'] ="Something went wrong. Try later !!!";
        echo "<script>window.history.back();</script>";
        exit();
    }

}

if(isset($_POST['update'])){
    $chk = 0;
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $due = $conn->real_escape_string($_POST['due']);
    $points = "0";
    $addr = $conn->real_escape_string($_POST['address']);
    $customerType = "Regular customer";
    $customerStatus = "Active";
    $credit_limit=$conn->real_escape_string($_POST['credit_limit']);


    // -------------- Empty input field check 
    if(empty($name)){
        $chk=1;
        $_SESSION['msg']="Enter customer name";
        echo "<script>window.history.back();</script>";
        exit();
    }
    
    if(empty($phone)){
        $chk=1;
        $_SESSION['msg']="Enter customer phone";
        echo "<script>window.history.back();</script>";
        exit();
    }
    // -------------- Empty input field check end

   

    if($chk==0){
        $conn->query("UPDATE `p_customer` SET `name`='$name',`email`='$email',`phone`='$phone',`points`='$points',`due`='$due',`address`='$addr',`customertype`='$customerType',`customerstatus`='$customerStatus' WHERE `id`='$id' ");

         if($due !=="0"){
            $insertCustomerInfo=$conn->query
            ("INSERT INTO `customer_transaction` (`customer_id`, `item_name`, `transaction_quantity`, `unit_price`, `uom_code`, `transaction_type`, `total_cost`, `created_by`, `created_at`) 
            VALUES ('$id', 'Initial Credit', '1', '$due', 'None', '5', '$due', 'Admin', '$date')");
         }

        $_SESSION['msg'] =" Update";
        echo "<script>window.history.back();</script>";
        exit();
        
    }else{
        $_SESSION['msg'] ="Something went wrong. Try later !!!";
        echo "<script>window.history.back();</script>";
        exit();
    }

}

if (isset($_GET['delete'])) {
    $id = $conn->real_escape_string($_GET['delete']); 

    $conn->query("DELETE FROM `p_customer` WHERE `id`='$id'");

    


    $_SESSION['msg'] = "Customer deleted successfully";
    echo "<script>window.history.back();</script>";
    
    exit();
}
?>