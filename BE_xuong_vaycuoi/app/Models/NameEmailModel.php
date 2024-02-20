<?php

namespace Vinhphis\Templateadmin\Models;

class NameEmailModel
{
    protected $db, $NameTable = "name_email_user";
    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->NameTable  WHERE 1";
        return $this->db->getData($sql);
    }

    public function selectAllLichHen()
    {
        $sql = "SELECT * FROM $this->NameTable ";
        return $this->db->getData($sql);
    }
}
