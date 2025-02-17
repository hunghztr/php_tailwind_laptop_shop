<?php
require_once '../model/NguoiDung.php';
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $connect = mysqli_connect("localhost", "root", "141512", "laptop_shop");
    if (!$connect) {
        die("Error in connection" . mysqli_connect_error());
        exit();
    }
    $sql = "select * from nguoi_dung where email = '$email' and mat_khau = '$password'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nd = new NguoiDung();
        $nd->setEmail($row['email']);
        $nd->setHoTen($row['ho_ten']);
        $nd->setVaiTro($row['vai_tro']);
        session_start();
        $_SESSION['email'] = $nd->getEmail();
        $_SESSION['name'] = $nd->getHoTen();
        $_SESSION['vai_tro'] = $nd->getVaiTro();
        if ($row['vai_tro'] == 'ADMIN') {
            header("Location: ../admin/home-page-admin.php");
            exit();
        }
        header("Location: ../view/index.php");
        exit();
    } else {
        header("Location: ../view/login.php?error=Email hoặc mật khẩu không đúng");
        exit();
    }
}
