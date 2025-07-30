<?php
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );

    $users = [];

    $getUsers = mysqli_query($conn, "SELECT * FROM user_crud_ops");

    if($getUsers) {
        foreach($getUsers as $user) {
            $users[] = $user;
        }
    }

    // print_r($users);
