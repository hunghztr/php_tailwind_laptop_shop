<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../../img/client/logo/logo.png" type="image/gif" sizes="16x16">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include '../../layout/client/header.php'; ?>
    <div class="main mt-[100px] mb-[100px]">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-md w-full mx-auto">
            <!-- Ảnh đại diện -->
            <div class="flex justify-center mb-4">
                <img src="../../img/client/logo/avt.png" alt="Avatar" class="w-32 h-32 rounded-full border-4 border-blue-500">
            </div>
            <!-- Thông tin cá nhân -->
            <?php
            $id = $_SESSION['id'];
            require_once '../../model/CoSoDuLieu.php';
            require_once '../../model/NguoiDung.php';
            $db = new CoSoDuLieu();
            $result = $db->query("select * from nguoi_dung where id = $id");
            $row = mysqli_fetch_assoc($result);
            $nd = $db->selectNguoiDung($row);
            $ten = $nd->getHoTen();
            $email = $nd->getEmail();
            $dia_chi = $nd->getDiaChi();
            $vai_tro = $nd->getVaiTro();
            echo "<h2 class='text-2xl font-bold text-center mb-2'>$ten</h2>
            <p class='text-center text-gray-600 mb-4'>Thành viên</p>

            <div class='space-y-2'>
                <div class='flex justify-between'>
                    <span class='font-semibold text-gray-700'>Email:</span>
                    <span class='text-gray-800'>$email</span>
                </div>
                <div class='flex justify-between'>
                    <span class='font-semibold text-gray-700'>Địa chỉ:</span>
                    <span class='text-gray-800'>$dia_chi</span>
                </div>
                <div class='flex justify-between'>
                    <span class='font-semibold text-gray-700'>Vai trò:</span>
                    <span class='text-gray-800'>$vai_tro</span>
                </div>
            </div>";
            ?>
        </div>
    </div>
    <?php include '../../layout/client/footer.php'; ?>
</body>

</html>