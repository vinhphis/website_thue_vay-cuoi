<?php

namespace Vinhphis\Templateadmin\Models;

class LichHenModel
{
    protected $db, $NameTable = "datlich";
    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->NameTable order by id_appointment_date desc ";
        return $this->db->getData($sql);
    }

    public function selectAllLichHen()
    {
        $sql = "SELECT * FROM $this->NameTable ";
        return $this->db->getData($sql);
    }
}
