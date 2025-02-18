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
            <h1 class="text-2xl font-bold mb-4">Chi tiết sản phẩm</h1>
            <table class="min-w-full bg-white border border-gray-200">
                <tbody>
                    <?php
                    $id = 0;
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
                    require_once '../../../model/CoSoDuLieu.php';
                    require_once '../../../model/SanPham.php';
                    $db = new CoSoDuLieu();
                    $result = $db->query("select * from san_pham where id = $id");
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $sp = $db->selectSanPham($row);
                        $ten = $sp->getTen();
                        $gia = $sp->getGiaTien();
                        $id = $sp->getId();
                        $giaStr = number_format($gia, 0, ',', '.');
                        echo "<tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>ID:</td>
                    <td class='py-2 px-4'>$id</td>
                </tr>
                <tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>Tên:</td>
                    <td class='py-2 px-4'>$ten</td>
                </tr>
                <tr class='border-t'>
                    <td class='py-2 px-4 font-semibold'>Giá tiền:</td>
                    <td class='py-2 px-4'>$giaStr</td>
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