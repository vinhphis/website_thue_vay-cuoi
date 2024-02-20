<!-- ***** Header Area End ***** -->

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Check Our Products</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            if (isset($listProduct)) {
                foreach ($listProduct as  $value) {
                    extract($value);
                    $imagePath = "../../assets/images/" . $image;
                    // echo $imagePath3;
            ?>
                    <div class="col-lg-4">

                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="<?= $_SESSION['dir'] ?>?chi-tiet-san-pham&id_product=<?= $id_product ?>"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                        <!-- <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li> -->
                                    </ul>
                                </div>
                                <img src="<?= $imagePath ?>" alt="" width="350" height="520">
                            </div>
                            <div class="down-content">
                                <h4 style="color: #e6be9f;"><?= $name_product ?></h4>
                                <span>$<?= number_format($price_product) ?></span>
                                <!-- <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul> -->
                            </div>
                        </div>

                    </div>
            <?php
                }
            }
            ?>
            <!-- <div class="col-lg-12">
                <div class="pagination">
                    <ul>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li class="active">
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">></a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- ***** Products Area Ends ***** -->