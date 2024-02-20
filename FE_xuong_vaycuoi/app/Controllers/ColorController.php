<?php

namespace App\Controllers;

use App\Abstracts\AbstractController;
use App\Interfaces\InterfaceController;
use App\Models\ColorModel;

class ColorController extends AbstractController implements InterfaceController
{
public function __construct()
{
    $this->colorModel = new ColorModel();
}

    public function success_add()
    {
        echo '<script>alert("Thêm Màu Sắc Thành Công")</script>';
    }

    public function success_update()
    {
        echo '<script>alert("Cập nhật Màu Sắc Thành Công")</script>';
    }

    public function success_xoa()
    {
        echo '<script>alert("Xóa Màu Sắc Thành Công")</script>';
    }

    public function error_add()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }

    public function error_update()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }

    public function inThongTin()
    {
        $listColor = $this->colorModel->selectAll();
        require "../Minton_green/app/Views/Colors/list.php";
    }

    public function view_themThongTin()
    {
        require "../Minton_green/app/Views/Colors/add.php";
    }

    public function themThongTin()
    {
       if(!empty($_POST['nameColor'])){
           $this->colorModel->add($_POST['nameColor']);
           $this->success_add();
           $this->inThongTin();
       }else{
           $this->error_add();
           $this->view_themThongTin();
       }
    }

    public function xoaThongTin()
    {
        if (isset($_GET['id_color'])) {
            $list =  $this->colorModel->selectOne($_GET['id_color']);

            if ($list['action'] == 0) {
                $this->colorModel->updateAction1($_GET['id_color']);
                $this->success_xoa();
            } else {
                $this->colorModel->updateAction($_GET['id_color']);
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
}