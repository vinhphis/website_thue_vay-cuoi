<?php

namespace Vinhphis\Templateadmin\Controllers;

ob_start();

use Vinhphis\Templateadmin\Abstracts\AbstractController;
use Vinhphis\Templateadmin\Models\CategoryModel;
use Vinhphis\Templateadmin\Models\ProductModel;
use Vinhphis\Templateadmin\Models\ThongKeModel;

class ProductController extends AbstractController
{
    private $productModel, $categoryModel, $thongKeModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->thongKeModel = new ThongKeModel();
    }

    public function success_add()
    {
        echo '<script>alert("Thêm Sản Phẩm Thành Công")</script>';
    }

    public function success_update()
    {
        echo '<script>alert("Cập nhật Sản Phẩm Thành Công")</script>';
    }

    public function success_xoa()
    {
        echo '<script>alert("Xóa Sản Phẩm Thành Công")</script>';
    }

    public function error_add()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }

    public function error_update()
    {
        echo '<script>alert("Không được bỏ trống thông tin")</script>';
    }

    public function home()
    {
        $CountAccount = $this->thongKeModel->countAccount();
        $TongTien = $this->thongKeModel->tongTien();
        $TongTienThang = $this->thongKeModel->tongTienThang();
        $TongSanPham = $this->thongKeModel->tongSanPham();
        require "./app/Views/home.php";
    }

    public function inThongTin()
    {
        $listProduct = $this->productModel->selectAll();
        require "./app/Views/Products/list.php";
    }

    public function view_themThongTin()
    {
        $listCategory = $this->categoryModel->selectAll();
        require "./app/Views/Products/add.php";
    }

    public function themThongTin()
    {
        if (isset($_POST['add'])) {
            if (!empty($_POST['nameProduct']) && !empty($_POST['priceProuct']) && !empty($_FILES['imageProduct']['name']) && !empty($_POST['id_category']) && !empty($_POST['mota'])) {
                $target_dir = "./public/images/";
                $target_file = $target_dir . basename($_FILES['imageProduct']['name']);
                move_uploaded_file($_FILES['imageProduct']['tmp_name'], $target_file);
                $this->productModel->add($_POST['nameProduct'], $_POST['priceProuct'], $_FILES['imageProduct']['name'], $_POST['id_category'], $_POST['mota']);
                $this->success_add();
                $this->view_themThongTin();
            } else {
                $this->error_add();
                $this->view_themThongTin();
            }
        }
    }

    public function xoaThongTin()
    {
        if (isset($_GET['product_id'])) {
            $list =  $this->productModel->selectOne($_GET['product_id']);

            if ($list['action'] == 0) {
                $this->productModel->updateAction1($_GET['product_id']);
                $this->success_xoa();
            } else {
                $this->productModel->updateAction($_GET['product_id']);
                $this->success_xoa();
            }
        }
        $this->inThongTin();
    }

    public function view_capNhatThongTin()
    {
        $listProduct = $this->productModel->selectOne($_GET['product_id']);
        $listCategory = $this->categoryModel->selectAll();
        require "./app/Views/Products/update.php";
    }

    public function capNhatThongTin()
    {
        if (!empty($_POST['nameProduct']) && !empty($_POST['priceProuct']) && !empty($_POST['id_category']) && !empty($_POST['mota'])) {
            $target_dir = "./public/images/";
            $target_file = $target_dir . basename($_FILES['imageProduct']['name']);

            move_uploaded_file($_FILES['imageProduct']['tmp_name'], $target_file);

            $this->productModel->update($_POST['id_product'], $_POST['nameProduct'], $_POST['priceProuct'], $_FILES['imageProduct']['name'], $_POST['id_category'], $_POST['mota']);

            $this->success_update();
            $this->inThongTin();
        } else {

            $this->error_update();
            $this->inThongTin();
        }
    }
}

ob_end_flush();
