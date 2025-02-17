<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../src/img/title/logo.png" type="image/gif" sizes="16x16">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div id="root">
        <div class="content-wrapper max-w-screen-xl text-base mx-auto px-8">
            <?php include '../../layout/client/header.php'; ?>
            <?php
            require_once '../../model/SanPham.php';
            $ten = '';
            $ten_anh = '';
            $mo_ta = '';
            $gia_tien = 0;
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $connect = mysqli_connect('localhost', 'root', '141512', 'laptop_shop');
                    if (!$connect) {
                        die("error");
                        exit();
                    }
                    $sql = "select * from san_pham where id = $id";
                    $result = mysqli_query($connect, $sql);
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_assoc($result);
                        $sp = new SanPham();
                        $sp->setTen($row['ten']);
                        $sp->setTenAnh($row['ten_anh']);
                        $sp->setMoTa($row['mo_ta']);
                        $sp->setGiaTien($row['gia_tien']);
                        $ten = $sp->getTen();
                        $ten_anh = $sp->getTenAnh();
                        $mo_ta = $sp->getMoTa();
                        $gia_tien = $sp->getGiaTien();
                        $giaStr =
                            number_format($gia_tien, 0, ',', '.');
                    }
                }
            }
            ?>
            <main class="mt-20">
                <section class="py-12">
                    <div class="container mx-auto flex space-x-12">
                        <!-- Hình Ảnh Sản Phẩm -->
                        <?php
                        echo "<div class='w-[500px]'>
                                <img src='../../img/client/product/$ten_anh' alt='Sản phẩm' class='w-full h-auto rounded-lg shadow-lg'>
                            </div>
                           "; ?>

                        <!-- Chọn số lượng và Thêm vào giỏ hàng -->
                        <div class="mb-6">
                            <label for="quantity" class="text-lg font-medium text-gray-700">Số lượng:</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" class="mt-2 w-24 p-2 border border-gray-300 rounded-md">
                        </div>

                        <button class="bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 transition-all">
                            Thêm vào giỏ hàng
                        </button>

                        <!-- Đánh giá -->
                        <div class="mt-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Đánh giá</h2>
                            <div class="flex items-center space-x-2">
                                <span class="text-yellow-400">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                <span class="text-gray-700">(4/5)</span>
                            </div>
                            <p class="mt-2 text-gray-600">Rất tuyệt vời! Laptop này có hiệu suất tốt và giá thành hợp lý.</p>
                        </div>
                    </div>
        </div>
        </section>

        <!-- Sản phẩm liên quan -->
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto">
                <h2 class="text-3xl font-semibold text-gray-900 mb-8">Sản phẩm liên quan</h2>
                <div class="grid grid-cols-3 gap-8">
                    <div class="border rounded-lg p-4 shadow-md">
                        <img src="path_to_related_product_image.jpg" alt="Sản phẩm liên quan" class="w-full h-48 object-cover rounded-md mb-4">
                        <h3 class="text-xl font-medium text-gray-800">Laptop ABC</h3>
                        <p class="text-lg text-gray-600">15,000,000 VND</p>
                        <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-all">
                            Xem Chi Tiết
                        </button>
                    </div>
                    <!-- Các sản phẩm liên quan khác -->
                </div>
            </div>
        </section>
        </main>
    </div>

    <?php include '../../layout/client/footer.php'; ?>
    </div>

</body>

</html>