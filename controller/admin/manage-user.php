<?php
// thêm mới người dùng
if (isset(
    $_POST['email'],
    $_POST['name'],
    $_POST['address'],
    $_POST['password'],
    $_POST['role'],
    $_POST['tao']
)) {
    $email = $_POST['email'];
    $ten = $_POST['name'];
    $dia_chi = $_POST['address'];
    $mat_khau = $_POST['password'];
    $vai_tro = $_POST['role'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result = $db->query("select * from nguoi_dung where email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        header("Location: ../../view/admin/user/create.php?value=Email đã tồn tại");
        exit();
    }
    $result =
        $db->query("insert into nguoi_dung (vai_tro,ho_ten,email,mat_khau,dia_chi) values('$vai_tro','$ten','$email','$mat_khau','$dia_chi')");
    header("Location: ../../view/admin/user/manage-user.php");
    exit();
    $db->NgatKetNoi();
}
// cập nhật người dùng 
elseif (isset(
    $_POST['email'],
    $_POST['name'],
    $_POST['address'],
    $_POST['id'],
    $_POST['sua']
)) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $ten = $_POST['name'];
    $dia_chi = $_POST['address'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result = $db->query("select * from nguoi_dung where id = '$id'");
    if (mysqli_num_rows($result) <= 0) {
        header("Location: ../../view/admin/user/update.php?value=Người dùng không tồn tại");
        exit();
    }
    $result =
        $db->query("update nguoi_dung set email = '$email' , ho_ten = '$ten' , dia_chi = '$dia_chi' where id = $id");

    $db->NgatKetNoi();
    header("Location: ../../view/admin/user/manage-user.php");
    exit();
}
// xóa người dùng 
elseif (isset($_POST['id'], $_POST['xoa'])) {
    $id = $_POST['id'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result = $db->query("delete from nguoi_dung where id = $id");
    $db->NgatKetNoi();
    header("Location: ../../view/admin/user/manage-user.php");
    exit();
}
