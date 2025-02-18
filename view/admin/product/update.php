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
            <h2 class="text-2xl font-bold mt-8 mb-4">Cập nhật sản phẩm</h2>
            <form action="../../../controller/admin/manage-product.php" method="post">
                <?php
                require_once '../../../model/CoSoDuLieu.php';
                require_once '../../../model/SanPham.php';
                $mes = "";
                if (isset($_GET['value'])) {
                    $mes = $_GET['value'];
                }
                $id = 0;
                $ten = "";
                $mo_ta = "";
                $gia = "";
                $so_luong = "";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $db = new CoSoDuLieu();
                $result = $db->query("select * from san_pham where id = $id");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $sp = $db->selectSanPham($row);
                    $ten = $sp->getTen();
                    $mo_ta = $sp->getMoTa();
                    $gia = $sp->getGiaTien();
                    $so_luong = $sp->getSoLuong();
                }
                $db->NgatKetNoi();
                $giaStr = number_format($gia, 0, ',', '.');
                ?>

                <div class='mb-4'>
                    <label for='email' class='block text-gray-700 font-medium mb-2'>Tên</label>
                    <?php
                    echo "<input type='text' id='name' name='name'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập tên sản phẩm' required value='$ten'>";
                    ?>
                </div>
                <div class='mb-4'>
                    <label for='name' class='block text-gray-700 font-medium mb-2'>Mô tả</label>
                    <?php
                    echo "<input type='text' id='desc' name='desc'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập mô tả' required value='$mo_ta'>";
                    ?>
                </div>
                <div class='mb-4'>
                    <label for='address' class='block text-gray-700 font-medium mb-2'>Giá tiền</label>
                    <?php
                    echo "<input type='text' id='price' name='price'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập địa chỉ của bạn' required value='$giaStr'>";
                    ?>
                </div>
                <div class='mb-4'>
                    <label for='address' class='block text-gray-700 font-medium mb-2'>Số lượng</label>
                    <?php
                    echo "<input type='number' id='size' name='size'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập địa chỉ của bạn' required value='$so_luong'>";
                    ?>
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
                <?php echo "<div class='text-red-600'>$mes</div>"; ?>
                <!-- Nút cập nhật -->
                <button type='submit'
                    class='w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300'>
                    Cập nhật
                </button>
                <?php echo "<input type='text' name='id' value='$id' hidden>"; ?>
                <input type='text' name='sua' value='sua' hidden>
            </form>
        </div>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>