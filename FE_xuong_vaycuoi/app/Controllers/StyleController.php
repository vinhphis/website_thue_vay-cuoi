<?php

namespace App\Controllers;

use App\Abstracts\AbstractController;
use App\Interfaces\InterfaceController;
use App\Models\StyleModel;

class StyleController extends AbstractController implements InterfaceController
{

    private $styleModel;

    public function __construct()
    {
        $this->styleModel = new StyleModel();
    }

    public function inThongTin()
    {
        $liststyle = $this->styleModel->selectAll();
        require "../Minton_green/app/Views/Styles/list.php";
    }

    public function view_themThongTin()
    {
        require "../Minton_green/app/Views/Styles/add.php";
    }

    public function themThongTin()
    {
        if (!empty($_POST['nameStyle'])) {
            $this->styleModel->add($_POST['nameStyle']);
            $this->success_add();
        } else {
            $this->error_add();
        }
    }

    public function xoaThongTin()
    {
        if (isset($_GET['id_style'])) {
            $list =  $this->styleModel->selectOne($_GET['id_style']);
         
            if ($list['action'] == 0) {
                $this->styleModel->updateAction1($_GET['id_style']);
                $this->success_xoa();
            } else {
                $this->styleModel->updateAction($_GET['id_style']);
                $this->success_xoa();
            }
        }
        $this->inThongTin();
    }
    public function view_capNhatThongTin()
    {
        // TODO: Implement view_capNhatThongTin() method.
    }

    public function capNhatThongTin()
    {
        // TODO: Implement capNhatThongTin() method.
    }


    public function success_add()
    {
        echo '<script>alert("Thêm Danh Mục Thành Công")</script>';
    }

    public function success_update()
    {
        echo '<script>alert("Cập nhật Danh Mục Thành Công")</script>';
    }

    public function success_xoa()
    {
        echo '<script>alert("Xóa Danh Mục Thành Công")</script>';
    }

    public function error_add()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }

    public function error_update()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }
}
