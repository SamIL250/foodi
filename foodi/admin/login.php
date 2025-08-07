<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body>
    <div class="py-32 flex items-center justify-center">
        <div class=" p-10 min-w-[40%] rounded-3xl shadow-sm border-1 border-gray-300 flex justify-center items-center flex-col gap-5">
            <form action="./services/login.php" method="POST" class=" w-[100%] grid gap-5">
            <div class="text-red-400">
                    <?php
                        echo $_SESSION['message'] ?? '';
                        unset($_SESSION['message']); 
                    ?>
                </div>
                <div class="flex justify-center">
                    <input type="email" placeholder="example@gmail.com" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="email" id="">
                </div>
                <div class="flex justify-center">
                    <input type="password" placeholder="password" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="password" id="">
                </div>
                
                <div class="px-8 flex justify-between items-center">
                    <button class="bg-green-400 rounded-full text-white px-10 py-2">Sign In</button>
                    <p>Forgot password</p>
                </div>
                <div class="px-8">
                    <!-- <p class="text-gray-400">Don't have an account <a href="auth-signup" class="text-green-400">Sign Up</a></p> -->
                </div>
            </form>
        </div>  
    </div>
</body>
</html>