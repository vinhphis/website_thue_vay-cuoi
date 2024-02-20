<?php

namespace App\Controllers;



use App\Abstracts\AbstractController;
use App\Models\{BienTheModel, ProductModel, CategoryModel, ColorModel, DetailDatLichModel, DetailOrderModel, LichHenModel, OrderModel, StyleModel, NameEmailModel};


class ProductController
{
    protected $productModel, $nameEmaiModel, $detailDatLichModel, $orderModel, $categoryModel, $styleModel, $colorModel, $bienTheModel, $detailOrderModel;

    public function __construct()
    {
        $this->orderModel = new LichHenModel();
        $this->bienTheModel = new BienTheModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->styleModel = new StyleModel();
        $this->colorModel = new ColorModel();
        $this->nameEmaiModel = new NameEmailModel();
        $this->detailOrderModel = new DetailOrderModel();
        $this->detailDatLichModel = new DetailDatLichModel();
    }

    public function success_add()
    {
        echo '<script>alert("Bạn đã gửi thành công, chúc bạn ngày mới tốt lành")</script>';
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

        $listProduct = $this->productModel->selectAll($id_category = "");
        $listCategory = $this->categoryModel->selectAll();
        $listProductThue = $this->orderModel->selectTopThueProduct();
        $listProductLuotXem = $this->productModel->selectTopLuotXem();
        include  "../Views/home.php";
    }

    public function gioithieu()
    {
        include "../Views/about.php";
    }
    public function lienhe()
    {
        include "../Views/lienHe.php";
    }
    public function list_san_pham()
    {
        if (isset($_GET['id_category'])) {
            $id_category = $_GET['id_category'];
        } else {
            $id_category = "";
        }
        $listProduct = $this->productModel->selectAll($id_category);
        require "../Views/products.php";
    }
    public function senDetail()
    {
        // if (!empty($_POST['name']) && !empty($_POST['email'])) {

        // }
        $this->nameEmaiModel->themThongTin($_POST['name'], $_POST['email']);
        $this->success_add();
        $this->home();
    }
    public function chi_tiet_san_pham()
    {
        if (isset($_GET['id_product'])) {
            $this->productModel->updateLuotXem($_GET['id_product']);
            $listOneProduct =  $this->productModel->selectOne($_GET['id_product']);
            $listStyle = $this->bienTheModel->check_style_bien_the($_GET['id_product']);
            $listColor = $this->bienTheModel->check_color_bien_the($_GET['id_product']);
        }

        require "../Views/chiTietSanPham.php";
    }

    public function dat_lich()
    {

        if (isset($_POST['datlich1'])) {
            if (!empty($_POST['id_style']) && !empty($_POST['id_color'])) {
                $nameStyle = $this->styleModel->selectOne($_POST['id_style']);
                $nameColor = $this->colorModel->selectOne($_POST['id_color']);
                $myArr = [
                    $_POST['id_product'],
                    $_POST['name_product'],
                    $_POST['price_product'],
                    $_POST['image'],
                    $nameStyle['name_style'],
                    $nameColor['name_color'],
                    $_POST['id_color'],
                    $_POST['id_style'],
                ];
                require "../Views/datLich.php";
            } else {
                echo "Vui lòng chọn màu sắc và kiểu dáng để tiếp tục";
                header("location: /app/Views/?chi-tiet-san-pham&id_product=" . $_POST['id_product']);
            }
        }

        if (isset($_POST['datlich2'])) {
            if (empty($_POST['id_bienthe'])) {
                $thongbao = "<script>
                alert('Vui lòng chọn sản phẩm');
                    </script>";
                setcookie("thongbao", $thongbao, time() + 1);
                header("location: " . $_SESSION['url'] . "?cart ");
            } else {

                $id_bienthe = join(",", $_POST['id_bienthe']);
                $bienthe = $this->bienTheModel->selectAll($id_bienthe, "");

                require "../Views/datLich.php";
            }
        }

        if (isset($_POST['themgiohang']) || isset($_GET['themgiohang'])) {

            $id_bienthe =   $this->bienTheModel->check_bien_the($_POST['id_product'], $_POST['id_color'], $_POST['id_style']);

            if (!isset($_SESSION['cart']))  $_SESSION['cart'] = [];

            if (!isset($_SESSION['user'])) {

                if (!in_array($id_bienthe['id_bienthe'], $_SESSION['cart'])) {
                    // Sử dụng array_unshift để thêm giá trị $_GET['id_product'] vào đầu mảng $_SESSION['cart']
                    if (!empty($id_bienthe['id_bienthe']))  array_unshift($_SESSION['cart'], $id_bienthe['id_bienthe']);
                }
                $id_bienthe = join(",", $_SESSION['cart']);
                // unset($_SESSION['cart']);

                $bienthe = $this->bienTheModel->selectAll($id_bienthe, "");
                // var_dump($bienthe);
                // die;
            } else {
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as  $value) {
                        $checkBienThe = $this->bienTheModel->checkIdBienThe($value, $_SESSION['user']['id_account']);
                        // var_dump($checkBienThe);
                        if (!$checkBienThe) {
                            $_SESSION['id_bienthe'] = $value;

                            $this->detailDatLichModel->add($_SESSION['user']['id_account'], $_SESSION['id_bienthe']);
                        }
                        unset($_SESSION['id_bienthe']);
                    }
                    unset($_SESSION['cart']);
                }
                $id_bienthe = $this->bienTheModel->check_bien_the($_POST['id_product'], $_POST['id_color'], $_POST['id_style']);
                // var_dump($_SESSION['cart']['id_bienthe']);
                $this->detailDatLichModel->add($_SESSION['user']['id_account'], $id_bienthe['id_bienthe']);
                $bienthe = $this->bienTheModel->selectAll("", $_SESSION['user']['id_account']);
            }

            require '../Views/cart.php';
        }
    }
}
