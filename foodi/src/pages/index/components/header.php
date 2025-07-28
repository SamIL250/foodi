<div class="grid grid-cols-2">
    <div class="">
        <div class="py-20">
            <p class="text-[50px] font-bold max-w-[500px]">
                <?php
                    if ($_SESSION['name']) {
                        echo $_SESSION['name'];
                    }
                ?>
                into Delights Of Delectable <span class="text-green-400">Food</span></p>
            <p class="my-7 max-w-[500px] text-gray-500">Where Each Plate Weaves a Story of Culinary Mastery and Passionate Craftsmanship</p>
            <div class="flex items-center gap-5">
                <div>
                    <button class="bg-green-400 text-white rounded-full px-5 py-2 shadow-lg shadow-green-200">Ordernow</button>
                </div>
                <div>
                    <button class=" rounded-full px-5 py-2 flex items-center gap-5 text-gray-500">Watch Video
                        <span class="p-3 rounded-full shadow-lg"><img src="./src/assets/play.png" class="w-[25px]" alt=""></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center">
        <div class="relative">
            <span class="animate-bounce absolute bg-white shadow-md rounded-l-full rounded-t-full px-4 py-2 left-[-120px] top-10 " style="z-index: 3;">
                Hot Spicy Food 🌶️
            </span>
            <div class="w-[350px] h-[350px] relative bg-green-400 rounded-full">
                <img src="./src/assets/header.png" class="w-[100%] absolute top-[-40px]" alt="">
            </div>
            <div class="grid grid-cols-2 gap-10 mt-[-30px]">
                <div class="shadow-lg shadow-gray-300 rounded-lg p-2 bg-white flex items-center" style="z-index: 2;">
                    <div class="grid grid-cols-12">
                        <div class="col-span-4 flex items-center">
                            <div class="p-8 bg-gray-200 rounded-md"></div>
                        </div>
                        <div class="col-span-8 p-3 grid gap-1">
                            <p class="font-bold text-sm">Spicy noodles</p>
                            <!-- //rating stars -->
                            <div class="flex gap-2">
                                <img src="./src/assets/star.png" class="w-[15px]" alt="">
                                <img src="./src/assets/star.png" class="w-[15px]" alt="">
                                <img src="./src/assets/star.png" class="w-[15px]" alt="">
                                <img src="./src/assets/star (1).png" class="w-[15px]" alt="">
                                <img src="./src/assets/star (1).png" class="w-[15px]" alt="">
                            </div>
                            <div>
                                <p class="font-bold text-gray-400"><span class="text-red-400 text-[12px]">$</span>18.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg shadow-gray-300 rounded-lg p-2 bg-white flex items-center" style="z-index: 2;">
                    <div class="grid grid-cols-12">
                        <div class="col-span-4 flex items-center">
                            <div class="p-8 bg-gray-200 rounded-md"></div>
                        </div>
                        <div class="col-span-8 p-3 grid gap-1">
                            <p class="font-bold text-sm">Spicy noodles</p>
                            <!-- //rating stars -->
                            <div class="flex gap-2">
                                <img src="./src/assets/star.png" class="w-[15px]" alt="">
                                <img src="./src/assets/star.png" class="w-[15px]" alt="">
                                <img src="./src/assets/star.png" class="w-[15px]" alt="">
                                <img src="./src/assets/star (1).png" class="w-[15px]" alt="">
                                <img src="./src/assets/star (1).png" class="w-[15px]" alt="">
                            </div>
                            <div>
                                <p class="font-bold text-gray-400"><span class="text-red-400 text-[12px]">$</span>18.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>