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
            <h2 class="text-2xl font-bold mt-8 mb-4">Thêm Sản Phẩm Mới</h2>
            <form action="../../../controller/admin/manage-product.php" method="post" enctype="multipart/form-data">


                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Tên</label>
                    <input type="text" id="name" name="name"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập tên sản phẩm" required>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Mô tả</label>
                    <input type="text" id="desc" name="desc"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập mô tả" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Số lượng trong kho</label>
                    <input type="number" id="size" name="size"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập số lượng" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Giá tiền</label>
                    <input type="number" id="price" name="price"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nhập giá" required>
                </div>
                <!-- file ảnh -->
                <div class="mb-4">
                    <label for="" class="block text-gray-700 font-medium mb-2">File ảnh</label>
                    <input type="file" id="img" name="img" accept="image/*"
                        class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>


                <div class="mb-6">
                    <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Danh mục</label>
                    <select name="factory" id="factory">
                        <option value="asus">Asus</option>
                        <option value="dell">Dell</option>
                        <option value="macbook">Macbook</option>
                        <option value="lenovo">Lenovo</option>
                    </select>
                </div>
                <div class="text-red-600"><?php echo "$mes"; ?></div>
                <!-- Nút Tạo -->
                <button type="submit"
                    class="mb-5 w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                    Tạo
                </button>
                <input type="text" name='tao' value='tao' hidden>
            </form>
        </div>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>