<?php
class DonHang
{
    private $id;
    private $ngay_tao;
    private $gia_tien;
    private $tong_san_pham;
    private $id_nguoi_dung;

    public function __construct($id, $ngay_tao, $gia_tien, $tong_san_pham, $id_nguoi_dung)
    {
        $this->id = $id;
        $this->ngay_tao = $ngay_tao;
        $this->gia_tien = $gia_tien;
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

    // Getter and Setter for ngay_tao
    public function getNgayTao()
    {
        return $this->ngay_tao;
    }

    public function setNgayTao($ngay_tao)
    {
        $this->ngay_tao = $ngay_tao;
    }

    // Getter and Setter for gia_tien
    public function getGiaTien()
    {
        return $this->gia_tien;
    }

    public function setGiaTien($gia_tien)
    {
        $this->gia_tien = $gia_tien;
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
