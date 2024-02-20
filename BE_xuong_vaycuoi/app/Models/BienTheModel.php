<?php

namespace Vinhphis\Templateadmin\Models;

use Vinhphis\Templateadmin\Models\Database;

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

    public function selectAll($id_bienthe)
    {
        $sql = "SELECT * FROM $this->NameTable
            INNER join styles on bienthe.id_style = styles.id_style
            INNER join color on bienthe.id_color = color.id_color
            INNER join product on bienthe.id_product = product.id_product ";

        if (isset($id_bienthe) && $id_bienthe > 0) {
            $sql .= "WHERE $this->NameTable.id_bienthe in ($id_bienthe)";
        }
        echo $sql;
        return $this->db->getData($sql);
    }
    public function selectAllPro($id_product)
    {
        $sql = "SELECT product.name_product,color.name_color,styles.name_style,bienthe.id_bienthe,bienthe.action,bienthe.so_luong FROM $this->NameTable
            INNER join styles on bienthe.id_style = styles.id_style
            INNER join color on bienthe.id_color = color.id_color
            INNER join product on bienthe.id_product = product.id_product 
            where product.id_product = $id_product and color.action = 1 and styles.action = 1";
        return $this->db->getData($sql);
    }
    public function selectOne($id_category)
    {
        $sql = "SELECT * FROM $this->NameTable where id_bienthe = '$id_category'";
        return $this->db->getData($sql, false);
    }
    // không nên sử dụng
    //    public function delete($id_category)
    //    {
    //        $sql = "DELETE FROM $this->NameTable WHERE id_category = '$id_category'";
    //        return   $this->db->getData($sql);
    //    }

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
