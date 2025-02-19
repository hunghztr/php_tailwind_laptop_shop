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
    <div class="main mt-[100px] mb-[100px]">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full mx-auto">
            <!-- Thông tin cá nhân -->
            <?php
            $id = 0;
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
            }
            require_once '../../model/CoSoDuLieu.php';
            require_once '../../model/DonHang.php';
            require_once '../../model/ChiTietDonHang.php';
            require_once '../../model/SanPham.php';
            $db = new CoSoDuLieu();
            $result = $db->query("select * from don_hang where id_nguoi_dung = $id");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $dh = $db->selectDonHang($row);
                    $id_dh = $dh->getId();
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
                        $db->query("select san_pham.id,san_pham.ten from san_pham , chi_tiet_don_hang where san_pham.id = chi_tiet_don_hang.id_san_pham and chi_tiet_don_hang.id_don_hang = $id_dh");
                    while ($row_sp = mysqli_fetch_assoc($result_sp)) {
                        array_push($ten_sp, $row_sp['ten']);
                        array_push($id_sp, $row_sp['id']);
                    }

                    echo "<h2 class='text-2xl font-bold text-center mt-5 mb-2'>Đơn hàng</h2>

            <form>
            <!-- Mã Đơn Hàng -->
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Mã Đơn Hàng</label>
                <input type='text' value='$id_dh' disabled class='w-full p-2 border rounded-md bg-gray-100 text-gray-600'>
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
                <label class='block text-gray-600 text-sm text-blue-400 font-semibold mb-1'>Hình Thức Thanh Toán</label>
               <input type='text' value='$hinh_thuc'>
            </div>

            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-bold mb-1'>Trạng thái</label>
                <input type='text' value='$trang_thai' disabled class='text-blue-400 w-full font-bold p-2 border rounded-md bg-gray-100'>
            </div>
            <div class='mb-4'>
                <label class='block text-gray-600 text-sm font-semibold mb-1'>Chi tiết sản phẩm</label>";

                    for ($i = 0; $i < count($ten_sp); $i++) {
                        echo "<a href='./detail?id=" . $id_sp[$i] . "'>$ten_sp[$i]</a><br>";
                    }

                    echo "</div>
        </form>";
                }
            }
            ?>

        </div>
    </div>
    <?php include '../../layout/client/footer.php'; ?>
</body>

</html>