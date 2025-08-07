<?php
    session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );


    $name = htmlspecialchars($_POST['item_name']);
    $price = htmlspecialchars($_POST['price']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $instock = htmlspecialchars($_POST['instock']);
    $description = htmlspecialchars($_POST['description']);
    $image_url = htmlspecialchars($_POST['image_url']);

    function redirectWithMessage($message) {
        $_SESSION['message'] = $message;
        header('location: ../add-menu-item');
        exit();
    }

    if(empty($name) || empty($price) || empty($quantity) || empty($ingredients) || empty($instock) || empty($description) || empty($image_url)) {
        redirectWithMessage("All fields are required!");
    }
    

    $uuid = bin2hex(random_bytes(15));

    //create menu item
    $createMenuItem = mysqli_query(
        $conn,
        "INSERT INTO `menu_items`(`item_id`, `item_name`, `description`, `price`, `quantity`, `ingredients`, `image__url`, `available`) 
        VALUES ('$uuid','$name','$description','$price','$quantity','$ingredients', '$image_url',  '$instock')"
    );

    if($createMenuItem) {
        redirectWithMessage("Menu item created successfuly!");
    }

    redirectWithMessage(
        "Failed to add the menu item, Try again!"
    );
