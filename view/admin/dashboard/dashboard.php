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
        <?php include '../../../layout/admin/header.php';
        $dau = "";
        $cuoi = "";
        if (isset($_GET['date-dau'], $_GET['date-cuoi'])) {
            $dau = $_GET['date-dau'];
            $cuoi = $_GET['date-cuoi'];
        }
        ?>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Tiêu đề -->
            <div class="flex justify-between">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Thống kê doanh thu</h2>
                <form class="mb-4 mx-auto  p-6 rounded-lg shadow-md flex gap-8" action="" method="get">
                    <input type="date" id="date" name="date-dau"
                        class="mt-4 px-2 border border-gray-300 rounded-lg  w-full h-[40px] focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <input type="date" id="date" name="date-cuoi"
                        class="mt-4 px-2 border border-gray-300 rounded-lg  w-full h-[40px] focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <button type="submit"
                        class="mt-4 mb-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg w-full">
                        Lọc
                    </button>
                </form>
            </div>

            <!-- Bảng dữ liệu -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-6 text-left">Tổng doanh thu</th>
                            <th class="py-3 px-6 text-left">Tổng sản phẩm đã bán</th>
                            <th class="py-3 px-6 text-left">Số lượng người mua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../../model/CoSoDuLieu.php';
                        $db = new CoSoDuLieu();
                        $sql = "select sum(gia_tien),sum(tong_san_pham),count(id_nguoi_dung) from don_hang";
                        if ($dau != "" && $cuoi != "") {
                            $sql = $sql . " where ngay_tao between '$dau' and '$cuoi'";
                        }
                        $result = $db->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $tien = 0;
                                if (isset($row['sum(gia_tien)'])) {
                                    $tien = $row['sum(gia_tien)'];
                                }
                                $tien_str = number_format($tien, 0, '', '.');
                                $sp = $row['sum(tong_san_pham)'];
                                $nd = $row['count(id_nguoi_dung)'];
                                echo "<tr class='border-b hover:bg-gray-100'>
                                        <td class='py-3 px-6'>$tien_str</td>
                                        <td class='py-3 px-6'>$sp</td>
                                        <td class='py-3 px-6'>$nd</td>
                                        <td class='py-3 px-6 text-center space-x-2'>
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