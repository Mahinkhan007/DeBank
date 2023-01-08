<?php

include 'con.php';

if ( isset( $_POST['login'] ) ) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";

    if ($conn) {
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            if( $email = $row['email'] && $password = md5($row['password']) ){
                // die(var_dump($row));
                session_start();
                $_SESSION['user'] = $row;
                header("Location: loginpage.php");
            }else{
                echo "Invalid email or password <br> <a href='index.html/#Signin'>Login Again</a>";
            }
        }else{
            echo "Invalid email or password <br> <a href='index.html/#Signin'>Login Again</a>";
        }
    }

}else{
    echo "Please fill up the form";
}
