<?php

namespace App\Models;

use App\Config\Database;

class OrderModel
{
    private $db;
    private $NameTable = "orders";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($ho_ten, $email, $phone, $id_bienthe, $ngay_hen, $ghi_chu)
    {
        $sql = "INSERT INTO $this->NameTable ( ho_ten,email, phone, id_bienthe, ngay_hen, ghi_chu, action) 
        VALUES ('$ho_ten','$email', '$phone', '$id_bienthe', '$ngay_hen', '$ghi_chu','1')";
        return $this->db->getData($sql);
    }
}
