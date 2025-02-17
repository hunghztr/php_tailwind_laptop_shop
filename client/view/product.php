<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="root">
        <?php include '../layout/header.php'; ?>
        <div class="main flex mt-40 justify-between mx-24">
            <div class="filter">
                <form action="../view/product.php" method="get">
                    <div class="p-4 w-96 bg-white rounded-2xl shadow-lg">
                        <h2 class="text-xl font-semibold mb-4">Bộ lọc sản phẩm</h2>

                        <!-- Tìm kiếm tên sản phẩm -->
                        <input type="text" name='search' id="search" placeholder="Tìm tên sản phẩm"
                            class="w-full mb-4 p-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <!-- Hãng sản xuất -->
                        <div class="mb-4">
                            <h3 class="font-medium">Hãng sản xuất</h3>
                            <ul>
                                <li>
                                    <input name='cb[]' type="checkbox" class="brand-filter mr-2" value="asus" id="asus">
                                    <label for="asus">Asus</label>
                                </li>
                                <li>
                                    <input name='cb[]' type="checkbox" class="brand-filter mr-2" value="dell" id="dell">
                                    <label for="dell">Dell</label>
                                </li>
                                <li>
                                    <input name='cb[]' type="checkbox" class="brand-filter mr-2" value="macbook" id="macbook">
                                    <label for="macbook">Macbook</label>
                                </li>
                            </ul>
                        </div>

                        <!-- Giá tiền -->
                        <div class="mb-4">
                            <h3 class="font-medium">Khoảng giá</h3>
                            <ul>
                                <li>
                                    <input type="radio" name="price-20" class="price-filter mr-2" value="under-20"
                                        id="rb">
                                    <label for="under-20">Dưới 20 triệu</label>
                                </li>
                                <li>
                                    <input type="radio" name="price-20-30" class="price-filter mr-2" value="20-30" id="rb">
                                    <label for="20-30">20 - 30 triệu</label>
                                </li>
                                <li>
                                    <input type="radio" name="price-30" class="price-filter mr-2" value="above-30"
                                        id="rb">
                                    <label for="above-30">Trên 30 triệu</label>
                                </li>
                            </ul>
                        </div>

                        <!-- Nút áp dụng bộ lọc -->
                        <button id="filterBtn"
                            class="w-full bg-blue-500 text-white py-2 rounded-xl hover:bg-blue-600 transition-colors duration-300">
                            Áp dụng bộ lọc
                        </button>
                    </div>
                </form>
            </div>
            <div class="product grid grid-cols-3 gap-8 mb-10">
                <?php
                require_once '../model/SanPham.php';
                $sql = "select * from san_pham";
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    if (
                        isset($_GET['search']) || isset($_GET['cb']) || isset($_GET['price-20']) ||
                        isset($_GET['price-20-30']) || isset($_GET['price-30'])
                    ) {
                        if ($_GET['search'] != '') {
                            $search = $_GET['search'];
                            $sql = $sql . " where ten like '%" . $search . "%'";
                        } else {
                            $size = 0;
                            if (isset($_GET['cb'])) {
                                $cbs = $_GET['cb'];
                                $size = count($cbs);
                                if ($size > 0) {
                                    if ($size == 1) {
                                        $sql = $sql . " where danh_muc in ('$cbs[0]')";
                                    } elseif ($size == 2) {
                                        $sql = $sql . " where danh_muc in ('$cbs[0]','$cbs[1]')";
                                    } elseif ($size == 3) {
                                        $sql = $sql . " where danh_muc in ('$cbs[0]','$cbs[1]','$cbs[2]')";
                                    }
                                }
                            }
                            if (
                                isset($_GET['price-20']) || isset($_GET['price-20-30'])
                                || isset($_GET['price-30'])
                            ) {
                                if (isset($_GET['price-20'])) {
                                    if ($size > 0) {
                                        $sql = $sql . " and gia_tien <= 20000000";
                                    } else {
                                        $sql = $sql . " where gia_tien <= 20000000";
                                    }
                                } elseif (isset($_GET['price-20-30'])) {
                                    if ($size > 0) {
                                        $sql = $sql . " and gia_tien >= 20000000 and gia_tien <= 30000000";
                                    } else {
                                        $sql = $sql . " where gia_tien >= 20000000 and gia_tien <= 30000000";
                                    }
                                } elseif (isset($_GET['price-30'])) {
                                    if ($size > 0) {
                                        $sql = $sql . " and gia_tien >= 30000000";
                                    } else {
                                        $sql = $sql . " where gia_tien >= 30000000";
                                    }
                                }
                            }
                        }
                    }
                    if (isset($_GET['factory'])) {
                        $factory = $_GET['factory'];
                        $sql = $sql . " where danh_muc = '$factory'";
                    }
                }
                $connect = mysqli_connect("localhost", "root", "141512", "laptop_shop");
                if (!$connect) {
                    die("Error in connection" . mysqli_connect_error());
                    exit();
                }

                $result = mysqli_query($connect, $sql);
                $count = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sp = new SanPham();
                        $sp->setId($row['id']);
                        $sp->setTenAnh($row['ten_anh']);
                        $sp->setTen($row['ten']);
                        $sp->setGiaTien($row['gia_tien']);
                        $id = $sp->getId();
                        $ten_anh = $sp->getTenAnh();
                        $ten = $sp->getTen();
                        $gia = (int)$sp->getGiaTien();
                        $giaStr =
                            number_format($gia, 0, ',', '.');
                        echo "<div
                        class='border border-gray-400 max-w-56 bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300'>
                        <img class='w-full h-48 object-cover transition-transform duration-300 hover:scale-110'
                            src='../img/product/$ten_anh' alt='Laptop Image'>
                        <div class='p-4'>
                            <h3 class='text-xl font-semibold text-gray-800'><a href='./detail.php?id=$id'>$ten</a></h3>
                            <p class='text-red-500 font-bold text-lg mt-2'>$giaStr đ</p>
                            <form action='../controller/addToCart.php' method = 'get'>
                            <button
                                class='mt-4 w-full bg-blue-500 text-white py-2 rounded-xl hover:bg-blue-600 transition-colors duration-300'>
                                Thêm vào giỏ hàng
                            </button>
                            </form>
                        </div>
                    </div>";
                        $count++;
                        if ($count == 9) {
                            break;
                        }
                    }
                }
                ?>
            </div>
        </div>
        <?php include '../layout/footer.php'; ?>
    </div>

</body>

</html>