<?php
session_start();
include '../../../config/config.php';

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];


// Validate inputs
if (empty($username) || empty($email)) {
    $_SESSION['error_message'] = "Please fill in all fields.";
    header('location: ../../../profile');
    exit();
}

//CHECK if user isn't already in db
$checkUser = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE username = '$username' AND email = '$email'"
);

if (mysqli_num_rows($checkUser) > 0) {
    $_SESSION['error_message'] = "User with these credentials already exists. Try again";
    header('location: ../../../profile');
    exit();
}

// Update user data
$updateProfile = mysqli_query(
    $conn,
    "UPDATE users SET username = '$username', email = '$email' WHERE user_id = '$user_id'"
);


if ($updateProfile) {
    $_SESSION['user_data']['username'] = $username;
    $_SESSION['user_data']['email'] = $email;
    $_SESSION['error_message'] = "Profile updated successfully.";
    header('location: ../../../profile');
    exit();
} else {
    $_SESSION['error_message'] = "Failed to update profile. Please try again.";
    header('location: ../../../profile');
    exit();
}
