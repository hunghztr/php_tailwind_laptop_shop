<?php
if (isset($_GET['id_gh'], $_GET['id_dh'])) {
    $id_gh = $_GET['id_gh'];
    $id_dh = $_GET['id_dh'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $db->query("delete from chi_tiet_gio_hang where id_gio_hang = $id_gh");
    $db->query("delete from gio_hang where id = $id_gh");

    header("Location: ./sendMail.php?id_dh=$id_dh");
    exit();
}
