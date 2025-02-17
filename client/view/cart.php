<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body>
    <?php include '../layout/header.php'; ?>
    <div class="main mt-28">
        <section class="bg-gray-100 py-12">
            <div class="max-w-6xl mx-auto px-4">
                <!-- Tiêu đề chính -->
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Giỏ hàng của bạn</h2>

                <!-- Danh sách sản phẩm trong giỏ -->
                <div class="bg-white shadow-lg rounded-2xl p-6">
                    <!-- Sản phẩm 1 -->
                    <div class="flex items-center justify-between border-b pb-4 mb-4">
                        <div class="flex items-center">
                            <!-- Ảnh sản phẩm -->
                            <img src="https://via.placeholder.com/100" alt="Laptop 1"
                                class="w-24 h-24 object-cover rounded-lg mr-4">

                            <!-- Thông tin sản phẩm -->
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Laptop ASUS XYZ</h3>
                                <p class="text-gray-600">Giá: 20,000,000₫</p>
                                <div class="flex items-center mt-2">
                                    <button
                                        class="px-2 py-1 text-gray-600 border rounded-l hover:bg-gray-100">-</button>
                                    <span class="px-4">1</span>
                                    <button
                                        class="px-2 py-1 text-gray-600 border rounded-r hover:bg-gray-100">+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Xóa sản phẩm -->
                        <button class="text-red-500 hover:text-red-700">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 6L18 18M6 18L18 6"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Sản phẩm 2 (Copy và chỉnh sửa tương tự nếu cần) -->
                    <div class="flex items-center justify-between border-b pb-4 mb-4">
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/100" alt="Laptop 2"
                                class="w-24 h-24 object-cover rounded-lg mr-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Laptop Dell ABC</h3>
                                <p class="text-gray-600">Giá: 25,000,000₫</p>
                                <div class="flex items-center mt-2">
                                    <button
                                        class="px-2 py-1 text-gray-600 border rounded-l hover:bg-gray-100">-</button>
                                    <span class="px-4">2</span>
                                    <button
                                        class="px-2 py-1 text-gray-600 border rounded-r hover:bg-gray-100">+</button>
                                </div>
                            </div>
                        </div>
                        <button class="text-red-500 hover:text-red-700">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 6L18 18M6 18L18 6"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Tổng tiền và nút Thanh toán -->
                    <div class="text-right mt-6">
                        <p class="text-xl font-semibold text-gray-800 mb-4">Tổng tiền: 70,000,000₫</p>
                        <button
                            class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                            Thanh toán
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include '../layout/footer.php'; ?>
</body>

</html>