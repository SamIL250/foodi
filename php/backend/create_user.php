<?php
    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );

    $username =  $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    //check for empty fields
    if(empty($username) || empty($email) || empty($phone)) {
        $_SESSION['message'] = "All fields are required!";
        header('location: ../index.php');
        exit();
    }

    //check if the username already exists
    $checkForExistingData = mysqli_query(
        $conn,
        "SELECT * FROM user_crud_ops WHERE email = '$email' OR username = '$username' OR phone = '$phone'"
    );

    if(mysqli_num_rows($checkForExistingData) > 0) {
        $_SESSION['message'] = "User already exists!";
        header('location: ../index.php');
        exit();
    }


    $createUser = mysqli_query(
        $conn,
        "INSERT INTO user_crud_ops(username, email, phone)
        VALUES('$username', '$email', '$phone')"
    );

    if($createUser) {
        $_SESSION['message'] = "User created successfully!";
        header('location: ../index.php');
        exit();
    } 

    $_SESSION['message'] = "Failed to create user!";
    header('location: ../index.php');
        
?>