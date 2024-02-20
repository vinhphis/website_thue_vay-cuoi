<?php

namespace App\Controllers;

use App\Abstracts\AbstractController;
use App\Interfaces\InterfaceController;
use App\Models\BienTheModel;
use App\Models\ColorModel;
use App\Models\ProductModel;
use App\Models\StyleModel;

class BienTheController extends AbstractController implements InterfaceController
{

    private $bienTheModel, $productModel, $colorMoldel, $styleModel;

    public function __construct()
    {
        $this->bienTheModel = new BienTheModel();
        $this->productModel = new ProductModel();
        $this->colorMoldel = new ColorModel();
        $this->styleModel = new StyleModel();
    }

    public function inThongTin()
    {
        $listBienThe = $this->bienTheModel->selectAll();
        require "../Minton_green/app/Views/Bienthes/list.php";
    }

    public function view_themThongTin()
    {
        $listProduct = $this->productModel->selectAllAction1();
        $listColor = $this->colorMoldel->selectAllAction1();
        $styleModel = $this->styleModel->selectAllAction1();
        require "../Minton_green/app/Views/Bienthes/add.php";
    }

    public function themThongTin()
    {
        if (!empty($_POST['id_product']) && !empty($_POST['id_color']) && !empty($_POST['id_style']) && !empty($_POST['soluong'])) {
            $this->bienTheModel->add($_POST['id_product'], $_POST['id_color'], $_POST['id_style'], $_POST['soluong']);
            $this->success_add();
            $this->inThongTin();
        } else {
            $this->error_add();
        }
    }

    public function xoaThongTin()
    {
        if (isset($_GET['id_bienthe'])) {
            $list = $this->bienTheModel->selectOne($_GET['id_bienthe']);

            if ($list['action'] == 0) {
                $this->bienTheModel->updateAction1($_GET['id_bienthe']);
                $this->success_xoa();
            } else {
                $this->bienTheModel->updateAction($_GET['id_bienthe']);
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
