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
        <section class="bg-white py-12">
            <div class="max-w-6xl mx-auto px-4">
                <!-- Tiêu đề chính -->
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Liên hệ với chúng tôi</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Thông tin liên hệ -->
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Thông tin liên hệ</h3>
                        <p class="text-gray-600 mb-4">
                            Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, đừng ngần ngại liên hệ với chúng tôi qua thông
                            tin bên
                            dưới:
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 10.59V21H3V10.59L12 4.69l9 5.9z"></path>
                                </svg>
                                <span>Địa chỉ: Trường Đại Học Công Nghệ Đông Á, đường Trịnh Văn Bô, Nam Từ Liêm, Hà
                                    Nội</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M21 8V7a2 2 0 00-2-2h-1V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v1H5a2 2 0 00-2 2v1L12 13l9-5z">
                                    </path>
                                </svg>
                                <span>Email: tientruonghung@gmail.com</span>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-6 h-6 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79a15.1 15.1 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21 11.39 11.39 0 004.21.8 1 1 0 011 1V20a1 1 0 01-1 1A19 19 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1 11.39 11.39 0 00.8 4.21 1 1 0 01-.21 1.11l-2.2 2.2z">
                                    </path>
                                </svg>
                                <span>Hotline: 0866159825</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Form liên hệ -->
                    <div class="bg-gray-50 rounded-2xl shadow-lg p-6">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Gửi yêu cầu của bạn</h3>
                        <form action="./contact.html" method="post">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-medium mb-2">Tên của bạn</label>
                                <input type="text" id="name" name="name"
                                    class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Nhập tên của bạn" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Nhập email của bạn" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-700 font-medium mb-2">Lời nhắn</label>
                                <textarea id="message" name="message" rows="4"
                                    class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Nhập lời nhắn của bạn" required></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                                Gửi liên hệ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include '../../layout/client/footer.php'; ?>
</body>

</html>