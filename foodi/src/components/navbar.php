<div class="flex items-center justify-between sticky w-[100%] top-0 bg-white z-22222">
    <!-- //logo -->
    <p class="text-[30px] font-bold"><span class="bg-green-400 text-white px-2 rounded-lg mr-2">F</span>OODI</p>

    <!-- //links -->
    <div class="flex gap-10 text-sm">
        <a href="index">Home</a>
        <a href="">Menu</a>
        <a href="">Service</a>
        <a href="">Offers</a>
        <?php
        if (isset($_SESSION['user_data'])) {
            if ($_SESSION['user_data']['is_logged_in']) {
                echo "<a href='profile'>Profile</a>";
                echo "<a href='cart'>Cart</a>";
            }
        } else {
            echo '<a href="auth-signin">Sign In</a>';
            
        }
        ?>

    </div>

    <!-- //actions buttons         -->
    <div class="flex gap-10">
        <i class="bi bi-search"></i>
        <span class="relative">
            <i class="bi bi-bag"></i>
            <span class="absolute top-0 right-[-5px] text-[9px] flex items-center justify-center font-bold text-white bg-green-400 h-[15px] w-[15px] rounded-full">
                <?php
                    echo mysqli_fetch_array(mysqli_query(
                        $conn,
                        "SELECT COUNT(cart_id) as cart_count FROM cart WHERE user = '{$_SESSION['user_data']['user_id']}'"
                    ))['cart_count'];
                ?>
            </span>
        </span>
        <a href="auth-signin">
            <?php
            if (isset($_SESSION['user_data'])) {
                if ($_SESSION['user_data']['is_logged_in']) {
            ?>
                    <a href="./src/backend/auth/signout.php">
                        <div class="rounded-full bg-green-400 px-4 flex items-center gap-2 text-sm py-2 text-white">
                            <!-- <img src="./assets/phone-call.png" class="w-[20px]" alt=""> -->
                            Sign Out
                        </div>
                    </a>
                <?php
                }
            } else {
                ?>
                <a href="auth-signin">
                    <div class="rounded-full bg-green-400 px-4 flex items-center gap-2 text-sm py-2 text-white">
                    <!-- <img src="./assets/phone-call.png" class="w-[20px]" alt=""> -->
                    Sign In
                </div>
                </a>
            <?php
            }

            ?>

        </a>
    </div>
</div>