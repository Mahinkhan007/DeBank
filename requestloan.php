<?php 


// mysql connection

include 'con.php';
session_start();


if( isset($_POST['reqeustloan']) ){
    $amount = $_POST['amount'];

    // get self balance
    $self = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE id = '$self'";
    $result = mysqli_query($conn, $sql);
    $self = mysqli_fetch_assoc($result);
    $self_balance = $self['balance'];

    // add amount to balance 
    $self_balance = $self_balance + $amount;
    $selfid = $self['id'];
    $sql = "UPDATE users SET balance = '$self_balance' WHERE id = '$selfid'";
    mysqli_query($conn, $sql);
    header("Location: loginpage.php");
}else{
    echo "Please fill up the form";
}

