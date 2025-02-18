<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    session_start();


    if (!isset($_SESSION['vai_tro']) || $_SESSION['vai_tro'] != 'ADMIN') {
        echo "403 Access Denied, bạn không có quyền hạn để truy cập tài nguyên này!";
        exit();
    }
    ?>
    <section class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <?php include '../../../layout/admin/header.php'; ?>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Tiêu đề -->
            <div class="flex justify-between">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Quản lý sản phẩm</h2>
                <a href="./create.php" class="font-bold mt-2 text-lg text-blue-500">Tạo Mới</a>
            </div>
            <!-- Bảng dữ liệu -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Tên sản phẩm</th>
                            <th class="py-3 px-6 text-left">Giá tiền</th>
                            <th class="py-3 px-6 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../../model/CoSoDuLieu.php';
                        require_once '../../../model/SanPham.php';
                        $db = new CoSoDuLieu();
                        $result = $db->query("select * from san_pham");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sp = $db->selectSanPham($row);
                                $id = $sp->getId();
                                $ten = $sp->getTen();
                                $gia = $sp->getGiaTien();
                                $giaStr =
                                    number_format($gia, 0, ',', '.');
                                echo "<tr class='border-b hover:bg-gray-100'>
                                        <td class='py-3 px-6'>$id</td>
                                        <td class='py-3 px-6'>$ten</td>
                                        <td class='py-3 px-6'>$giaStr</td>
                                        <td class='py-3 px-6 text-center space-x-2'>
                                        <a href='./show.php?id=$id' class='text-blue-600 hover:underline'>Xem</a>
                                        <a href='./update?id=$id' class='text-yellow-600 hover:underline'>Sửa</a>
                                        <a href='./delete?id=$id' class='text-red-600 hover:underline'>Xóa</a>
                            </td>
                        </tr>";
                            }
                        }
                        $db->NgatKetNoi();
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>