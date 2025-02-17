<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    session_start();


    if (!isset($_SESSION['vai_tro']) || $_SESSION['vai_tro'] != 'ADMIN') {
        echo "403 Access Denied, bạn không có quyền hạn để truy cập tài nguyên này!";
        exit();
    }
    ?>
    <section class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-white shadow-lg">
            <h2 class="text-2xl font-bold text-center py-6">Admin Trang chủ</h2>
            <nav class="space-y-4">
                <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Quản lý người
                    dùng</a>
                <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Quản lý sản
                    phẩm</a>
                <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-blue-100 hover:text-blue-600">Quản lý đơn
                    hàng</a>
            </nav>
        </aside>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Tiêu đề -->
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Quản lý người dùng</h2>

            <!-- Bảng dữ liệu -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Tên người dùng</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Người dùng 1 -->
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-6">1</td>
                            <td class="py-3 px-6">Nguyễn Văn A</td>
                            <td class="py-3 px-6">nguyenvana@example.com</td>
                            <td class="py-3 px-6 text-center space-x-2">
                                <button class="text-blue-600 hover:underline">Xem</button>
                                <button class="text-yellow-600 hover:underline">Sửa</button>
                                <button class="text-red-600 hover:underline">Xóa</button>
                            </td>
                        </tr>
                        <!-- Người dùng 2 -->
                        <tr class="border-b hover:bg-gray-100">
                            <td class="py-3 px-6">2</td>
                            <td class="py-3 px-6">Trần Thị B</td>
                            <td class="py-3 px-6">tranthib@example.com</td>
                            <td class="py-3 px-6 text-center space-x-2">
                                <button class="text-blue-600 hover:underline">Xem</button>
                                <button class="text-yellow-600 hover:underline">Sửa</button>
                                <button class="text-red-600 hover:underline">Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </section>

</body>

</html>