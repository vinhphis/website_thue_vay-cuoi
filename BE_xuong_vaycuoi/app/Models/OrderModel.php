<?php

namespace Vinhphis\Templateadmin\Models;

class OrderModel
{
    protected $NameTable = "orders", $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function themThongTin($ho_ten, $sdt, $email, $dia_chi, $ngay_mua, $ngay_tra, $tong_tien)
    {
        $sql = "INSERT INTO $this->NameTable ( ho_ten, sdt, email, dia_chi, ngay_dat, ngay_tra, tong_tien, action) 
    VALUES ('$ho_ten', '$sdt', '$email', '$dia_chi', '$ngay_mua', '$ngay_tra', '$tong_tien', '1')";
        return $this->db->getData($sql);
    }

    public function selectIdOrder()
    {
        $sql = "SELECT id_order FROM $this->NameTable 
        ORDER by id_order DESC
        LIMIT 1";
        return $this->db->getData($sql, false);
    }
    public function selectAll()
    {
        $sql = "SELECT * FROM $this->NameTable  ";
        return $this->db->getData($sql);
    }
  
}
