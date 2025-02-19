<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $result = $db->query("delete from chi_tiet_don_hang where id_don_hang = $id");
    $result = $db->query("delete from don_hang where id = $id");
    $db->NgatKetNoi();
    header("Location: ../../view/admin/order/manage-order.php");
    exit();
} elseif (isset($_POST['pay'], $_POST['id_dh'])) {
    $chon = $_POST['pay'];
    $id_dh = $_POST['id_dh'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $db->query("update don_hang set trang_thai = '$chon' where id = $id_dh");
    $db->NgatKetNoi();
    header("Location: ../../view/admin/order/manage-order.php");
    exit();
}
