<?php

if (isset($_GET["vnp_OrderInfo"], $_GET["vnp_Amount"])) {
    $amount = $_GET["vnp_Amount"];
    $amount = $amount / 100;
    $info = $_GET['vnp_OrderInfo'];
    $arr = explode("|", $info);
    array_push($arr, $amount);
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result = $db->query("insert into don_hang (ngay_tao,gia_tien,tong_san_pham,id_nguoi_dung,trang_thai,dia_chi,ghi_chu,hinh_thuc) " .
        "values('$arr[0]',$arr[7],$arr[1],$arr[2],'$arr[3]','$arr[4]','$arr[5]','$arr[6]')");
    $id_gh = 0;
    $result = $db->query("select * from gio_hang where id_nguoi_dung = $arr[2]");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_gh = $row['id'];
    }
    $id_dh = 0;
    $result = $db->query("select * from don_hang where id = (select max(id) from don_hang)");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id_dh = $row['id'];
    }
    $result = $db->query("select * from chi_tiet_gio_hang where id_gio_hang = $id_gh");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id_sp = $row['id_san_pham'];
            $so_luong = $row['so_luong'];
            $db->query("insert into chi_tiet_don_hang values($id_dh,$id_sp,$so_luong)");
        }
    }
    $db->NgatKetNoi();
    header("Location: ./removeAllFromCart.php?id_gh=$id_gh&id_dh=$id_dh");
    exit();
}
