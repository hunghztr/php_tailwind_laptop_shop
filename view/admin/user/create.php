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
    $mes = "";
    if (isset($_GET['value'])) {
        $mes = $_GET['value'];
    }
    ?>
    <section class="flex min-h-screen bg-gray-100">
        <?php include '../../../layout/admin/header.php'; ?>
        <div class="w-[300px] mx-auto mt-10">
            <h2 class="text-2xl font-bold mt-8 mb-4">Thêm Người Dùng Mới</h2>
            <form action="../../../controller/admin/manage-user.php" method="post">

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập email của bạn" required>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Họ Tên</label>
                    <input type="text" id="name" name="name"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập Tên của bạn" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Địa chỉ</label>
                    <input type="text" id="address" name="address"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập địa chỉ của bạn" required>
                </div>
                <!-- Mật khẩu -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Mật khẩu</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Tạo mật khẩu" required>
                </div>

                <!-- Vai trò -->
                <div class="mb-6">
                    <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Vai trò</label>
                    <select name="role" id="role">
                        <option value="USER">Người dùng</option>
                        <option value="ADMIN">Quản trị viên</option>
                    </select>
                </div>
                <div class="text-red-600"><?php echo "$mes"; ?></div>
                <!-- Nút Tạo -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                    Tạo
                </button>
                <input type="text" name='tao' value='tao' hidden>
            </form>
        </div>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>