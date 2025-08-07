<?php
    $cart_items = [];

    $getItems = mysqli_query(
        $conn,
        "SELECT * FROM cart 
        INNER JOIN menu_items ON cart.item = menu_items.item_id
        WHERE user = '{$_SESSION['user_data']['user_id']}'"
    );

    foreach($getItems as $items) {
        $cart_items[] = $items;
    }
?>

<div class="py-20">
    <div class="grid grid-cols-3 gap-6">
            <?php

                foreach($cart_items as $item) {
                    ?>  
                        <div class="shadow-lg shadow-gray-200 py-3 px-10 rounded-[20px] relative border border-gray-200 ">
                             
                            <div class="flex justify-center mb-7">
                                <img src='<?php echo $item["image__url"] ?>'  class="w-[200px]" alt="<?=$item['image__url']?>">
                            </div>
                            <div class="mb-3">
                                <p class="font-bold"><?=$item['item_name']?></p>
                                <small class="text-gray-400 mt-3"><?=$item['description']?></small>
                            </div>
                            <div class="flex justify-between">
                                <p class="font-bold"><span class="text-[12px] text-red-400">$</span><?=$item['price']?></p>
                                <div class="flex items-center gap-2">
                                    <img src="./src/assets/star.png" class="w-[20px]" alt="">
                                    <small>4.2</small>
                                </div>
                            </div>
                            <div>
                                <form action="" method="">
                                    <input type="number" min="1" value="<?=$item['cart_quantity']?>" />
                                </form>
                            </div>
                            <div class="my-5">
                                <a href="
                                <?php 
                                    if(isset($_SESSION['user_data'])) {
                                        echo "./src/backend/cart/remove_cart_item.php?user={$_SESSION['user_data']['user_id']}&item={$item['item_id']}";
                                    
                                    } else {
                                        echo "auth-signin";
                                    }
                                ?>
                                " class="rounded-full bg-red-400 text-white shadow-sm px-4 py-2 border border-gray-200">Remove from cart</a>
                            </div>
                        </div>
                    <?php
                }
            ?>

            
            
        </div>

</div>