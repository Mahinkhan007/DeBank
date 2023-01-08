<?php 

// mysql connection
require 'con.php';
session_start();

if( isset($_POST['transfer']) ){
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    // get self balance
    $self = $_SESSION['user']['id'];
    $sql = "SELECT * FROM users WHERE id = '$self'";
    $result = mysqli_query($conn, $sql);
    $self = mysqli_fetch_assoc($result);
    $self_balance = $self['balance'];


    $sql = "SELECT * FROM users WHERE email = '$email'";

    if ($conn) {
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {

            // check if self balance is greater than amount
            if( $self_balance > $amount ){
                // update self balance
                $self_balance = $self_balance - $amount;
                $selfid = $self['id'];
                $sql = "UPDATE users SET balance = '$self_balance' WHERE id = '$selfid'";
                $result = mysqli_query($conn, $sql);

                // update receiver balance
                $receiver_balance = $row['balance'] + $amount;
                $sql = "UPDATE users SET balance = '$receiver_balance' WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);

                // update transaction table
                $sender = $self['id'];
                $receiver = $row['id'];
                $sql = "INSERT INTO transactions (user_id, amount) VALUES ('$sender', '-$amount')";
                $result = mysqli_query($conn, $sql);
                $sql = "INSERT INTO transactions (user_id, amount) VALUES ('$receiver', '+$amount')";
                $result = mysqli_query($conn, $sql);

                header("Location: loginpage.php");
            }else{
                echo "Insufficient Balance <a href='loginpage.php'>Go Back</a>";
            }
            // die(var_dump($row));
        }else{
            echo "User not found <a href='loginpage.php'>Go Back</a>";
        }
    }
}else{
    echo "Please fill up the form";
}

