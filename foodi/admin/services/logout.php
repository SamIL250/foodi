<?php
    session_start();
    unset($_SESSION['admin_data']);
    $_SESSION['message'] = 'You\'ve been logged out!';
    header('location:../login.php');