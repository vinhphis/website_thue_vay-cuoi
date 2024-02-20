<?php

namespace App\Models;
use App\Config\Database;
class NameEmailModel
{
    protected $db, $NameTable = "name_user_user";
    public function __construct()
    {
        $this->db = new Database();
    }
    public function themThongTin($name_user,$email_user)
    {
       $sql = "INSERT INTO name_email_user( name_user, email_user) VALUES ('$name_user','$email_user')";
       return $this->db->getData($sql);
    }
}
