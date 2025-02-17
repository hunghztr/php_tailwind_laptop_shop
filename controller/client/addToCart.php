<?php
require_once '../../model/CoSoDuLieu.php';
require_once '../../model/GioHang.php';
session_start();
if (isset($_SESSION['id'])) {
    $id_sp = 0;
    $id_gh = 0;
    if (isset($_GET['value'])) {
        $id_sp = $_GET['value'];
    }
    $id = $_SESSION['id'];
    $db = new CoSoDuLieu();
    $sql = "select * from gio_hang where id_nguoi_dung = " . $id;
    $result = $db->query($sql);
    if (mysqli_num_rows($result) <= 0) {
        $sql1 = "insert into gio_hang (tong_san_pham,id_nguoi_dung) values(0,$id)";
        $result1 = $db->query($sql1);
        $result1 = $db->query($sql);
        $row = mysqli_fetch_assoc($result1);
        $id_gh = $row['id'];
    }
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $gh = new GioHang();
        $gh->setId($row['id']);
        $gh->setTongSanPham($row['tong_san_pham'] + 1);
        $tong = $gh->getTongSanPham();
        $id_gh = $gh->getId();
        $sql2 = "update gio_hang set tong_san_pham = $tong where id = $id_gh";
        $result2 = $db->query($sql2);
    }

    $sql3 = "select * from chi_tiet_gio_hang where id_gio_hang = $id_gh and id_san_pham = $id_sp";
    $result3 = $db->query($sql3);
    if (mysqli_num_rows($result3) > 0) {
        $row = mysqli_fetch_assoc($result3);
        $so_luong = $row['so_luong'] + 1;
        $sql4 = "update chi_tiet_gio_hang set so_luong = $so_luong";
        $result4 = $db->query($sql4);
    } else {
        $row = mysqli_fetch_assoc($result3);
        $sql4 = "insert into chi_tiet_gio_hang values($id_gh,$id_sp,1)";
        $result4 = $db->query($sql4);
    }
    header("Location: ../../view/client/index.php");
    exit();
}
