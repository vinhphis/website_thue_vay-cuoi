<!-- ***** Main Banner Area Start ***** -->


<div class="main-banner" id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <div class="thumb">
                        <div class="inner-content">
                            <h4>We Are VGshop</h4>
                            <!-- <span>Awesome, clean &amp; creative HTML5 Template</span> -->
                            <div class="main-border-button">
                                <a href="<?= $_SESSION['dir'] ?>?list-san-pham">Xem Ngay!</a>
                            </div>
                        </div>
                        <img src="../../assets/images/luxury-brown-long-sleeves-beading-appliques-wedding-dress-os4026-ostty-bridal-party-dresses-738.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <?php
                        if (isset($listCategory)) {
                            foreach ($listCategory as  $value) {
                                extract($value);
                                // $imagePath = "C:\Users\TruonG Isme\Desktop\website_thue_vay-cuoi\BE_xuong_vaycuoi\public\images\\".$image ;
                                // $imagePath2 = "../../../BE_xuong_vaycuoi/public/images/".$image;
                                $imagePath = "../../assets/images/" . $img_category;
                                // echo $imagePath3;
                        ?>
                                <div class="col-lg-6">
                                    <div class="right-first-image">
                                        <div class="thumb">
                                            <div class="inner-content">
                                                <h4><?= $name_category ?></h4>
                                                <!-- <span>Best Clothes For Women</span> -->
                                            </div>
                                            <div class="hover-content">
                                                <div class="inner">
                                                    <h4><?= $name_category ?></h4>
                                                    <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                    <div class="main-border-button">
                                                        <a href="<?= $_SESSION['dir'] ?>?list-san-pham&id_category=<?= $id_category ?>">Khám Phá Ngay</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="<?= $imagePath ?>">
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Men Area Starts ***** -->
<section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>BST Váy Cưới Mùa Đông</h2>
                    <!-- <span>Details to details is what makes Hexashop different from the other themes.</span> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        <?php
                        // echo "<pre>";
                        // var_dump($_SESSION['cart']);
                        // echo "</pre>";
                        if (isset($listProduct)) {
                            foreach ($listProduct as  $value) {
                                extract($value);

                                // $imagePath = "C:\Users\TruonG Isme\Desktop\website_thue_vay-cuoi\BE_xuong_vaycuoi\public\images\\".$image ;
                                // $imagePath2 = "../../../BE_xuong_vaycuoi/public/images/".$image;
                                $imagePath3 = "../../assets/images/" . $image;
                                // echo $imagePath3;
                        ?>

                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="<?= $_SESSION['dir'] ?>?chi-tiet-san-pham&id_product=<?= $id_product ?>"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <!-- <li><a href="<?= $_SESSION['dir'] ?>?cart&id_product=<?= $id_product ?>"><i class="fa fa-shopping-cart"></i></a></li> -->
                                            </ul>
                                        </div>
                                        <!-- <img src="../../assets/images/420022239da73d50ff33d52c7595b0bd.jpg" alt=""> -->
                                        <!-- <img src="<?= $imagePath ?>" alt="123">
                                        <img src="<?= $imagePath2 ?>" alt="12344">  -->
                                        <img src="<?= $imagePath3 ?>" alt="" height="400" width="300" style="object-fit: cover;">
                                    </div>
                                    <div class="down-content">
                                        <h4><?= $name_product ?></h4>
                                        <span><?= number_format($price_product) ?> VNĐ</span>
                                        <!-- <ul class="stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul> -->
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Men Area Ends ***** -->

<!-- ***** Women Area Starts ***** -->
<section class="section" id="women">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>BST Váy Cưới Hot Trend</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="women-item-carousel">
                    <div class="owl-women-item owl-carousel">
                        <?php
                        if (isset($listProductThue)) {
                            foreach ($listProductThue as  $value) {
                                extract($value);
                                // $imagePath = "C:\Users\TruonG Isme\Desktop\website_thue_vay-cuoi\BE_xuong_vaycuoi\public\images\\".$image ;
                                // $imagePath2 = "../../../BE_xuong_vaycuoi/public/images/".$image;
                                $imagePath3 = "../../assets/images/" . $image;
                                // echo $imagePath3;
                        ?>

                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="<?= $_SESSION['dir'] ?>?chi-tiet-san-pham&id_product=<?= $id_product ?>"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                                            </ul>
                                        </div>
                                        <!-- <img src="../../assets/images/420022239da73d50ff33d52c7595b0bd.jpg" alt=""> -->
                                        <!-- <img src="<?= $imagePath ?>" alt="123">
                                        <img src="<?= $imagePath2 ?>" alt="12344">  -->
                                        <img src="<?= $imagePath3 ?>" alt="" height="400" width="300" style="object-fit: cover;">
                                    </div>
                                    <div class="down-content">
                                        <h4><?= $name_product ?></h4>
                                        <span><?= number_format($price_product) ?> VNĐ</span>
                                        <!-- <ul class="stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul> -->
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- ***** Women Area Ends ***** -->

<!-- ***** Kids Area Starts ***** -->
<section class="section" id="kids">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Váy Cưới Nổi Bật</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="kid-item-carousel">
                    <div class="owl-kid-item owl-carousel">

                        <?php
                        var_dump($_SESSION['cart']);
                        // var_dump($_SESSION['user']['id_account']);
                        if (isset($listProductLuotXem)) {
                            foreach ($listProductLuotXem as  $value) {
                                extract($value);
                                $imagePath3 = "../../assets/images/" . $image;

                        ?>
                                <div class="item">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <ul>
                                                <li><a href="<?= $_SESSION['dir'] ?>?chi-tiet-san-pham&id_product=<?= $id_product ?>"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <!-- <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                                            </ul>
                                        </div>
                                        <img src="<?= $imagePath3 ?>" alt="" height="400" width="300" style="object-fit: cover;">
                                    </div>
                                    <div class="down-content">
                                        <h4><?= $name_product ?></h4>
                                        <span><?= number_format($price_product) ?> VNĐ</span>
                                        <!-- <ul class="stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul> -->
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Kids Area Ends ***** -->

<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>Explore Our Products</h2>
                    <span>You are allowed to use this HexaShop HTML CSS template. You can feel free to modify or edit this layout. You can convert this template as any kind of ecommerce CMS theme as you wish.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                    </div>
                    <p>There are 5 pages included in this HexaShop Template and we are providing it to you for absolutely free of charge at our TemplateMo website. There are web development costs for us.</p>
                    <p>If this template is beneficial for your website or business, please kindly <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> a little via PayPal. Please also tell your friends about our great website. Thank you.</p>
                    <div class="main-border-button">
                        <a href="<?= $_SESSION['dir'] ?>?list-san-pham">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="leather">
                                <img src="../../assets/images/a3.png" alt="" width="255" height="255">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="first-image">
                                <img src="../../assets/images/a4.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="second-image">
                                <img src="../../assets/images/a1.jpg" alt="" width="255" height="255" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="types">
                                <img src="../../assets/images/a2.png" alt="" width="255" height="255">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Explore Area Ends ***** -->



<!-- ***** Subscribe Area Starts ***** -->
<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-heading">
                    <h2>Hot!! Nhập thông tin liên lạc của bạn để nhận được ưu đãi của chúng tôi.</h2>
                    <span>Details to details is what makes Hexashop different from the other themes.</span>
                </div>
                <form id="subscribe" action="<?= $_SESSION['url'] ?>?senDetail" method="post">
                    <div class="row">
                        <div class="col-lg-5">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-5">
                            <fieldset>
                                <input name="email" type="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-2">
                            <fieldset>

                                <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>Store Location:<br><span>FPT Polytechnic</span></li>
                            <li>Phone:<br><span>098-108-5402</span></li>
                            <li>Office Location:<br><span>FPT Polytechnic</span></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li>Work Hours:<br><span>24/7 Daily</span></li>
                            <li>Email:<br><span>vinhpqph37185@fpt.edu.vn</span></li>
                            <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Subscribe Area Ends ***** -->