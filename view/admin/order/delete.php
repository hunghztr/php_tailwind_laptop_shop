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
            <h2 class="text-2xl font-bold mt-8 mb-4">Xóa Đơn hàng</h2>
            <form action="../../../controller/admin/manage-order.php" method="post">
                <?php
                require_once '../../../model/CoSoDuLieu.php';
                $id = 0;
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                ?>
                <h3>Bạn có chắc muốn xóa đơn hàng này</h3>
                <button type="submit"
                    class="mt-10 w-full bg-red-600 text-white py-2 rounded-xl hover:bg-red-700 transition duration-300">
                    Xóa
                </button>
                <?php echo "<input type='text' name='id' value='$id' hidden>"; ?>
                <?php echo "<input type='text' name='xoa' value='xoa' hidden>"; ?>
            </form>
        </div>
    </section>
    <?php include '../../../layout/client/footer.php'; ?>
</body>

</html>