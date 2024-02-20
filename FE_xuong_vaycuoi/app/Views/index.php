<?php
ob_start();
session_start();
include  "../../vendor/autoload.php";

use App\Controllers\{DetailOrderController, DetailUserController, LichHenController, ProductController, Route, UserController};
use App\Models\LichHenModel;

require 'header.php';

$Route = new Route();
$_SESSION['dir']  = "/FE_xuong_vaycuoi/app/Views/";
// xử lý điều hướngT
$Route->get("" . $_SESSION['dir'] . "index.php", [new ProductController(), "home"]);
$Route->get("" . $_SESSION['dir'] . "?gioithieu", [new ProductController(), "gioithieu"]);
$Route->get("" . $_SESSION['dir'] . "?lienhe", [new ProductController(), "lienhe"]);
$Route->get("" . $_SESSION['dir'] . "?list-san-pham", [new ProductController(), "list_san_pham"]);
$Route->get("" . $_SESSION['dir'] . "?chi-tiet-san-pham", [new ProductController(), "chi_tiet_san_pham"]);
$Route->get("" . $_SESSION['dir'] . "?dat-lich", [new ProductController(), "getDatLich"]);
$Route->get("" . $_SESSION['dir'] . "?checkColor", [new ProductController(), "checkColor"]);
$Route->get("" . $_SESSION['dir'] . "?checkStyle", [new ProductController(), "checkStyle"]);
$Route->post("" . $_SESSION['dir'] . "?senDetail", [new ProductController(), "senDetail"]);
$Route->post("" . $_SESSION['dir'] . "?dat-lich", [new ProductController(), "dat_lich"]);

// UserController
$Route->get("" . $_SESSION['dir'] . "?login", [new UserController(), "login"]);
$Route->post("" . $_SESSION['dir'] . "?login", [new UserController(), "login"]);
$Route->get("" . $_SESSION['dir'] . "?register", [new UserController(), "register"]);
$Route->post("" . $_SESSION['dir'] . "?register", [new UserController(), "register"]);
$Route->get("" . $_SESSION['dir'] . "?account", [new UserController(), "account"]);
$Route->get("" . $_SESSION['dir'] . "?logout", [new UserController(), "logout"]);

$Route->post("" . $_SESSION['dir'] . "?bill", [new LichHenController(), "bill"]);
$Route->get("" . $_SESSION['dir'] . "?cart", [new DetailOrderController(), "cart"]);
// xử lý route
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
echo $url;
if (strstr($url, "&")) { // kiểm tra xem trong chuỗi có kí tự "&" không
    $cutIndex = strpos($url, "&"); // Tìm vị trí của ký tự "&"
    $urlNew = substr($url, 0, $cutIndex); // Cắt chuỗi từ vị trí 0 đến vị trí của "&"
    $Route->handleRoute($urlNew, $method);
} else {
    $Route->handleRoute($url, $method);
}
require 'footer.php';
ob_end_flush();
