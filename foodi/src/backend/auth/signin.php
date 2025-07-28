<?php
session_start();
include '../../../config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Check for empty fields
if (empty($username) || empty($password)) {
    $_SESSION['error_message'] = "Please fill in all fields.";
    header('location: ../../../auth-signin');
    exit();
}

// Check if username exists
$checkUserQuery = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE username = '$username' AND password = '$password'"
);

if(mysqli_num_rows($checkUserQuery) === 0) {
    $_SESSION['error_message'] = "Incorrect username or password.";
    header('location: ../../../auth-signin');
    exit();
}

// Fetch user data
$user_id = "";
$email = "";
$user_name = "";
$is_logged_in = false;
$_SESSION['user_data'] = [];

foreach($checkUserQuery as $row){
    $user_id = $row['user_id'];
    $email = $row['email'];
    $user_name = $row['username'];
    $is_logged_in = true;

    $_SESSION['user_data'] = [
        'user_id' => $user_id,
        'email' => $email,
        'username' => $user_name,
        'is_logged_in' => $is_logged_in
    ];
}

//go back to home page
header('location: ../../../index');
