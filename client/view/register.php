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
    $message = "";
    if (isset($_GET['value'])) {
        $message = $_GET['value'];
    }
    ?>
    <div class="main">
        <section class="flex items-center justify-center min-h-screen bg-gray-200 py-3">
            <div class="mt-4 w-full max-w-md p-8 bg-white rounded-2xl shadow-lg">
                <!-- Tiêu đề -->
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Đăng ký</h2>

                <!-- Form đăng ký -->
                <form action="../controller/register.php" method="post">

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

                    <!-- Xác nhận mật khẩu -->
                    <div class="mb-6">
                        <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Xác nhận mật
                            khẩu</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <div class="text-red-600"><?php echo "$message" ?></div>
                    <!-- Nút Đăng ký -->
                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                        Đăng ký
                    </button>

                    <!-- Link Đăng nhập -->
                    <p class="text-center text-gray-600 mt-4">
                        Đã có tài khoản?
                        <a href="./login.php" class="text-blue-600 hover:underline">Đăng nhập</a>
                    </p>
                </form>
            </div>
        </section>

    </div>
</body>

</html>