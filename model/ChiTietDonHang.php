<?php
class ChiTietDonHang
{
    private $id;
    private $id_san_pham;

    public function __construct($id, $id_san_pham)
    {
        $this->id = $id;
        $this->id_san_pham = $id_san_pham;
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

    // Getter and Setter for id_san_pham
    public function getIdSanPham()
    {
        return $this->id_san_pham;
    }

    public function setIdSanPham($id_san_pham)
    {
        $this->id_san_pham = $id_san_pham;
    }
}
