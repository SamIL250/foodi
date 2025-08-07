<?php
    session_start();
    if(!isset($_SESSION['admin_data'])) {
        $_SESSION['message'] = "Un authorized access, please login.";
        header('location: login.php');
        exit();
    }

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'foodi'
    );


    $current_page = basename($_SERVER['PHP_SELF']);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <div class="w-[100%] grid grid-cols-12">
        <div class="col-span-3 p-4 bg-green-400 min-h-[100vh] max-h-[100vh] px-10">
            <div class="py-10 grid gap-3">
                <!-- //round circle -->
                <div class="w-[50px] h-[50px] rounded-full bg-white"></div>

                <p class="text-2xl font-light text-white"><?=$_SESSION['admin_data']['email']?></p>
            </div>

            <!-- //navigation links -->
            <div class="grid gap-3 text-white">
                <div>
                    <a href="index">
                        <div class="<?php echo $current_page == 'index.php' ? "bg-white text-gray-500" : '' ?> py-2 px-4  rounded-full     ">
                            Dashboard 
                        </div>
                    </a>
                </div>
                <div>
                    <a href="menu-items">
                        <div class="<?php echo $current_page == 'menu-items.php' || $current_page == 'add-menu-item.php' ? "bg-white text-gray-500" : '' ?> py-2 px-4  rounded-full">
                            Menu Items
                        </div>
                    </a>
                </div>
                <div>
                    <a href="clients">
                        <div class=" py-2 px-4 text-white rounded-full">
                            Clients
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-span-9 p-4 px-10 overflow-x-scroll max-h-[100vh]">
        <div class="flex justify-end">
            <a href="./services/logout.php" class="border-2 border-gray-200 px-5 py-2 bg-green-400 text-white font-bold rounded-full">Logout</a>
        </div>
        <p class="text-2xl font-bols text-gray-400">Menu items</p>
        <div class="my-20 flex items-center justify-between">
            <div></div>
            <div>
                <a href="" class="rounded-full shadow-sm px-4 py-2 border border-gray-200">New menu item</a>
            </div>
             
        </div>
        <?php
            if(isset($_SESSION['message'])) {
                if($_SESSION['message'] == 'Menu item created successfuly!') {
                    ?>  
                        <div class="border-2 border-green-400 bg-green-200 text-green-700 rounded-lg px-5 py-3 mb-10"><?=$_SESSION['message']?></div>
                    <?php
                } else {
                    ?>
                        <div class="border-2 border-red-400 bg-red-200 text-red-700 rounded-lg px-5 py-3 mb-10"><?=$_SESSION['message']?></div>
                    <?php
                }
            }

            unset($_SESSION['message']);
        ?>
        
        <div class="container border border-gray-300 rounded-2xl overflow-hidden py-10">

            <form action="./services/add-menu.php" method="POST" class=" w-[100%] grid gap-5 grid grid-cols-2 gap-4">
               
                <div class="flex justify-center">
                    <input type="text" placeholder="menu item name" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="item_name" id="">
                </div>
                <div class="flex justify-center">
                    <input type="number" placeholder="price" min="0" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="price" id="">
                </div>
                <div class="flex justify-center">
                    <input type="number" placeholder="quantity" min="0" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="quantity" id="">
                </div>
                <div class="flex justify-center">
                    <input type="text" placeholder="ingredients" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="ingredients" id="">
                </div>
                <div class="flex justify-center">
                    <input type="text" placeholder="image url" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="image_url" id="">
                </div>
                <div class="flex justify-center">
                    <select name="instock" id="" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]">
                        <option value="" selected hidden>Select availability</option>
                        <option value="1">In stock</option>
                        <option value="0">Out ouf Stock</option>
                    </select> 
                </div>
                <div class="flex justify-center col-span-2">
                    <textarea name="description" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" placeholder="Description" id=""></textarea>
                </div>
                <div class="px-8 flex justify-between items-center">
                    <button class="bg-green-400 rounded-full text-white px-10 py-2">Save Menu</button>

                </div>
                
            </form> 
            
        </div>
    </div>
</body>
</html>