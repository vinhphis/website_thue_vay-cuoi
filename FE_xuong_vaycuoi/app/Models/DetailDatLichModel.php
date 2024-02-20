<?php

namespace App\Models;

use App\Config\Database;

class DetailDatLichModel
{
    private $db;
    private $NameTable = "detail_datLich";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($id_account, $id_bienthe)
    {
        $sql = "INSERT INTO $this->NameTable (id_account,id_bienthe,action)
       VALUE('$id_account', '$id_bienthe','0')";
        return $this->db->getData($sql);
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->NameTable ";
        return $this->db->getData($sql);
    }
    public function selectLichHenAccount($id_account)
    {
        $sql = "SELECT * FROM $this->NameTable 
        INNER join bienthe on bienthe.id_bienthe = detail_datlich.id_bienthe
        INNER join color on bienthe.id_color = color.id_color
        INNER join styles on bienthe.id_style = styles.id_style
        INNER join product on bienthe.id_product = product.id_product
        WHERE id_order = $id_account ";
        return $this->db->getData($sql);
    }
    public function updateDatLich($id_datlich, $id_bienthe, $id_account)
    {
        $sql = "UPDATE $this->NameTable SET id_order='$id_datlich',`action`='1' WHERE id_bienthe = $id_bienthe and id_account = $id_account and action = 0";
        return $this->db->getData($sql);
    }
    public function selectAllAction1()
    {
        $sql = "SELECT * FROM $this->NameTable WHERE action = 1";
        return $this->db->getData($sql);
    }
    public function checkAccount($username, $password)
    {
        $sql = "SELECT * FROM $this->NameTable where username = '$username' and password = '$password' ";
        return $this->db->getData($sql, false);
    }


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
