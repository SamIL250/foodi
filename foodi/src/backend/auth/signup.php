<?php  
    session_start();

    include '../../../config/config.php';

    

    //correct data
    $username =  $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    //check for empty fields
    if(empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error_message'] = "Please fill in all fields.";
        header('location: ../../../auth-signup');
        exit();
    }

    //check if passwords match
    if( $password !== $confirm_password){
        $_SESSION['error_message'] = "Passwords do not match.";
        header('location: ../../../auth-signup');
        exit();
    }

    //check if username already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result =  mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "Username already exists.";
        header('location: ../../../auth-signup');
        exit();
    } 

    //check if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format.";
        header('location: ../../../auth-signup');
        exit();
    }

    //check if email already exists
    $emailExistsQuery = "SELECT * FROM users WHERE email = '$email'";
    $emailExistsResult = mysqli_query($conn, $emailExistsQuery);
    if(mysqli_num_rows($emailExistsResult) > 0) {
        $_SESSION['error_message'] = "Email already exists.";
        header('location: ../../../auth-signup');
        exit();
    }

    //generate UUID of 35 Chars
    $uuid = bin2hex(random_bytes(15));


    //create the user
    $createUserQuery = "INSERT INTO users(user_id, username, email, password) 
    VALUES('$uuid', '$username', '$email', '$password')";
    $createUserResult = mysqli_query($conn, $createUserQuery);

    if($createUserResult) {
        $_SESSION['success_message'] = "Your account has been created successfully. You can now sign in.";
        header('location: ../../../auth-signin');
        exit();
    } else {
        $_SESSION['error_message'] = "Failed to create user. Please try again.";
        header('location: ../../../auth-signup');
        exit();
        
    }

 
    
