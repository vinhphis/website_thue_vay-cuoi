<?php

namespace Vinhphis\Templateadmin\Controllers;

use Vinhphis\Templateadmin\Models\LichHenModel;
use Vinhphis\Templateadmin\Models\NameEmailModel;

class NameEmailController
{
    protected $nameEmailModel,$lichHenModel ;
    public function __construct()
    {
        $this->nameEmailModel = new NameEmailModel();
        $this->lichHenModel = new LichHenModel();
    }

    public function inThongTin()
    {
        $listNameEmail = $this->nameEmailModel->selectAll();
       require "./app/Views/name_email_user/list.php";
    }
    public function inThongTinLichHen()
    {
        $listNameEmail = $this->lichHenModel->selectAll();
       require "./app/Views/name_email_user/list_lich_hen.php";
    }
}
