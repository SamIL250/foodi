<?php
    include '../../../config/config.php';

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
    

    //check if the password and confirm password match
    if($password !== $confirm_password) {
        $_SESSION['message'] = "Password and Confirm Password do not match.";
        header('location: ../../../auth-signup.php');
        exit();
    }
    //check if the email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format.";
        header('location: ../../../auth-signup.php');
        exit();
    }

    //check if the username already exists
    $check_username = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE username = '$username'"
    );

    if(mysqli_num_rows($check_username) > 0){
        $_SESSION['message'] = "Username already exists.";
        header('location: ../../../auth-signup.php');
        exit();
    }

    //check if the email already exists
    $check_email = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email = '$email'"
    );
    if(mysqli_num_rows($check_email) > 0){
        $_SESSION['message'] = "Email already exists.";
        header('location: ../../../auth-signup.php');
        exit();
    }

//generate uuid of user with 30 chars
$uuid = bin2hex(random_bytes(15)); // 30 characters long

//register user
$create_user = mysqli_query(
    $conn,
    "INSERT INTO users (user_id, username, email, password_hash) VALUES ('$uuid', '$username', '$email', '$password')"
);

if($create_user){
    $_SESSION['message'] = "You've been registered successfully, Sign In.";
    header('location: ../../../auth-signin.php');
    exit();
} else {
    $_SESSION['message'] = "User registration failed. Please try again.";
    header('location: ../../../auth-signup.php');
    exit();
}