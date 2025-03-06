<?php
if (isset($_POST['name'], $_POST['address'], $_POST['price'], $_POST['type'])) {
    $ten = $_POST['name'];
    $ghi_chu = $ten;
    $hien_tai = date("Y-m-d");
    $dia_chi = $_POST['address'];
    $hinh_thuc = $_POST['type'];
    $tong_tien = $_POST['price'];
    $trang_thai = "waiting";
    session_start();
    $id = $_SESSION['id'];
    if (isset($_POST['note'])) {
        $ghi_chu = $ghi_chu . " " . $_POST['note'];
    }

    $tong = 0;
    $id_gh = 0;
    require_once '../../model/CoSoDuLieu.php';
    require_once '../../model/ChiTietGioHang.php';
    $db = new CoSoDuLieu();
    $result_gh = $db->query("select * from gio_hang where id_nguoi_dung = $id");
    if (mysqli_num_rows($result_gh) > 0) {
        $row = mysqli_fetch_assoc($result_gh);
        $tong = $row['tong_san_pham'];
        $id_gh = $row['id'];
    }
    if ($_POST['type'] == 'offline') {
        $sql = "insert into don_hang (ngay_tao,gia_tien,tong_san_pham,id_nguoi_dung,trang_thai,dia_chi,ghi_chu,hinh_thuc) " .
            "values('$hien_tai',$tong_tien,$tong,$id,'$trang_thai','$dia_chi','$ghi_chu','$hinh_thuc')";
        $result = $db->query($sql);

        $id_dh = 0;
        $result = $db->query("select * from don_hang where id = (select max(id) from don_hang)");
        $row = mysqli_fetch_assoc($result);
        $id_dh = $row['id'];

        $result = $db->query("select * from chi_tiet_gio_hang where id_gio_hang = $id_gh");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id_sp = $row['id_san_pham'];
                $so_luong = $row['so_luong'];
                $db->query("insert into chi_tiet_don_hang values($id_dh,$id_sp,$so_luong)");
            }
        }
        header("Location: ./removeAllFromCart.php?id_gh=$id_gh&id_dh=$id_dh");
        exit();
    } elseif ($_POST['type'] == 'online') {
        header("Location: ./pay_onl.php?ngay_tao=$hien_tai&gia_tien=$tong_tien&tong_san_pham=$tong&id_nd=$id&trang_thai=$trang_thai&dia_chi=$dia_chi&ghi_chu=$ghi_chu&hinh_thuc=$hinh_thuc");
        exit();
    }
}
