<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/client/logo/logo.png" type="image/gif" sizes="16x16">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div id="root">
        <div class="content-wrapper max-w-screen-xl text-base mx-auto px-8">
            <?php include '../../layout/client/header.php'; ?>
            <main class="mt-20">
                <div class=" flex justify-center">
                    <div class="slide h-[400px] w-[1000px] bg-[url('../../img/client/slide/slide1.jpg')]
                bg-cover bg-bottom bg-no-repeat">
                        <div class="w-full h-full flex justify-center items-center bg-gray-900 bg-opacity-40">
                            <div class="mx-16 text-white text-center">
                                <div class="uppercase text-sm mb-6 ">
                                    the best place to buy laptop
                                </div>
                                <div class="font-medium text-4xl mb-8 uppercase">
                                    laptop shop
                                </div>
                                <div class="flex justify-center">
                                    <div
                                        class="uppercase bg-white text-gray-900 w-max 
                                tracking-wider py-4 px-6 text-xs font-bold cursor-pointer hover:bg-opacity-80 hover:shadow-sm">
                                        <a href="./product.php">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="rounded-full my-5 px-5 w-max bg-gradient-to-r from-[#f0f0f0] to-white p-2 cursor-pointer shadow-xl hover:shadow-2xl">
                    <h3 class="font-semibold text-gray-500 text-xl uppercase hover:text-gray-800">các nhà sản xuất</h3>
                </div>
                <div class="mx-8 my-8 flex justify-center align-center gap-14">
                    <div class="flex justify-center shadow-xl w-60 h-32 bg-white rounded-lg px-4 group relative 
                    overflow-hidden hover:shadow-2xl cursor-pointer">
                        <div
                            class="img1 w-full h-full bg-[url('../../img/client/logo/asus.png')] bg-contain bg-no-repeat bg-center transition-opacity duration-300 group-hover:opacity-30">
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center text-white text-lg font-semibold opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <a href="./product.php?factory=asus">asus</a>
                        </div>
                    </div>
                    <div class="flex justify-center shadow-xl w-60 h-32 bg-white rounded-lg px-4 group relative 
                                        overflow-hidden hover:shadow-2xl cursor-pointer">
                        <div
                            class="img2 w-full h-full bg-[url('../../img/client/logo/dell.png')] bg-contain bg-no-repeat bg-center transition-opacity duration-300 group-hover:opacity-30">
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center text-white text-lg font-semibold opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <a href="./product.php?factory=dell">dell</a>
                        </div>
                    </div>
                    <div class="flex justify-center shadow-xl w-60 h-32 bg-white rounded-lg px-4 group relative 
                                        overflow-hidden hover:shadow-2xl cursor-pointer">
                        <div
                            class="img3 w-full h-full bg-[url('../../img/client/logo/macbook.png')] bg-contain bg-no-repeat bg-center transition-opacity duration-300 group-hover:opacity-30">
                        </div>
                        <div
                            class="absolute inset-0 flex items-center justify-center text-white text-lg font-semibold opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <a href="./product.php?factory=macbook">macbook</a>
                        </div>
                    </div>
                </div>
                <div
                    class="rounded-full my-5 px-5 w-max bg-gradient-to-r from-[#f0f0f0] to-white p-2 cursor-pointer shadow-xl hover:shadow-2xl">
                    <h3 class="font-semibold text-gray-500 text-xl uppercase hover:text-gray-800">sản phẩm phổ biến</h3>
                </div>

                <div class="grid grid-cols-4 gap-3 mb-7">
                    <?php
                    require_once '../../model/SanPham.php';
                    require_once '../../model/CoSoDuLieu.php';
                    $db = new CoSoDuLieu();
                    $sql = "select * from san_pham";
                    $result = $db->query($sql);
                    $count = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sp = $db->selectSanPham($row);
                            $id = $sp->getId();
                            $ten_anh = $sp->getTenAnh();
                            $ten = $sp->getTen();
                            $gia = (int)$sp->getGiaTien();
                            $giaStr =
                                number_format($gia, 0, ',', '.');
                            echo "<div
                        class='border border-gray-400 max-w-56 bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-shadow duration-300'>
                        <img class='w-full h-48 object-cover transition-transform duration-300 hover:scale-110'
                            src='../../img/client/product/$ten_anh' alt='Laptop Image'>
                        <div class='p-4'>
                            <h3 class='text-xl font-semibold text-gray-800'><a href='./detail.php?id=$id'>$ten</a></h3>
                            <p class='text-red-500 font-bold text-lg mt-2'>$giaStr đ</p>
                            <form action='../../controller/client/addToCart.php' method ='get'>
                            <input hidden value='$id' name='value'>
                            <button
                                class='mt-4 w-full bg-blue-500 text-white py-2 rounded-xl hover:bg-blue-600 transition-colors duration-300'>
                                Thêm vào giỏ hàng
                            </button>
                            </form>
                        </div>
                    </div>";
                            $count++;
                            if ($count == 4) {
                                break;
                            }
                        }
                    }
                    $db->NgatKetNoi();
                    ?>
                </div>
            </main>
        </div>

        <?php include '../../layout/client/footer.php'; ?>
    </div>
</body>

</html>