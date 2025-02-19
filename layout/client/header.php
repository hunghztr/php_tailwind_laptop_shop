<script src="https://cdn.tailwindcss.com"></script>
<?php
session_start();
?>
<header class="p-6 mx-auto z-50 fixed top-0 left-0 right-0 shadow-md bg-white">
    <nav class="flex flex-row justify-between items-center relative">
        <div class="text-center text-xl font-semibold logo basis-2/6 lg:basis-3/6 cursor-pointer">
            <a href="./index.php">Laptop Shop.</a>
        </div>

        <ul id="top-menu"
            class="basis-3/6 lg:basis-1/6 hidden lg:flex lg:items-center lg:justify-end lg:gap-8 uppercase text-sm text-gray-500 font-medium">
            <li class="py-1 hover:text-gray-800 relative after:lg:absolute after:lg:bottom-0 after:lg:left-0 after:lg:bg-slate-600 after:lg:h-0.5 after:lg:w-0 hover:after:lg:w-full after:lg:transition-all after:lg:ease-in-out after:lg:duration-300"><a href="./index.php">Home</a></li>
            <li class="py-1 hover:text-gray-800 relative after:lg:absolute after:lg:bottom-0 after:lg:left-0 after:lg:bg-slate-600 after:lg:h-0.5 after:lg:w-0 hover:after:lg:w-full after:lg:transition-all after:lg:ease-in-out after:lg:duration-300"><a href="./product.php">Products</a></li>
            <li class="py-1 hover:text-gray-800 relative after:lg:absolute after:lg:bottom-0 after:lg:left-0 after:lg:bg-slate-600 after:lg:h-0.5 after:lg:w-0 hover:after:lg:w-full after:lg:transition-all after:lg:ease-in-out after:lg:duration-300"><a href="./about.php">About</a></li>
            <li class="py-1 hover:text-gray-800 relative after:lg:absolute after:lg:bottom-0 after:lg:left-0 after:lg:bg-slate-600 after:lg:h-0.5 after:lg:w-0 hover:after:lg:w-full after:lg:transition-all after:lg:ease-in-out after:lg:duration-300"><a href="./contact.php">Contact</a></li>
        </ul>
        <ul class="basis-3/6 ml-16 uppercase font-medium w-20 flex justify-end">
            <li class="py-1 hover:text-gray-800 relative after:lg:absolute after:lg:bottom-0 after:lg:left-0 after:lg:bg-slate-600 after:lg:h-0.5 after:lg:w-0 hover:after:lg:w-full after:lg:transition-all after:lg:ease-in-out after:lg:duration-300">
                <?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    echo "<a href='./cart.php'>";
                } ?>
                <svg data-slot="icon" class="w-5 h-5 inline-block" fill="none" stroke-width="1"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z">
                    </path>
                </svg>
                <span>Cart</span>
                </a>
            </li>

            <li class="py-1 hover:text-gray-800 relative after:lg:absolute after:lg:bottom-0 after:lg:left-0 after:lg:bg-slate-600 after:lg:h-0.5 after:lg:w-0 hover:after:lg:w-full after:lg:transition-all after:lg:ease-in-out after:lg:duration-300 ml-3"><a id='login' href="./login.php">
                    <svg class="w-5 h-5 inline-block" data-slot="icon" fill="none" stroke-width="1.5"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                        </path>
                    </svg>
                    <?php

                    if (isset($_SESSION['name'])) {
                        $name = $_SESSION['name'];
                        echo "<button id='dropBtn'>$name</button>
         <div id='dropdownMenu' class='hidden group-hover:block w-[200px] absolute right-0 bg-white border rounded-md shadow-lg'>
            <a href='../../view/client/account.php' class='w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'>Xem thông tin cá nhân</a>
             <a href='../../view/client/order.php' class='w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'>Xem đơn hàng</a>
             <a href='../../controller/client/logout.php' class='w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100'>Đăng xuất</a>
         </div>";
                    } else {
                        echo "<span>Login</span>";
                    }
                    ?>
                </a>

            </li>
        </ul>
        <div id="menu-button" class="lg:hidden basis-1/7 cursor-pointer flex justify-end ml-5">
            <svg class="custom-icon" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25"></path>
            </svg>
        </div>
    </nav>
    <?php

    if (isset($_SESSION['name'])) {
        echo "<script> const login = document.getElementById('login');
             login.addEventListener('click', (e) => {
                 e.preventDefault();
             })</script>";
    }
    ?>
    <script>
        const dropBtn = document.getElementById('dropBtn')
        dropBtn.addEventListener('click', (e) => {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        })
    </script>
</header>