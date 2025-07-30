<?php
    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );

    $user_id = $_POST['user_id'] ?? '';
    $username =  $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    //check for empty fields
    if(empty($username) || empty($email) || empty($phone) || empty($user_id)) {
        $_SESSION['message'] = "All fields are required!";
        header('location: ../index.php');
        exit();
    }


    $updateUser = mysqli_query(
        $conn,
        "UPDATE user_crud_ops SET username = '$username', email = '$email', phone = '$phone' WHERE user_id = '$user_id'"
    );

    if($updateUser) {
        $_SESSION['message'] = "User updated successfully!";
        header('location: ../index.php');
        exit();
    } 

    $_SESSION['message'] = "Failed to update user!";
    header('location: ../index.php');
        
?>