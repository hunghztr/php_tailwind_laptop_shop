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
            require_once '../../model/CoSoDuLieu.php';
            $ten = '';
            $ten_anh = '';
            $mo_ta = '';
            $gia_tien = 0;
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $db = new CoSoDuLieu();
                    $sql = "select * from san_pham where id = $id";
                    $result = $db->query($sql);
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_assoc($result);
                        $sp = $db->selectSanPham($row);
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
                        <div class="">

                            <form action="../../controller/client/addToCart.php" method="get">
                                <div class="mt-[250px]">
                                    <label for="quantity" class="text-lg font-medium text-gray-700">Số lượng:</label>
                                    <input type="number" id="quantity" name="quantity" min="1" value="1" class="mt-2 w-24 p-2 border border-gray-300 rounded-md">
                                </div>
                                <button class="mt-[30px] bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 transition-all">
                                    Thêm vào giỏ
                                </button>
                                <?php echo "<input hidden value='$id' name='value'>" ?>
                            </form>
                        </div>

                        <?php
                        echo "<div class='mt-8'>
                            <h2 class='text-xl font-semibold text-gray-800 mb-4'>$ten</h2>
                            <p class='mt-2 text-gray-600 max-w-[350px]'>$mo_ta</p>
                        </div>";
                        ?>
                    </div>
                    <div class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Đánh giá</h2>
                        <div class="flex items-center space-x-2">
                            <span class="text-yellow-400">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                            <span class="text-gray-700">(4/5)</span>
                        </div>
                        <p class="mt-2 text-gray-600">Rất tuyệt vời! Laptop này có hiệu suất tốt và giá thành hợp lý.</p>
                    </div>
        </div>
        </section>
        <div
            class="rounded-full my-5 px-5 w-max bg-gradient-to-r from-[#f0f0f0] to-white p-2 cursor-pointer shadow-xl hover:shadow-2xl">
            <h3 class="font-semibold text-gray-500 text-xl uppercase hover:text-gray-800">sản phẩm liên quan</h3>
        </div>
        <div class="ml-4 grid grid-cols-4 gap-2 mb-7">
            <?php
            require_once '../../model/SanPham.php';
            require_once '../../model/CoSoDuLieu.php';
            $db = new CoSoDuLieu();
            $sql = "select * from san_pham";
            $result = $db->query($sql);
            $count = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sp = $db->selectSanPham($row);
                    $id = $sp->getId();
                    $ten_anh = $sp->getTenAnh();
                    $ten = $sp->getTen();
                    $gia = (int)$sp->getGiaTien();
                    $giaStr =
                        number_format($gia, 0, ',', '.');
                    echo "<div
                        class='border border-gray-400 max-w-56 bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300'>
                        <img class='w-full h-48 object-cover transition-transform duration-300 hover:scale-110'
                            src='../../img/client/product/$ten_anh' alt='Laptop Image'>
                        <div class='p-4'>
                            <h3 class='text-xl font-semibold text-gray-800'><a href='./detail.php?id=$id'>$ten</a></h3>
                            <p class='text-red-500 font-bold text-lg mt-2'>$giaStr đ</p>
                            <form action='../../controller/client/addToCart.php' method ='get'>
                            <input hidden value='$id' name='value'>
                            <button
                                class='mt-4 w-full bg-blue-500 text-white py-2 rounded-xl hover:bg-blue-600 transition-colors duration-300'>
                                Thêm vào giỏ hàng
                            </button>
                            </form>
                        </div>
                    </div>";
                    $count++;
                    if ($count == 4) {
                        break;
                    }
                }
            }
            $db->NgatKetNoi();
            ?>
        </div>
        </main>
    </div>

    <?php include '../../layout/client/footer.php'; ?>
    </div>

</body>

</html>