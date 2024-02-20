<?php

namespace Vinhphis\Templateadmin\Models;

use Vinhphis\Templateadmin\Models\Database;

class ProductModel
{
    private $db;
    protected $NameTable = "product";
    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($name_product, $price_product, $image, $id_category, $mota)
    {
        $sql = "INSERT INTO $this->NameTable (name_product,price_product,image,id_category,mota,action)
       VALUE('$name_product','$price_product','$image','$id_category','$mota','1')";
        return $this->db->getData($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT *,product.action FROM $this->NameTable 
        INNER join categorys ON product.id_category = categorys.id_category ";
        return $this->db->getData($sql);
    }
    public function selectAllAction1()
    {
        $sql = "SELECT DISTINCT product.id_product,name_product,price_product,image FROM $this->NameTable 
        inner join bienthe on $this->NameTable.id_product = bienthe.id_product
        -- inner join color on color.id_color = bienthe.id_color
        -- inner join styles on styles.id_style = bienthe.id_style
        WHERE product.action = 1";
        return $this->db->getData($sql);
    }
    public function selectOne($product_id)
    {
        $sql = "SELECT *,product.action  FROM $this->NameTable 
        INNER join categorys ON product.id_category = categorys.id_category 
        where product.id_product = '$product_id'";
        return $this->db->getData($sql, false);
    }
    public function updateAction($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 0 where id_product = '$id_category'";
        return $this->db->getData($sql);
    }
    public function updateAction1($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 1 where id_product = '$id_category'";
        return $this->db->getData($sql);
    }
    // public function delete($id_product)
    // {
    //     $sql = "DELETE FROM `product` WHERE id_product  = '$id_product'";
    //     return $this->db->getData($sql);
    // }

    public function update($product_id, $name_product, $price_product, $image, $id_category, $mota)
    {
        if ($image == "") {
            $sql = "UPDATE $this->NameTable SET name_product='$name_product',price_product='$price_product',id_category='$id_category',mota='$mota' WHERE id_product  = '$product_id'";
        } else {
            $sql = "UPDATE $this->NameTable SET name_product='$name_product',price_product='$price_product',image='$image',id_category='$id_category',mota='$mota' WHERE id_product  = '$product_id'";
        }
        return $this->db->getData($sql);
    }
}
