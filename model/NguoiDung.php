<?php
class NguoiDung
{
    private $id;
    private $vai_tro;
    private $ho_ten;
    private $email;
    private $mat_khau;
    private $dia_chi;

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

    // Getter and Setter for vai_tro
    public function getVaiTro()
    {
        return $this->vai_tro;
    }

    public function setVaiTro($vai_tro)
    {
        $this->vai_tro = $vai_tro;
    }

    // Getter and Setter for ho_ten
    public function getHoTen()
    {
        return $this->ho_ten;
    }

    public function setHoTen($ho_ten)
    {
        $this->ho_ten = $ho_ten;
    }

    // Getter and Setter for email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter and Setter for mat_khau
    public function getMatKhau()
    {
        return $this->mat_khau;
    }

    public function setMatKhau($mat_khau)
    {
        $this->mat_khau = $mat_khau;
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
}
