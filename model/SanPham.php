<?php
class SanPham
{
    private $id;
    private $ten;
    private $danh_muc;
    private $ten_anh;
    private $mo_ta;
    private $gia_tien;
    private $so_luong;

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

    // Getter and Setter for ten
    public function getTen()
    {
        return $this->ten;
    }

    public function setTen($ten)
    {
        $this->ten = $ten;
    }

    // Getter and Setter for danh_muc
    public function getDanhMuc()
    {
        return $this->danh_muc;
    }

    public function setDanhMuc($danh_muc)
    {
        $this->danh_muc = $danh_muc;
    }

    // Getter and Setter for ten_anh
    public function getTenAnh()
    {
        return $this->ten_anh;
    }

    public function setTenAnh($ten_anh)
    {
        $this->ten_anh = $ten_anh;
    }

    // Getter and Setter for mo_ta
    public function getMoTa()
    {
        return $this->mo_ta;
    }

    public function setMoTa($mo_ta)
    {
        $this->mo_ta = $mo_ta;
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

    // Getter and Setter for so_luong
    public function getSoLuong()
    {
        return $this->so_luong;
    }

    public function setSoLuong($so_luong)
    {
        $this->so_luong = $so_luong;
    }
}
