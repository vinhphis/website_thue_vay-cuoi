<?php

namespace App\Models;

use App\Config\Database;

class StyleModel
{
    private $db;
    private $NameTable = "styles";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($name)
    {
        $sql = "INSERT INTO $this->NameTable (name_style,action)
       VALUE('$name','1')";
        return $this->db->getData($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->NameTable ";
        return $this->db->getData($sql);
    }
    public function selectAllAction1()
    {
        $sql = "SELECT * FROM $this->NameTable WHERE action = 1";
        return $this->db->getData($sql);
    }
    public function selectOne($id_style)
    {
        $sql = "SELECT * FROM $this->NameTable where id_style = '$id_style'";
        return $this->db->getData($sql,false);
    }
    // không nên sử dụng
//    public function delete($id_style)
//    {
//        $sql = "DELETE FROM $this->NameTable WHERE id_style = '$id_style'";
//        return   $this->db->getData($sql);
//    }

    public function updateAction($id_style)
    {
        $sql = "UPDATE $this->NameTable SET action = 0 where id_style = '$id_style'";
        return $this->db->getData($sql);
    }
    public function updateAction1($id_style)
    {
        $sql = "UPDATE $this->NameTable SET action = 1 where id_style = '$id_style'";
        return $this->db->getData($sql);
    }
}
