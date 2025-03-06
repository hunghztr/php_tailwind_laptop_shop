<script src="https://cdn.tailwindcss.com"></script>
<aside class="w-1/4 bg-gray-200 shadow-xl">
    <div class="relative flex">
        <h2 class="text-2xl font-bold text-center py-6">Admin Trang chủ</h2>
        <a href="../../../controller/client/logout.php" class="mt-7 ml-7">
            Đăng xuất<svg data-slot="icon" class="inline-block w-5 h-5" fill="none" stroke-width="1" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"></path>
            </svg>
        </a>
    </div>
    <nav class="space-y-4">
        <a href="../dashboard/dashboard.php" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Thống kê doanh
            thu</a>
        <a href="../user/manage-user.php" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Quản lý người
            dùng</a>
        <a href="../product/manage-product.php" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Quản lý sản
            phẩm</a>
        <a href="../order/manage-order.php" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Quản lý đơn
            hàng</a>
    </nav>
</aside>