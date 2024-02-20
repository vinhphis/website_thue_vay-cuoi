<?php

namespace App\Models;

use App\Config\Database;

class LichHenModel
{
    private $db;
    protected $NameTable = "datlich";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add1($ho_ten, $email, $phone, $id_bienthe, $ngay_hen, $ghi_chu)
    {
        $sql = "INSERT INTO $this->NameTable ( ho_ten,email, phone,id_bienthe, ngay_hen, ghi_chu, action) 
        VALUES ('$ho_ten','$email', '$phone','$id_bienthe', '$ngay_hen', '$ghi_chu','1')";
        return $this->db->getData($sql);
    }
    public function add2($ho_ten, $email, $phone,$id_account, $ngay_hen, $ghi_chu)
    {
        $sql = "INSERT INTO $this->NameTable ( ho_ten,email, phone,id_account, ngay_hen, ghi_chu, action) 
        VALUES ('$ho_ten','$email', '$phone','$id_account', '$ngay_hen', '$ghi_chu','1')";
        return $this->db->getData($sql);
    }
    public function selectTop1Id()
    {
        $sql = "SELECT id_appointment_date  FROM $this->NameTable order by  id_appointment_date desc limit 1 ";
        return $this->db->getData($sql, false);
    }
    public function selectAll($id_account)
    {
        $sql = "SELECT * FROM $this->NameTable where id_account = '$id_account' and action = 1";
        return $this->db->getData($sql);
    }
    public function selectTopThueProduct()
    {
        $sql = "SELECT DISTINCT product.id_product,product.image,product.name_product,product.price_product FROM $this->NameTable 
        INNER join bienthe on $this->NameTable.id_bienthe = bienthe.id_bienthe
        INNER join product on product.id_product = bienthe.id_product ";
        return $this->db->getData($sql);
    }


    public function selectOne($id_category)
    {
        $sql = "SELECT * FROM $this->NameTable where id_category = '$id_category'";
        return $this->db->getData($sql, false);
    }


    public function updateAction($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 0 where id_category = '$id_category'";
        return $this->db->getData($sql);
    }
    public function updateAction1($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 1 where id_category = '$id_category'";
        return $this->db->getData($sql);
    }
}
