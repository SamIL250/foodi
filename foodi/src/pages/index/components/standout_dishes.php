<div>
    <div class="flex justify-between items-end">
        <div>
            <p class="text-red-400">SPECIAL DISHES</p>
            <p class="text-[35px] font-bold max-w-[300px]">Standout Dishes From Our Menu</p>
        </div>
        <div class="flex gap-10 items-center">
            <div class="bg-gray-200 rounded-full p-5">
                <img src="./src/assets/left-arrow.png" class="w-[20px]" alt="">
            </div>
            <div class="bg-green-400 rounded-full p-5">
                <img src="./src/assets/right-arrow.png" class="w-[20px]" alt="">
            </div>
        </div>
    </div>


    <div class="px-20 my-20">
        <div class="grid grid-cols-3 gap-6">
            <?php
                $getMenuItems = mysqli_query(
                    $conn,
                    "SELECT * FROM menu_items"
                );

                foreach($getMenuItems as $item) {
                    ?>  
                        <div class="shadow-lg shadow-gray-200 py-3 px-10 rounded-[20px] relative border border-gray-200 ">
                            <div class="bg-green-400 p-3 absolute top-0 right-0 rounded-bl-[20px] rounded-tr-[20px]">
                                <img src="./src/assets/heart.png" class="w-[20px]" alt="">
                            </div>
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
                            <div class="my-5">
                                <a href="
                                <?php 
                                    if(isset($_SESSION['user_data'])) {
                                        echo './src/backend/cart/new_cart.php';
                                        
                                    } else {
                                        echo "auth-signin";
                                    }
                                ?>
                                " class="rounded-full bg-green-400 text-white shadow-sm px-4 py-2 border border-gray-200">Add to cart</a>
                            </div>
                        </div>
                    <?php
                }
            ?>

            
            
        </div>
    </div>
</div>