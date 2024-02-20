<?php

namespace App\Models;

use App\Config\Database;

class UserModel
{
    private $db;
    private $NameTable = "account";

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($name, $password, $email)
    {
        $sql = "INSERT INTO $this->NameTable (username,password,email,action)
       VALUE('$name','$password','$email','1')";
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
