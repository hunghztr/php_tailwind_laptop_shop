<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <section class="flex min-h-screen bg-gray-100">
        <?php include '../../../layout/admin/header.php'; ?>
        <div class="w-[400px] mx-auto mt-5 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Chi tiết người dùng</h1>
            <table class="min-w-full bg-white border border-gray-200">
                <tbody>
                    <?php
                    $id = 0;
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    require_once '../../../model/CoSoDuLieu.php';
                    require_once '../../../model/NguoiDung.php';
                    $db = new CoSoDuLieu();
                    $result = $db->query("select * from nguoi_dung where id = $id");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $nd = $db->selectNguoiDung($row);
                        $ten = $nd->getHoTen();
                        $email = $nd->getEmail();
                        $dia_chi = $nd->getDiaChi();
                        $vai_tro = $nd->getVaiTro();
                        echo "<tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>ID:</td>
                    <td class='py-2 px-4'>$id</td>
                </tr>
                <tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>Tên:</td>
                    <td class='py-2 px-4'>$ten</td>
                </tr>
                <tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>Email:</td>
                    <td class='py-2 px-4'>$email</td>
                </tr>
                <tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>Địa chỉ:</td>
                    <td class='py-2 px-4'>$dia_chi</td>
                </tr>
                <tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>Vai trò:</td>
                    <td class='py-2 px-4'>$vai_tro</td>
                </tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>