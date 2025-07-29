<?php
    session_start();
    include '../../../config/config.php';

    $user_id = $_POST['user_id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password']; 


    $getCurrentPasswordQuery = mysqli_query(
        $conn,
        "SELECT password FROM users WHERE user_id = '$user_id'"
    );

    $current_password_db = "";

    foreach($getCurrentPasswordQuery as $pass) {
        $current_password_db = $pass['password'];
    }   

    //compare current password and password in db
