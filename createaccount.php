<?php

include 'con.php';

if ( isset( $_POST['create_account'] ) ) {
    $f_name   = $_POST['f_name'];
    $l_name   = $_POST['l_name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $phone    = $_POST['phone'];
    $username = $_POST['username'];
    $password = md5($password);

    
    // insert into table
    if ($conn) {
        // fetch user with same username or email
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if ($user['username'] === $username) {
                echo "Username already exists <a href='/#Signup'>Go Back</a>";
            }
            if ($user['email'] === $email) {
                echo "Email already exists <a href='/#Signup'>Go Back</a>";
            }
        }else{
            // insert into table
            $sql = "INSERT INTO users (f_name, l_name, email, password, phone, username, balance) VALUES ('$f_name', '$l_name', '$email', '$password', '$phone', '$username', '0')";

            $result = mysqli_query($conn, $sql);
            header("Location: index.html/#Signin");
        }
    }
}else{
    echo "Please fill up the form <a href='index.html/#Signup'>Go Back</a>";
}
