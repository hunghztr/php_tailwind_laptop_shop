<?php
if (isset($_GET['id_gh'])) {
    $id_gh = $_GET['id_gh'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $db->query("delete from chi_tiet_gio_hang where id_gio_hang = $id_gh");
    $db->query("delete from gio_hang where id = $id_gh");

    header("Location: ../../view/client/order.php");
    exit();
}
