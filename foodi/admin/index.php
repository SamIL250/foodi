<?php
    session_start();
    if(!isset($_SESSION['admin_data'])) {
        $_SESSION['message'] = "Un authorized access, please login.";
        header('location: login.php');
        exit();
    }

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
                        <div class=" py-2 px-4  rounded-full <?php echo $current_page == 'index.php' ? "bg-white text-gray-500" : '' ?>    ">
                            Dashboard 
                        </div>
                    </a>
                </div>
                <div>
                    <a href="menu-items">
                        <div class="<?php echo $current_page == 'menu-items.php' ? "bg-white text-gray-500" : '' ?> py-2 px-4 rounded-full">
                            Menu Items
                        </div>
                    </a>
                </div>
                <div>
                    <a href="clients">
                        <div class=" py-2 px-4 rounded-full">
                            Clients
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-span-9 p-4 px-10">
        <div class="flex justify-end">
            <a href="./services/logout.php" class="border-2 border-gray-200 px-5 py-2 bg-green-400 text-white font-bold rounded-full">Logout</a>
        </div>
        <p class="text-2xl font-bols text-gray-400">Dashboard</p>
        <div class="grid grid-cols-4 gap-5 my-20">
            <div class="border border-gray-300 p-4  rounded-3xl hover:shadow-sm">
                <p class="font-light text-[30px] text-green-500">23</p>
                <p class="font-bols text-gray-400">Orders</p>
            </div>
            <div class="border border-gray-300 p-4  rounded-3xl hover:shadow-sm">
                <p class="font-light text-[30px] text-green-500">23</p>
                <p class="font-bols text-gray-400">Orders</p>
            </div>
            <div class="border border-gray-300 p-4  rounded-3xl hover:shadow-sm">
                <p class="font-light text-[30px] text-green-500">23</p>
                <p class="font-bols text-gray-400">Orders</p>
            </div>
            <div class="border border-gray-300 p-4  rounded-3xl hover:shadow-sm">
                <p class="font-light text-[30px] text-green-500">23</p>
                <p class="font-bols text-gray-400">Orders</p>
            </div>
        </div>
        </div>
    </div>
</body>
</html>