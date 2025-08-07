<?php
    session_start();
    include '../../../config/config.php';

    $user = $_GET['user'];
    $cart_item = $_GET['item'];
    $cart_id = bin2hex(random_bytes(15));
    // echo "User: ".$user;
    // echo "<br>";
    // echo "Item: ".$cart_item;
    // echo "<br>";
    // echo "Cart id: ".$cart_id;

    function redirectWithMessage($message) {
        $_SESSION['message'] = $message;
        header('location:../../../index');
        exit();
    }

    //validate
    if(empty($user) || empty($cart_item)) {
        redirectWithMessage("All url params are required!");
    }

    //check of cart item is already in the cart with the same user
    $checkCart = mysqli_query(
        $conn,
        "SELECT * FROM cart WHERE item = '$cart_item' AND user = '$user'"
    ); 

    if(mysqli_num_rows($checkCart) > 0) {
        //update cart quantity

        $cartRow = mysqli_fetch_array($checkCart);

        $initial_value = $cartRow['cart_quantity'];
        $current_cart_id = $cartRow['cart_id'];

        $new_value = $initial_value + 1;


        $updateQuantity = mysqli_query(
            $conn,
            "UPDATE cart SET cart_quantity = '$new_value' WHERE cart_id = '$current_cart_id'"
        );

        if($updateQuantity) {
            // echo "Initial quantity: ".$initial_value;
            // echo "<br>";
            // echo "New quantity: ". $new_value;

            // exit();
            redirectWithMessage("Cart Quantity updated");
        }

        redirectWithMessage("Failed to update cart quantity!");
    }

    //add to cart
    $addToCart =  mysqli_query(
        $conn,
        "INSERT INTO `cart`(`cart_id`, `user`, `item`) 
        VALUES ('$cart_id','$user','$cart_item')"
    );

    if($addToCart) {
        redirectWithMessage("Item added to cart");
    }

    redirectWithMessage("Failed to add item in cart!");
