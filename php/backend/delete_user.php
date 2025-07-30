<?php

    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );

    function redirectWithMessage($message) {
        $_SESSION['message'] = $message;
        header('location: ../index.php');
        exit();
    }


    $user_id = $_GET['user'];



    if(empty($user_id)) {
        redirectWithMessage("User ID is required!");
    }

    $deleteUser = mysqli_query(
        $conn,
        "DELETE FROM user_crud_ops WHERE user_id = '$user_id'"
    );

    if($deleteUser) {
        redirectWithMessage("User deleted successfully!");
    }

    redirectWithMessage("Failed to delete user!");
