<?php
require_once '../../model/CoSoDuLieu.php';
if (isset($_GET['id-sp'], $_GET['id-ct'], $_GET['sl'])) {
    $id_sp = $_GET['id-sp'];
    $id_ct = $_GET['id-ct'];
    $so_luong_can_xoa = $_GET['sl'];
    $so_luong = 0;
    $db = new CoSoDuLieu();
    $result = $db->query("delete from chi_tiet_gio_hang where id_gio_hang = $id_ct and id_san_pham = $id_sp");
    $result = $db->query("select * from gio_hang where id = $id_ct");
    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $so_luong = $row['tong_san_pham'];
    }
    $so_luong = $so_luong - $so_luong_can_xoa;
    $result = $db->query("update gio_hang set tong_san_pham = $so_luong where id = $id_ct");
    $db->NgatKetNoi();
    header("Location: ../../view/client/cart.php");
    exit();
}
