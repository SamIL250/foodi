<?php
    session_start();
    include '../../../config/config.php';

    $user = $_GET['user'];
    $cart_item = $_GET['item'];

    function redirectWithMessage($message) {
        $_SESSION['message'] = $message;
        header('location:../../../cart');
        exit();
    }

    //remove cart item
    $removeItem =  mysqli_query(
        $conn,
        "DELETE FROM cart WHERE user = '$user' AND item = '$cart_item'"
    );

    if($removeItem) {
        redirectWithMessage("Item removed from cart");
    }

    redirectWithMessage("Failed to remove item");