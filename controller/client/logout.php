<?php
// Bắt đầu session
session_start();

// Xóa toàn bộ dữ liệu trong session
session_unset();

// Hủy session
session_destroy();

// Chuyển hướng về trang đăng nhập
header("Location: ../../view/client/login.php?value=Đăng xuất thành công");
exit();
