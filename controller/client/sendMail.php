<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
require '../../model/CoSoDuLieu.php';
require '../../model/NguoiDung.php';

$mail = new PHPMailer(true);

try {
    $id_dh = 0;
    $email_admin = "";
    if (isset($_GET['id_dh'])) {
        $id_dh = $_GET['id_dh'];
    }
    $db = new CoSoDuLieu();
    $result = $db->query("select * from nguoi_dung where vai_tro = 'ADMIN'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email_admin = $row['email'];
    }
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
    $mail->SMTPAuth = true;
    $mail->Username = "$email_admin"; // Email gửi
    $mail->Password = 'ukornrreepvfyjyq'; // Mật khẩu ứng dụng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;


    // Cấu hình email
    $mail->setFrom($email_admin, 'Admin');
    $mail->addAddress($email_admin, 'Người Nhận'); // Email người nhận
    $mail->Subject = 'Thong bao duyet don hang';
    $mail->Body = "Đơn hàng mã $id_dh cần bạn duyệt, hãy truy cập với quyền admin để xử lí http://localhost/php/laptop_shop/view/admin/order/update?id=$id_dh";

    // Gửi email
    $mail->send();
    header("Location: ../../view/client/order.php");
    exit();
} catch (Exception $e) {
    echo "Gửi email thất bại: {$mail->ErrorInfo}";
}
