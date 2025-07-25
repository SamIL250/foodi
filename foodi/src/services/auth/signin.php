<?php
session_start();
include '../../../config/config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    $_SESSION['message'] = 'Username and password cannot be empty.';
    header('Location: ../../auth-signin.php');
    exit();
}

// Check if the user exists
$check_user = mysqli_query(
    $conn,
    "SELECT * FROM `users` WHERE username = '$username' AND password_hash = '$password'"
);
$is_logged_in = false;

$user_data = array();

if (mysqli_num_rows($check_user) > 0) {
    $is_logged_in = true;
    // print_r($check_user);
    foreach($check_user as $user) {
        // echo $user['username'];

        $_SESSION['user_data'] = array(
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'logged_in' => $is_logged_in
        );
    }

    $_SESSION['message'] = 'Login successful.';
    header('Location: ../../../index');
    exit();
}

if (!$is_logged_in) {
    $_SESSION['message'] = 'Invalid username or password.';
    header('Location: ../../../auth-signin.php');
    exit();
}
