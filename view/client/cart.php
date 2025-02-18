<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
</head>

<body>
    <?php include '../../layout/client/header.php'; ?>
    <div class="main mt-28">
        <section class="bg-gray-100 py-12">
            <div class="max-w-6xl mx-auto px-4">
                <!-- Tiêu đề chính -->
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Giỏ hàng của bạn</h2>
                <!-- Danh sách sản phẩm trong giỏ -->
                <div class="bg-white shadow-lg rounded-2xl p-6">
                    <?php

                    require_once '../../model/CoSoDuLieu.php';
                    require_once '../../model/SanPham.php';
                    $tong = 0;
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $db = new CoSoDuLieu();
                        $result = $db->query("select * from gio_hang where id_nguoi_dung = $id");
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $id_gh = $row['id'];
                            $id_sp = 0;
                            $result = $db->query("select * from chi_tiet_gio_hang where id_gio_hang = $id_gh");
                            $arrayId = [];
                            $arraySl = [];
                            $array = [];

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    array_push($arrayId, $row['id_san_pham']);
                                    array_push($arraySl, $row['so_luong']);
                                }
                                for ($i = 0; $i < count($arrayId); $i++) {
                                    $result = $db->query("select * from san_pham where id = $arrayId[$i]");
                                    $row = mysqli_fetch_assoc($result);
                                    $sp = $db->selectSanPham($row);
                                    $sp->setSoLuong($arraySl[$i]);
                                    array_push($array, $sp);
                                }

                                foreach ($array as $a) {
                                    $id_sp = $a->getId();
                                    $ten_anh = $a->getTenAnh();
                                    $ten = $a->getTen();
                                    $gia = $a->getGiaTien();
                                    $so_luong = $a->getSoLuong();
                                    $giaStr =
                                        number_format($gia, 0, ',', '.');
                                    $tong = $tong + ($so_luong * $gia);
                                    echo "<div class='flex items-center justify-between border-b pb-4 mb-4'>
                                            <div class='flex items-center'>
                            <!-- Ảnh sản phẩm -->
                            <img src='../../img/client/product/$ten_anh' alt='Laptop 1'
                                class='w-24 h-24 object-cover rounded-lg mr-4'>

                            <!-- Thông tin sản phẩm -->
                            <div>
                                <h3 class='text-xl font-semibold text-gray-800'>$ten</h3>
                                <p class='text-gray-600'>Giá: $giaStr ₫</p>
                                <div class='flex items-center mt-2'>
                                    <button
                                        class='px-2 py-1 text-gray-600 border rounded-l hover:bg-gray-100'>-</button>
                                    <span class='px-4'>$so_luong</span>
                                    <button
                                        class='px-2 py-1 text-gray-600 border rounded-r hover:bg-gray-100'>+</button>
                                </div>
                            </div>
                        </div>
                        <!-- Xóa sản phẩm -->
                        <form action='../../controller/client/removeFromCart.php' method='get'>
                        <input type='text' name='id-sp' hidden value='$id_sp'>
                        <input type='text' name='sl' hidden value='$so_luong'>
                        <input type='text' name='id-ct' hidden value='$id_gh'>
                            <button class='text-red-500 hover:text-red-700 mr-[30px]'>
                                Xóa
                            </button>
                        </form>
                        </div>";
                                }
                            }
                        }
                        $db->NgatKetNoi();
                    }
                    ?>


                    <!-- Tổng tiền và nút Thanh toán -->
                    <div class="text-right mt-6">
                        <?php
                        $tongStr = number_format($tong, 0, ',', '.');
                        echo "<p class='text-xl font-semibold text-gray-800 mb-4'>Tổng tiền: $tongStr ₫</p>"; ?>
                        <form action="./pay.php" method="get">
                            <button
                                class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                                Thanh toán
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include '../../layout/client/footer.php'; ?>
</body>

</html>