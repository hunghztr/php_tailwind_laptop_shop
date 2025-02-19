<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../../img/client/logo/logo.png" type="image/gif" sizes="16x16">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    $mess = "";
    if (isset($_GET['value'])) {
        $mess = $_GET['value'];
    }
    ?>
    <section class="flex items-center justify-center min-h-screen bg-gray-200">
        <div class="w-96 p-8 bg-white rounded-2xl shadow-lg">
            <!-- Tiêu đề -->
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Đăng nhập</h2>

            <!-- Form đăng nhập -->
            <form action="../../controller/client/login.php" method="post">
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập email của bạn" required>
                </div>

                <!-- Mật khẩu -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Mật khẩu</label>
                    <input type="password" id="password" name="password"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập mật khẩu của bạn" required>
                </div>
                <div class="text-gray-600 py-2"><?php echo "$mess" ?></div>

                <div class="text-right mb-4">
                    Bạn chưa có tài khoản?<a href="./register.php" class="text-blue-600 hover:underline">Đăng kí
                        ngay</a>
                </div>

                <!-- Nút Đăng nhập -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                    Đăng nhập
                </button>
            </form>
        </div>
    </section>

</body>

</html>