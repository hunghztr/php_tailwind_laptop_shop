<?php
class GioHang
{
    private $id;
    private $tong_san_pham;
    private $id_nguoi_dung;

    public function __construct($id, $tong_san_pham, $id_nguoi_dung)
    {
        $this->id = $id;
        $this->tong_san_pham = $tong_san_pham;
        $this->id_nguoi_dung = $id_nguoi_dung;
    }

    // Getter and Setter for id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter and Setter for tong_san_pham
    public function getTongSanPham()
    {
        return $this->tong_san_pham;
    }

    public function setTongSanPham($tong_san_pham)
    {
        $this->tong_san_pham = $tong_san_pham;
    }

    // Getter and Setter for id_nguoi_dung
    public function getIdNguoiDung()
    {
        return $this->id_nguoi_dung;
    }

    public function setIdNguoiDung($id_nguoi_dung)
    {
        $this->id_nguoi_dung = $id_nguoi_dung;
    }
}
