<?php

namespace Vinhphis\Templateadmin\Controllers;

use Vinhphis\Templateadmin\Abstracts\AbstractController;
use Vinhphis\Templateadmin\Interfaces\InterfaceController;
use Vinhphis\Templateadmin\Models\CategoryModel;

class CategoryController extends AbstractController implements InterfaceController
{

    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function inThongTin()
    {
        $listCategory = $this->categoryModel->selectAll();
        require "./app/Views/Categorys/list.php";
    }

    public function view_themThongTin()
    {
        require "./app/Views/Categorys/add.php";
    }

    public function themThongTin()
    {
        if (!empty($_POST['nameCategory'])) {
            $this->categoryModel->add($_POST['nameCategory']);
            $this->success_add();
        } else {
            $this->error_add();
        }
    }

    public function xoaThongTin()
    {
        if (isset($_GET['id_category'])) {
            $list =  $this->categoryModel->selectOne($_GET['id_category']);
         
            if ($list['action'] == 0) {
                $this->categoryModel->updateAction1($_GET['id_category']);
                $this->success_xoa();
            } else {
                $this->categoryModel->updateAction($_GET['id_category']);
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
