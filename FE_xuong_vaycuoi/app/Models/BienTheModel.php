<?php

namespace App\Models;

use App\Config\Database;

class BienTheModel
{
    private $db;
    private $NameTable = "bienthe";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($id_product, $id_color, $id_style, $soLuong)
    {
        $sql = "INSERT INTO $this->NameTable (id_product,id_color,id_style,so_luong,action)
       VALUE('$id_product','$id_color','$id_style','$soLuong','1')";
        return $this->db->getData($sql);
    }

    public function selectAll($id_bienthe, $id_account)
    {
        $sql = "SELECT product.name_product,color.name_color,styles.name_style,bienthe.id_bienthe,bienthe.action,bienthe.so_luong,product.image FROM $this->NameTable
            INNER join styles on bienthe.id_style = styles.id_style
            INNER join color on bienthe.id_color = color.id_color
            INNER join product on bienthe.id_product = product.id_product 
            ";

        if (!empty($id_bienthe)) $sql .= " WHERE bienthe.id_bienthe in (" . $id_bienthe . ")";
        if (!empty($id_account) && $id_account > 0) $sql .= " 
        INNER join detail_datlich on bienthe.id_bienthe = detail_datlich.id_bienthe 
        WHERE detail_datlich.id_account = " . $id_account . " and detail_datlich.action = 0 ";
        // echo $sql;
        return $this->db->getData($sql);
    }
    public function checkIdBienThe($id_bienthe, $id_account)
    {
        $sql = "SELECT product.name_product,color.name_color,styles.name_style,bienthe.id_bienthe,bienthe.action,bienthe.so_luong,product.image FROM $this->NameTable
            INNER join styles on bienthe.id_style = styles.id_style
            INNER join color on bienthe.id_color = color.id_color
            INNER join product on bienthe.id_product = product.id_product 
            INNER join detail_datlich on bienthe.id_bienthe = detail_datlich.id_bienthe 
            WHERE detail_datlich.id_account = " . $id_account . " and detail_datlich.id_bienthe = ".$id_bienthe." and detail_datlich.action = 0 ";
        // echo $sql;
        return $this->db->getData($sql);
    }
    public function check_color_bien_the($id_product)
    {
        $sql = "SELECT DISTINCT color.id_color, name_color FROM $this->NameTable 
        inner join color on $this->NameTable.id_color = color.id_color
        where id_product = '$id_product'";
        return $this->db->getData($sql);
    }
    public function check_style_bien_the($id_product)
    {
        $sql = "SELECT DISTINCT styles.id_style, name_style FROM $this->NameTable 
        inner join styles on $this->NameTable.id_style = styles.id_style
        where id_product = '$id_product'";
        return $this->db->getData($sql);
    }
    public function checkColor($id_product, $id_style)
    {
        $sql = "SELECT * FROM $this->NameTable where id_product = '$id_product'  and id_style = '$id_style' ";
        return $this->db->getData($sql, false);
    }
    public function checkStyle($id_product, $id_color)
    {
        $sql = "SELECT * FROM $this->NameTable where id_product = '$id_product'  and id_color = '$id_color' ";
        return $this->db->getData($sql, false);
    }
    public function check_bien_the($id_product, $id_color, $id_style)
    {
        $sql = "SELECT * FROM $this->NameTable where id_product = '$id_product' and id_color = '$id_color' and id_style = '$id_style' ";
        echo $sql;
        return $this->db->getData($sql, false);
    }
    public function selectOne($id_category)
    {
        $sql = "SELECT * FROM $this->NameTable where id_bienthe = '$id_category'";
        return $this->db->getData($sql, false);
    }


    public function updateAction($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 0 where id_bienthe = '$id_category'";
        return $this->db->getData($sql);
    }
    public function updateAction1($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 1 where id_bienthe = '$id_category'";
        return $this->db->getData($sql);
    }
}
