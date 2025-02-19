<?php
class DonHang
{
    private $id;
    private $ngay_tao;
    private $gia_tien;
    private $tong_san_pham;
    private $id_nguoi_dung;
    private $trang_thai;
    private $dia_chi;
    private $ghi_chu;
    private $hinh_thuc;
    public function __construct() {}

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
    // Getter and Setter for trang_thai
    public function getTrangThai()
    {
        return $this->trang_thai;
    }

    public function setTrangThai($trang_thai)
    {
        $this->trang_thai = $trang_thai;
    }

    // Getter and Setter for dia_chi
    public function getDiaChi()
    {
        return $this->dia_chi;
    }

    public function setDiaChi($dia_chi)
    {
        $this->dia_chi = $dia_chi;
    }

    // Getter and Setter for ghi_chu
    public function getGhiChu()
    {
        return $this->ghi_chu;
    }

    public function setGhiChu($ghi_chu)
    {
        $this->ghi_chu = $ghi_chu;
    }

    // Getter and Setter for hinh_thuc
    public function getHinhThuc()
    {
        return $this->hinh_thuc;
    }

    public function setHinhThuc($hinh_thuc)
    {
        $this->hinh_thuc = $hinh_thuc;
    }
}
