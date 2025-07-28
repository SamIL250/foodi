<!-- //header -->
<div class="w-[100%] py-6 px-32 bg-[whitesmoke] my-10 rounded-2xl">
    <div class="">
        <div class="flex items-end gap-5">
            <img src="./src/assets/profile-user.png" width="100px" alt="">
            <p class="text-[30px] font-bold text-gray-300">
                <?php
                    echo $_SESSION['user_data']['email'];
                ?>
            </p>
        </div>
    </div>
    <div>
    </div>

</div>
<div class="px-32 py-10">
    <div>
        <form action="./src/backend/profile/edit_profile.php" method="POST" class=" w-[100%] grid gap-5">
           <div class="<?php echo $_SESSION['error_message'] ?? '' == 'Profile updated successfully.' ? 'text-green-400' : 'text-red-400' ?>">
                <?php
                    echo $_SESSION['error_message'] ?? '';
                    unset($_SESSION['error_message']); 
                ?>
           </div>
           <div class="flex justify-center">
                <input type="hidden" value="<?=$_SESSION['user_data']['user_id'] ?>" placeholder="Username" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="user_id" id="" required>
            </div>
            <div class="flex justify-center">
                <input type="text" value="<?=$_SESSION['user_data']['username'] ?>" placeholder="Username" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="username" id="" required>
            </div>
            <div class="flex justify-center">
                <input type="text" value="<?=$_SESSION['user_data']['email'] ?>" placeholder="email" class="border-1 border-gray-300 rounded-full px-5 py-3 w-[90%]" name="email" id="" required>
            </div>
            
            <div class="px-13 flex justify-between items-center">
                <button class="bg-green-400 rounded-full text-white px-10 py-2">Update Profile</button>
                <a href="" class="text-red-400">Change password</a>
            </div>
        </form>
    </div>
</div>