<?php
$_SESSION['url'] = "/FE_xuong_vaycuoi/app/Views/";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets">
    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../../assets/css/lightbox.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!--

    TemplateMo 571 Hexashop

    https://templatemo.com/tm-571-hexashop

    -->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?= $_SESSION['url'] ?>index.php" class="logo">
                            <img src="../../assets/images/logo_ca_nhan.png" width="130">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?= $_SESSION['url'] ?>index.php" class="">HOME</a></li>
                            <li class="scroll-to-section"><a href="<?= $_SESSION['url'] ?>?gioithieu" class="">GIỚI THIỆU</a></li>
                            <li class="submenu">
                                <a href="javascript:">VÁY CƯỚI ĐẸP</a>
                                <ul>
                                    <?php

                                    use App\Models\CategoryModel;

                                    $categoryModel = new CategoryModel();
                                    $listCategory = $categoryModel->selectAll();
                                    if (isset($listCategory)) {
                                        foreach ($listCategory as  $value) {
                                            extract($value);
                                    ?>
                                            <li class="scroll-to-section"><a href="<?= $_SESSION['url'] ?>?list-san-pham&id_category=<?= $id_category ?>"><?= $name_category ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:">BST VÁY CƯỚI</a>
                                <ul>
                                    <li><a href="#">Phát Triển Sau</a></li>
                                    <li><a href="#">Phát Triển Sau</a></li>
                                    <li><a href="#">Phát Triển Sau</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="<?= $_SESSION['url'] ?>?lienhe" class="">LIÊN HỆ</a></li>
                            <?php
                            if (isset($_SESSION['user'])) {
                            ?>
                                <li class="scroll-to-section" title="Tài khoản <?= $_SESSION['user']['username'] ?>"><a href="<?= $_SESSION['url'] ?>?account"><i class="fa-solid fa-user" style="font-size: 20px;"></i></a></li>
                                <li class="scroll-to-section" title="Giỏ hàng"><a href="<?= $_SESSION['url'] ?>?cart"><i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i></a></li>
                            <?php
                            } else {
                            ?>
                                <li class="scroll-to-section" title="Tài khoản"><a href="<?= $_SESSION['url'] ?>?login"><i class="fa-solid fa-user" style="font-size: 20px;"></i></a></li>
                                <li class="scroll-to-section" title="Giỏ hàng"><a href="<?= $_SESSION['url'] ?>?cart"><i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i></a></li>
                            <?php
                            }
                            ?>

                        </ul>

                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->