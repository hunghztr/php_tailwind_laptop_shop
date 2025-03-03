<?php
if (isset($_POST['name'], $_POST['address'], $_POST['price'], $_POST['type'])) {
    if ($_POST['type'] == 'offline') {
        $ten = $_POST['name'];
        $dia_chi = $_POST['address'];
        $ghi_chu = $ten;
        if (isset($_POST['note'])) {
            $ghi_chu = $ghi_chu . "," . $_POST['note'];
        }
        $tong_tien = $_POST['price'];
        $hinh_thuc = $_POST['type'];
        $trang_thai = "waiting";
        $tong = 0;
        session_start();
        $id = $_SESSION['id'];
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
        $hien_tai = date("Y-m-d");
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
        header("Location: ./pay_onl.php");
        exit();
    }
}
