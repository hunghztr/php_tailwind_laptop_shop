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
    <div class="main mt-20">
        <section class="bg-gray-100 py-12">
            <div class="max-w-6xl mx-auto px-4">
                <!-- Tiêu đề chính -->
                <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Về Chúng Tôi</h1>

                <!-- Giới thiệu chung -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Giới thiệu chung</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Chúng tôi là cửa hàng bán laptop uy tín với nhiều năm kinh nghiệm trong lĩnh vực công nghệ.
                        Cam kết cung cấp sản phẩm chất lượng, giá cả hợp lý và dịch vụ khách hàng tuyệt vời.
                    </p>
                </div>

                <!-- Sứ mệnh và tầm nhìn -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sứ mệnh và tầm nhìn</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Sứ mệnh của chúng tôi là mang đến giải pháp công nghệ tốt nhất cho khách hàng.
                        Chúng tôi không ngừng cải tiến và phát triển để trở thành địa chỉ mua sắm tin cậy.
                    </p>
                </div>

                <!-- Đội ngũ nhân viên -->
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Đội ngũ nhân viên</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="team-member text-center">
                            <img src="https://via.placeholder.com/150" alt="CEO"
                                class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h3 class="text-lg font-bold">Trần Đình Hùng</h3>
                            <p class="text-gray-600">Giám đốc điều hành</p>
                        </div>
                        <div class="team-member text-center">
                            <img src="https://via.placeholder.com/150" alt="CTO"
                                class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h3 class="text-lg font-bold">Tòng Văn Tiến</h3>
                            <p class="text-gray-600">Giám đốc công nghệ</p>
                        </div>
                        <div class="team-member text-center">
                            <img src="https://via.placeholder.com/150" alt="CMO"
                                class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h3 class="text-lg font-bold">Phạm Đức Trường</h3>
                            <p class="text-gray-600">Giám đốc Marketing</p>
                        </div>
                    </div>
                </div>

                <!-- Lời cam kết -->
                <div class="bg-blue-600 text-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Lời cam kết của chúng tôi</h2>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>Cam kết sản phẩm chính hãng, bảo hành dài hạn.</li>
                        <li>Hỗ trợ khách hàng tận tình, chu đáo.</li>
                        <li>Đổi trả dễ dàng trong vòng 30 ngày.</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>
    <?php include '../../layout/client/footer.php'; ?>
</body>

</html>