<?php 
    session_start(); 
    include './backend/get_users.php';
    // print_r($users);
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>PHP | CRUD</title>
</head>

<body>
    <?php
        if(isset($_SESSION['message'])) {
            ?>
                <div class="<?php echo $_SESSION['message'] == 'User created successfully!' ? 'bg-green-400' : 'bg-orange-400' ?> text-white w-[300px] fixed top-9 right-8 p-5 rounded-md shadow-lg">
                    <p><?=$_SESSION['message']?></p>
                </div>
            <?php
        }
        unset($_SESSION['message']);
    ?>
    

    <div class="h-[100vh] flex justify-center items-center">
        <div class="w-[100%] flex justify-center">
            <form action="./backend/create_user.php" method="POST" class="w-[60%] bg-gray-700 text- p-10 text-white rounded-md grid grid-cols-2 gap-5">
                <?php
                ?>
                <div class="grid gap-2">
                    <label for="">Username</label>
                    <input type="text" name="username" class="border-2 border-gray-400 rounded-md px-5 py-2" id="">
                </div>
                <div class="grid gap-2">
                    <label for="">Email</label>
                    <input type="text" name="email" class="border-2 border-gray-400 rounded-md px-5 py-2" id="">
                </div>
                <div class="grid gap-2">
                    <label for="">Phone number</label>
                    <input type="text" name="phone" class="border-2 border-gray-400 rounded-md px-5 py-2" id="">
                </div>
                <div class="col-span-2">
                    <button class="bg-gray-500 py-4 text-center rounded-md w-[100%] font-bold">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>