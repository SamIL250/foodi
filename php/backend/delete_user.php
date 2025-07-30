<?php

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );


    $user_id = $_GET['user'];



    if(empty($user_id)) {
        echo "User ID is required!";
        exit();
    }

    $deleteUser = mysqli_query(
        $conn,
        "DELETE FROM user_crud_ops WHERE user_id = '$user_id'"
    );

    if($deleteUser) {
        echo "User deleted successfully!";
        exit();
    }
