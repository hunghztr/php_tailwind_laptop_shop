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
        $dau = "2000-01-01";
        $cuoi = date("Y-m-d");
        $fac = "";
        if (isset($_GET['date-dau'], $_GET['date-cuoi'])) {
            $dau = $_GET['date-dau'];
            $cuoi = $_GET['date-cuoi'];
        }
        if (isset($_GET['cb-fac'])) {
            $fac = $_GET['cb-fac'];
        }
        ?>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Tiêu đề -->
            <div class="flex justify-between">

                <form class="mb-4 mx-auto  p-6 rounded-lg shadow-md flex gap-8" action="" method="get">
                    <select name="cb-fac" class="h-[40px] mt-4" id="">
                        <option value="all">Tất cả</option>
                        <option value="asus">Asus</option>
                        <option value="dell">Dell</option>
                        <option value="lenovo">Lenovo</option>
                        <option value="macbook">Macbook</option>
                    </select>

                    <input type="date" id="date" name="date-dau"
                        class="mt-4 px-2 border border-gray-300 rounded-lg  w-full h-[40px] focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <input type="date" id="date" name="date-cuoi"
                        class="mt-4 px-2 border border-gray-300 rounded-lg  w-full h-[40px] focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <button type="submit"
                        class="mt-4 mb-4 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg w-full">
                        Lọc
                    </button>
                </form>
                <form action="../../../controller/admin/export.php" method="post"
                    class="mb-4 mx-auto  p-6 rounded-lg shadow-md flex gap-8" id="exportForm">
                    <input type="hidden" name="data" id="data">
                    <button type="submit"
                        class="mt-4 mb-4 bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-lg w-full">
                        Xuất File
                    </button>
                </form>
            </div>

            <!-- Bảng dữ liệu -->
            <div class="overflow-x-auto">

                <?php
                require_once '../../../model/CoSoDuLieu.php';
                $db = new CoSoDuLieu();
                if ($fac == "all") {
                    $sql = "select sum(gia_tien),sum(tong_san_pham),count(id_nguoi_dung) from don_hang";
                    if ($dau != "" && $cuoi != "") {
                        $sql = $sql . " where ngay_tao between '$dau' and '$cuoi'";
                    }
                    $result = $db->query($sql);
                    echo "<table class='min-w-full bg-white shadow-md rounded-lg'>
                    <thead class='bg-gray-200'>
                        <tr>
                            <th class='py-3 px-6 text-left'>Tổng doanh thu</th>
                            <th class='py-3 px-6 text-left'>Tổng sản phẩm đã bán</th>
                            <th class='py-3 px-6 text-left'>Số lượng người mua</th>
                        </tr>
                    </thead>
                    <tbody>";
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $tien = 0;
                            if (isset($row['sum(gia_tien)'])) {
                                $tien = $row['sum(gia_tien)'];
                            }
                            $tien_str = number_format($tien, 0, '', '.');
                            $sp = $row['sum(tong_san_pham)'];
                            $nd = $row['count(id_nguoi_dung)'];
                            echo "
                    <tr class='border-b hover:bg-gray-100'>
                                        <td class='py-3 px-6'>$tien_str</td>
                                        <td class='py-3 px-6'>$sp</td>
                                        <td class='py-3 px-6'>$nd</td>
                                        <td class='py-3 px-6 text-center space-x-2'>
                            </td>
                        </tr>
                        ";
                        }
                    }
                    echo "</tbody>
                </table>";
                } else {
                    $sql = "select * from san_pham where danh_muc = '$fac' and so_luong < 100";
                    $result = $db->query($sql);
                    $tong_tien = 0;
                    $tong_sp = 0;
                    $ten = "";
                    echo "<table class='min-w-full bg-white shadow-md rounded-lg'>
                    <thead class='bg-gray-200'>
                        <tr>
                            <th class='py-3 px-6 text-left'>Tổng doanh thu</th>
                            <th class='py-3 px-6 text-left'>Số sản phẩm đã bán</th>
                            <th class='py-3 px-6 text-left'>Tên sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>";
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $gia = $row['gia_tien'];
                            $so_luong = $row['so_luong'];
                            $tong_sp += (100 - $so_luong);
                            $tong_tien += ($gia * (100 - $so_luong));
                            $ten = $row['ten'];
                            echo "
                    <tr class='border-b hover:bg-gray-100'>
                                        <td class='py-3 px-6'>$tong_tien</td>
                                        <td class='py-3 px-6'>$tong_sp</td>
                                        <td class='py-3 px-6'>$ten</td>
                                        <td class='py-3 px-6 text-center space-x-2'>
                            </td>
                        </tr>
                        ";
                        }
                    }
                    echo "</tbody>
                </table>";
                }
                $db->NgatKetNoi();
                ?>

            </div>
        </main>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>
<script>
    document.getElementById('exportForm').addEventListener('submit', function() {
        let table = document.querySelector("table").outerHTML;
        document.getElementById("data").value = table;
    });
</script>

</html>