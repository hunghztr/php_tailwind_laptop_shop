<?php
if (isset($_GET['id_gh'], $_GET['id_dh'])) {
    $id_gh = $_GET['id_gh'];
    $id_dh = $_GET['id_dh'];
    require_once '../../model/CoSoDuLieu.php';
    $db = new CoSoDuLieu();
    $sql = "select id_san_pham , so_luong from chi_tiet_gio_hang where id_gio_hang = $id_gh";
    $row = $db->query($sql);
    if (mysqli_num_rows($row) > 0) {
        while ($r = mysqli_fetch_assoc($row)) {
            $id_sp = $r['id_san_pham'];
            $so_luong = $r['so_luong'];
            $sql = "update san_pham set so_luong = so_luong - $so_luong where id = $id_sp";
            $db->query($sql);
        }
    }
    $db->query("delete from chi_tiet_gio_hang where id_gio_hang = $id_gh");
    $db->query("delete from gio_hang where id = $id_gh");

    header("Location: ./sendMail.php?id_dh=$id_dh");
    exit();
}
