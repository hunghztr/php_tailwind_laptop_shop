<?php
require_once '../../model/NguoiDung.php';
require_once '../../model/CoSoDuLieu.php';
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = new CoSoDuLieu();
    $sql = "select * from nguoi_dung where email = '$email' and mat_khau = '$password'";
    $result = $db->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nd = new NguoiDung();
        $nd->setEmail($row['email']);
        $nd->setHoTen($row['ho_ten']);
        $nd->setVaiTro($row['vai_tro']);
        $nd->setId($row['id']);
        session_start();
        $_SESSION['email'] = $nd->getEmail();
        $_SESSION['name'] = $nd->getHoTen();
        $_SESSION['vai_tro'] = $nd->getVaiTro();
        $_SESSION['id'] = $nd->getId();
        $db->NgatKetNoi();
        if ($row['vai_tro'] == 'ADMIN') {
            header("Location: ../../view/admin/dashboard/dashboard.php");
            exit();
        }
        header("Location: ../../view/client/index.php");
        exit();
    } else {
        header("Location: ../../view/client/login.php?value=Email hoặc mật khẩu không đúng");
        exit();
    }
}
