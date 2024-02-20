<?php

namespace App\Config;

use \PDO;

class Database extends Env
{
    private $conn, $stmt, $env;

    public function __construct()
    {
        $this->env = new Env();
    }

    public function getConnect()
    {
        $this->conn = new PDO(
            "mysql:host=" . $this->env::DBHOST
            . ";dbname=" . $this->env::DBNAME
            . ";charset=" . $this->env::DBCHARSET,
            $this->env::DBUSER,
            $this->env::DBPASS
        );
        return $this->conn;

    }


    // nếu như dùng để lấy danh sách thì sẽ truyền true còn truyền false thì
    //sẽ chạy được các câi truy vấn như thêm sửa xóa
    function getData($query, $getAll = true)
    {
        $this->getConnect();
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute();
        if ($getAll) {
            return $this->stmt->fetchAll();
        }
        return $this->stmt->fetch();
    }
}
