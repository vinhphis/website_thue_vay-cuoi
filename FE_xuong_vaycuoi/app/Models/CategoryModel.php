<?php

namespace App\Models;

use App\Config\Database;

class CategoryModel
{
    private $db;
    private $NameTable = "categorys";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($name)
    {
        $sql = "INSERT INTO $this->NameTable (name_category,action)
       VALUE('$name','1')";
        return $this->db->getData($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->NameTable ";
        return $this->db->getData($sql);
    }
    public function selectOne($id_category)
    {
        $sql = "SELECT * FROM $this->NameTable where id_category = '$id_category'";
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
        $sql = "UPDATE $this->NameTable SET action = 0 where id_category = '$id_category'";
        return $this->db->getData($sql);
    }
    public function updateAction1($id_category)
    {
        $sql = "UPDATE $this->NameTable SET action = 1 where id_category = '$id_category'";
        return $this->db->getData($sql);
    }
}
