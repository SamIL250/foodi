<?php
    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );


    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    function redirectWithErrorMessage($message) {
        $_SESSION['message'] = $message;
        header('location:../login.php');
        exit();
    }

    function redirectWithSuccessMessage($message) {
        $_SESSION['message'] = $message;
        header('location:../index.php');
        exit();
    }

    if(empty($email) || empty($password)) {
        redirectWithErrorMessage("All fields are required!");
    }

    //check for admin credentials
    $checkUser = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND roles = 'admin'"
    );

    if(mysqli_num_rows($checkUser) > 0) {
        $_SESSION['admin_data'] = [];
        $username = "";
        foreach($checkUser as $data) {
            $username = $data['username'];
            $_SESSION['admin_data'] = [
                'admin_id' => $data['user_id'],
                'email' => $email
            ];
        }

        redirectWithSuccessMessage("Welcome back ". $username);
    }

    redirectWithErrorMessage("Incorrect email or password!");

    
