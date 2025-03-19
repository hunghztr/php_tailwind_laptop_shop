<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include '../../layout/client/header.php'; ?>
    <div class="main mt-28">
        <section class="bg-gray-100 py-12">
            <div class="max-w-6xl mx-auto px-4">
                <!-- Tiêu đề chính -->
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Đơn hàng của bạn</h2>
                <!-- Danh sách sản phẩm trong giỏ -->
                <div class="bg-white shadow-lg rounded-2xl p-6 flex">
                    <?php
                    $id = 0;
                    if (isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                    }
                    require_once '../../model/CoSoDuLieu.php';
                    require_once '../../model/SanPham.php';
                    require_once '../../model/NguoiDung.php';
                    $db = new CoSoDuLieu();

                    $result = $db->query("select * from nguoi_dung where id = $id");
                    $row = mysqli_fetch_assoc($result);
                    $nd = $db->selectNguoiDung($row);
                    $ten = $nd->getHoTen();
                    $dia_chi = $nd->getDiaChi();

                    $tong = 0;
                    if (isset($_POST['sum'])) {
                        $tong = $_POST['sum'];
                    }
                    $tongStr = number_format($tong, 0, ',', '.');
                    ?>
                    <div class="w-[500px]">
                        <form action="../../controller/client/pay.php" method="post">
                            <!-- Họ Tên -->
                            <div class="mb-4">
                                <label class="block mb-2 font-semibold text-gray-700">Họ và Tên</label>
                                <?php echo "<input type='text' name='name' class='border p-2 w-full rounded-lg' placeholder='Nhập họ tên' value='$ten'>"; ?>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="mb-4">
                                <label class="block mb-2 font-semibold text-gray-700">Địa chỉ</label>
                                <?php echo "<input type='text' name='address' class='border p-2 w-full rounded-lg' placeholder='Nhập địa chỉ' required value='$dia_chi'>"; ?>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-2 font-semibold text-gray-700">Ghi chú</label>
                                <input type="text" name="note" class="border p-2 w-full rounded-lg" placeholder="Nhập ghi chú">
                            </div>
                            <!-- Hình thức -->
                            <div class="mb-4">
                                <label class="block mb-2 font-semibold text-gray-700">Hình thức</label>
                                <select name="type" id='type' class="border p-2 w-full rounded-lg">
                                    <option value="offline">Thanh toán khi nhận hàng</option>
                                    <option value="online">Thanh toán vnpay</option>
                                </select>
                            </div>

                            <!-- Tổng tiền và nút Thanh toán -->
                            <div class="text-right mt-6">
                                <?php

                                echo "<p class='text-xl font-semibold text-gray-800 mb-4'>Tổng tiền: $tongStr ₫</p>
                                <input type='number' name='price' value='$tong' hidden>"; ?>
                                <button
                                    class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                                    Thanh toán
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include '../../layout/client/footer.php'; ?>
</body>

</html>