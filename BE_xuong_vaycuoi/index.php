<?php
session_start();

require "vendor/autoload.php";
include "app/Views/header.php";
include "app/Views/sidebar.php";



use Vinhphis\Templateadmin\Controllers\{ProductController,OrderController, StyleController, BienTheController, Route, CategoryController, ColorController, NameEmailController};

$Route = new Route();
$_SESSION['dir'] = "/BE_xuong_vaycuoi";
// $_SESSION['dir'] = "";
// ProductController
$Route->get("" . $_SESSION['dir'] . "/index.php", [new ProductController(), 'home']);
$Route->get("" . $_SESSION['dir'] . "/?add-product", [new ProductController(), 'view_themThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?list-product", [new ProductController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?update-product", [new ProductController(), 'view_capNhatThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?delete-product", [new ProductController(), 'xoaThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?update-product", [new ProductController(), 'capNhatThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?add-product", [new ProductController(), 'themThongTin']);
// CategoryController
$Route->get("" . $_SESSION['dir'] . "/?list-category", [new CategoryController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?add-category", [new CategoryController(), 'view_themThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?delete-category", [new CategoryController(), 'xoaThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?add-category", [new CategoryController(), 'themThongTin']);
// ColorController
$Route->get("" . $_SESSION['dir'] . "/?list-color", [new ColorController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?add-color", [new ColorController(), 'view_themThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?update-color", [new ColorController(), 'view_capNhatThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?delete-color", [new ColorController(), 'xoaThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?update-color", [new ColorController(), 'capNhatThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?add-color", [new ColorController(), 'themThongTin']);
// StyleController
$Route->get("" . $_SESSION['dir'] . "/?list-style", [new StyleController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?add-style", [new StyleController(), 'view_themThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?update-style", [new StyleController(), 'view_capNhatThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?delete-style", [new StyleController(), 'xoaThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?update-style", [new StyleController(), 'capNhatThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?add-style", [new StyleController(), 'themThongTin']);
// BienTheController
$Route->get("" . $_SESSION['dir'] . "/?list-bienthe", [new BienTheController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?add-bienthe", [new BienTheController(), 'view_themThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?update-bienthe", [new BienTheController(), 'view_capNhatThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?delete-bienthe", [new BienTheController(), 'xoaThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?update-bienthe", [new BienTheController(), 'capNhatThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?add-bienthe", [new BienTheController(), 'themThongTin']);

// nameEmailController
$Route->get("" . $_SESSION['dir'] . "/?list-name-email", [new NameEmailController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?list-lich-hen", [new NameEmailController(), 'inThongTinLichHen']);

// OrderController
$Route->get("" . $_SESSION['dir'] . "/?list-don-hang", [new OrderController(), 'inThongTin']);
$Route->get("" . $_SESSION['dir'] . "/?add-don-hang", [new OrderController(), 'view_themThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?bill-ban-hang", [new OrderController(), 'view_capNhatThongTin']);
$Route->post("" . $_SESSION['dir'] . "/?pay", [new OrderController(), 'pay']);
$Route->post("" . $_SESSION['dir'] . "/?success-order", [new OrderController(), 'success_order']);
// xử lý route
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

if (strstr($url, "&")) { // kiểm tra xem trong chuỗi có kí tự "&" không
    $cutIndex = strpos($url, "&"); // Tìm vị trí của ký tự "&"
    $urlNew = substr($url, 0, $cutIndex); // Cắt chuỗi từ vị trí 0 đến vị trí của "&"
    $Route->handleRoute($urlNew, $method);
} else {
    $Route->handleRoute($url, $method);
}


include "app/Views/footer.php";
