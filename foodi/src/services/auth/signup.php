<?php
    session_start();

    //correct fields data
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    //show submission data
    // echo $username;
    // echo "<br>";
    // echo $email;
    // echo "<br>";
    // echo $password;
    // echo "<br>";
    // echo $confirm_password;

    //check if the username is empty
    if(empty($username) || empty($email) || empty($password) || empty($confirm_password)){
        $_SESSION['message'] =  "All fields are required.";
        header('location: ../../../auth-signup.php');
        exit();
    }
    