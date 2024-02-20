<?php

namespace Vinhphis\Templateadmin\Models;

class DetailOrderModel
{
    protected $NameTable = "detail_order", $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function themThongTin($id_order, $id_bienthe, $so_luong, $tong_tien)
    {
        $sql = "INSERT INTO `detail_order`( `id_order`, `id_bienthe`, `so_luong`, `tong_tien`, `action`) 
    VALUES ('$id_order', '$id_bienthe', '$so_luong', '$tong_tien','1')";
        return $this->db->getData($sql);
    }
    public function selectAll($id_order)
    {
        $sql = "SELECT product.name_product, product.price_product,color.name_color,styles.name_style,detail_order.so_luong,detail_order.tong_tien FROM `detail_order` 
    INNER join bienthe on bienthe.id_bienthe = detail_order.id_bienthe
    INNER join styles on bienthe.id_style = styles.id_style
    INNER join color on bienthe.id_color = color.id_color
    INNER join product on bienthe.id_product = product.id_product 
    WHERE id_order = $id_order";
        return $this->db->getData($sql);
    }
}
