<?php
require_once '../../model/SanPham.php';
class CoSoDuLieu
{
    public $local = 'localhost';
    public $username = 'root';
    public $password = '141512';
    public $database = 'laptop_shop';
    public $conn;
    function __construct()
    {
        $this->conn = mysqli_connect($this->local, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            echo "thất bại";
            exit();
        }
    }
    function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }
    function selectSanPham($row)
    {
        $sp = new SanPham();
        $sp->setId($row['id']);
        $sp->setTenAnh($row['ten_anh']);
        $sp->setTen($row['ten']);
        $sp->setGiaTien($row['gia_tien']);
        $sp->setMoTa($row['mo_ta']);
        return $sp;
    }
    function NgatKetNoi()
    {
        $this->conn->close();
    }
}
