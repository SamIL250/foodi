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
                        <div class="<?php echo $current_page == 'menu-items.php' ? "bg-white text-gray-500" : '' ?> py-2 px-4  rounded-full">
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
                <a href="add-menu-item" class="rounded-full shadow-sm px-4 py-2 border border-gray-200">New menu item</a>
            </div>
             
        </div>
        <div class="container border border-gray-300 rounded-2xl overflow-hidden">

                    <table class="text-left w-full">
                        <thead class="bg-[whitesmoke] flex text-gray-500 w-full">
                            <tr class="flex w-full mb-4">
                                <th class="p-4 w-1/4">Name</th>
                                <th class="p-4 w-1/4">Description</th>
                                <th class="p-4 w-1/4">Price</th>
                                <th class="p-4 w-1/4">Quantity</th>
                                <th class="p-4 w-1/4">Ingredients</th>
                                <th class="p-4 w-1/4">Availability</th>
                            </tr>
                        </thead>
                    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                            <tr class="flex w-full mb-4">
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>
</html>