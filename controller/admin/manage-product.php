<?php
if (isset(
    $_POST['name'],
    $_POST['desc'],
    $_POST['size'],
    $_POST['factory'],
    $_POST['price'],
    $_POST['tao']
)) {
    $ten = $_POST['name'];
    $mo_ta = $_POST['desc'];
    $so_luong = $_POST['size'];
    $danh_muc = $_POST['factory'];
    $gia = $_POST['price'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();


    $thuMucLuu = '../../img/client/product/';

    if (!is_dir($thuMucLuu)) {
        mkdir($thuMucLuu, 0777, true);
    }
    // Thông tin ảnh
    $tenAnh = basename($_FILES['img']['name']);
    $duongDanLuu = $thuMucLuu . $tenAnh;
    $loaiFile = strtolower(pathinfo($duongDanLuu, PATHINFO_EXTENSION));


    $choPhep = ['jpg', 'png', 'jpeg', 'gif'];
    if (in_array($loaiFile, $choPhep)) {
        // Upload ảnh
        move_uploaded_file($_FILES['img']['tmp_name'], $duongDanLuu);
    }
    $result = $db->query("insert into san_pham (ten,danh_muc,ten_anh,mo_ta,gia_tien,so_luong) values('$ten','$danh_muc','$tenAnh','$mo_ta',$gia,$so_luong)");
    $db->NgatKetNoi();
    header("Location: ../../view/admin/product/manage-product.php");
    exit();
} elseif (isset(
    $_POST['name'],
    $_POST['desc'],
    $_POST['price'],
    $_POST['size'],
    $_POST['factory'],
    $_POST['id'],
    $_POST['sua']
)) {
    $id = $_POST['id'];
    $ten = $_POST['name'];
    $mo_ta = $_POST['desc'];
    $gia = $_POST['price'];
    $so_luong = $_POST['size'];
    $danh_muc = $_POST['factory'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result =
        $db->query("update san_pham set ten = '$ten' , mo_ta = '$mo_ta' , gia_tien = $gia , so_luong = $so_luong , danh_muc = '$danh_muc' where id = $id");
    $db->NgatKetNoi();
    header("Location: ../../view/admin/product/manage-product.php");
    exit();
} elseif (isset($_POST['id'], $_POST['xoa'])) {
    $id = $_POST['id'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result = $db->query("delete from san_pham where id = $id");
    $db->NgatKetNoi();
    header("Location: ../../view/admin/product/manage-product.php");
    exit();
}
