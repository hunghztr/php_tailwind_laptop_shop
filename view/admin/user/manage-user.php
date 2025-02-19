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
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Quản lý người dùng</h2>
                <?php
                $limit = 8;
                $offset = 0;
                $page = 0;
                $text = "";
                if (isset($_GET['next'])) {
                    $page = $_GET['next'];
                }
                if (isset($_GET['pre'])) {
                    $page = $_GET['pre'];
                }
                if ($page < 0) {
                    $page = 0;
                }
                $offset = $limit * $page;
                if (isset($_GET['search'])) {
                    $text = $_GET['search'];
                }
                ?>
                <form action="./manage-user.php" method="get" class="mt-2 flex">
                    <button id="filterBtn"
                        class="mr-2 w-[130px] h-[40px] bg-blue-500 text-white py-2 rounded-xl hover:bg-blue-600 transition-colors duration-300">
                        Tìm kiếm
                    </button>
                    <input type="text" name='search' id="search" placeholder="Tìm theo email"
                        class="w-full mb-4 p-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                </form>
                <a href="./create.php" class="font-bold mt-2 text-lg text-blue-500">Tạo Mới</a>
            </div>
            <!-- Bảng dữ liệu -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Tên người dùng</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../../../model/CoSoDuLieu.php';
                        require_once '../../../model/NguoiDung.php';
                        $db = new CoSoDuLieu();
                        $sql = "select * from nguoi_dung";
                        if ($text != "") {
                            $sql = $sql . " where email like '%$text%' limit $limit offset $offset";
                        } else {
                            $sql = $sql . " limit $limit offset $offset";
                        }
                        $result = $db->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $nd = $db->selectNguoiDung($row);
                                $id = $nd->getId();
                                $ten = $nd->getHoTen();
                                $email = $nd->getEmail();
                                echo "<tr class='border-b hover:bg-gray-100'>
                                        <td class='py-3 px-6'>$id</td>
                                        <td class='py-3 px-6'>$ten</td>
                                        <td class='py-3 px-6'>$email</td>
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
                <div class="flex justify-center space-x-4 mt-4">
                    <!-- Nút Trước -->
                    <a href="?pre=<?php $pre = $page - 1;
                                    echo "$pre"; ?>"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-xl hover:bg-gray-400">
                        <
                            </a>

                            <!-- Hiển thị trang hiện tại -->
                            <span class="px-4 py-2 bg-blue-500 text-white rounded-xl">
                                Trang <?php $cur = $page + 1;
                                        echo "$cur"; ?>
                            </span>

                            <!-- Nút Sau -->
                            <a href="?next=<?php $next = $page + 1;
                                            echo "$next"; ?>"
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-xl hover:bg-gray-400">
                                >
                            </a>
                </div>
            </div>
        </main>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>