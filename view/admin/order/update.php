<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="flex min-h-screen bg-gray-100">
        <?php include '../../../layout/admin/header.php'; ?>
        <div class="w-[300px] mx-auto mt-10">
            <h2 class="text-2xl font-bold mt-8 mb-4">Cập nhật đơn hàng</h2>
            <form action="../../../controller/admin/manage-order.php" method="post">
                <?php
                require_once '../../../model/CoSoDuLieu.php';
                require_once '../../../model/DonHang.php';

                $id = 0;
                $ngay_tao = "";
                $gia_tien = 0;
                $tong = 0;
                $trang_thai = "";
                $dia_chi = "";
                $ghi_chu = "";
                $hinh_thuc = "";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $db = new CoSoDuLieu();
                $result = $db->query("select * from don_hang where id = $id");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $dh = $db->selectDonHang($row);
                    $ngay_tao = $dh->getNgayTao();
                    $gia_tien = $dh->getGiaTien();
                    $tong = $dh->getTongSanPham();
                    $trang_thai = $dh->getTrangThai();
                    $dia_chi = $dh->getDiaChi();
                    $ghi_chu = $dh->getGhiChu();
                    $hinh_thuc = $dh->getHinhThuc();
                    $ten_sp = [];
                    $id_sp = [];
                    $result_sp =
                        $db->query("select san_pham.id,san_pham.ten from san_pham , chi_tiet_don_hang where san_pham.id = chi_tiet_don_hang.id_san_pham and chi_tiet_don_hang.id_don_hang = $id");
                    while ($row_sp = mysqli_fetch_assoc($result_sp)) {
                        array_push($ten_sp, $row_sp['ten']);
                        array_push($id_sp, $row_sp['id']);
                    }
                }
                $db->NgatKetNoi();
                $giaStr = number_format($gia_tien, 0, ',', '.');
                echo
                "
             <div class='mb-4'>
    <div class='flex items-center space-x-4'>
    <label class='text-gray-700'>Trạng thái duyệt:</label>
    <select name='pay' class='w-40 p-2 border rounded-md text-gray-700'>
        <option value='approved'>Đã thanh toán</option>
        <option value='waiting' selected>Chưa thanh toán</option>
        <option value='out stock' selected>Hết hàng</option>

    </select>
</div>
            </div>
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Mã Đơn Hàng</label>
                <input type='text' value='$id' disabled class='w-full p-2 border rounded-md bg-gray-100 text-gray-600'>
            </div>

            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Ngày tạo</label>
                <input type='text' value='$ngay_tao' class='w-full p-2 border rounded-md'>
            </div>

            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Giá tiền</label>
                <input type='number' value='$gia_tien' class='w-full p-2 border rounded-md'>
            </div>
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Tổng sản phẩm</label>
                <input type='number' value='$tong' class='w-full p-2 border rounded-md'>
            </div>
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Địa chỉ</label>
                <input type='type' value='$dia_chi' class='w-full p-2 border rounded-md'>
            </div>
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Ghi chú</label>
                <input type='type' value='$ghi_chu' class='w-full p-2 border rounded-md'>
            </div>
            <!-- Hình Thức Thanh Toán -->
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Hình Thức Thanh Toán</label>
               <input type='text' value='$hinh_thuc'>
            </div>
            <input type='text' name='id_dh' value='$id' hidden>
             <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Chi tiết sản phẩm</label>";

                for ($i = 0; $i < count($ten_sp); $i++) {
                    echo "<a href='../../client/detail?id=" . $id_sp[$i] . "'>$ten_sp[$i]</a><br>";
                }

                echo "</div>
         <button id='filterBtn'
                    class='mt-5 mb-5 w-full h-[40px] bg-blue-500 text-white py-2 rounded-xl hover:bg-blue-600 transition-colors duration-300'>
                    Cập nhật
                </button>
            </form>"; ?>


        </div>
    </section>

    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>