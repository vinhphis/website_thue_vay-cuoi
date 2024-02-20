<?php

namespace Vinhphis\Templateadmin\Models;

use Vinhphis\Templateadmin\Abstracts\AbstractController;
use Vinhphis\Templateadmin\Interfaces\InterfaceController;

class ThongKeModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add($name)
    {
        $sql = "INSERT INTO  (name_color,action)
       VALUE('$name','1')";
        return $this->db->getData($sql);
    }

    public function countAccount()
    {
        $sql = "SELECT COUNT(id_account) as countAccount FROM `account` WHERE 1";
        return $this->db->getData($sql, false);
    }
    public function tongSanPham()
    {
        $sql = "SELECT COUNT(id_product) as tongsanPham FROM `product` WHERE 1";
        return $this->db->getData($sql, false);
    }
    public function tongTien()
    {
        $sql = "SELECT sum(tong_tien) as tongTien FROM `orders` WHERE 1";
        return $this->db->getData($sql, false);
    }
    public function tongTienThang()
    {
        $sql = "SELECT SUM(tong_tien) AS TongTien
        FROM orders
        WHERE MONTH(ngay_dat) = 2 AND YEAR(ngay_dat) = 2024;";
        return $this->db->getData($sql, false);
    }
}
