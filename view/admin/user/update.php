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
            <h2 class="text-2xl font-bold mt-8 mb-4">Cập nhật người dùng</h2>
            <form action="../../../controller/admin/manage-user.php" method="post">
                <?php
                require_once '../../../model/CoSoDuLieu.php';
                require_once '../../../model/NguoiDung.php';
                $mes = "";
                if (isset($_GET['value'])) {
                    $mes = $_GET['value'];
                }
                $id = 0;
                $email = "";
                $ten = "";
                $dia_chi = "";
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                $db = new CoSoDuLieu();
                $result = $db->query("select * from nguoi_dung where id = $id");
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $nd = $db->selectNguoiDung($row);
                    $email = $nd->getEmail();
                    $ten = $nd->getHoTen();
                    $dia_chi = $nd->getDiaChi();
                }
                $db->NgatKetNoi();

                ?>
                <!-- Email -->
                <div class='mb-4'>
                    <label for='email' class='block text-gray-700 font-medium mb-2'>Email</label>
                    <?php
                    echo "<input type='email' id='email' name='email'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập email của bạn' required value='$email'>";
                    ?>
                </div>
                <div class='mb-4'>
                    <label for='name' class='block text-gray-700 font-medium mb-2'>Họ Tên</label>
                    <?php
                    echo "<input type='text' id='name' name='name'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập Tên của bạn' required value='$ten'>";
                    ?>
                </div>
                <div class='mb-4'>
                    <label for='address' class='block text-gray-700 font-medium mb-2'>Địa chỉ</label>
                    <?php
                    echo "<input type='text' id='address' name='address'
                        class='w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500'
                        placeholder='Nhập địa chỉ của bạn' required value='$dia_chi'>";
                    ?>
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