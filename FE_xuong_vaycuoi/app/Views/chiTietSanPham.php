<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2 style="color: #e6be9f;">Single Product Page</h2>
                    <!-- <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <form class="container" method="post" action="<?= $_SESSION['dir'] ?>?dat-lich">
        <?php
        if (isset($listOneProduct)) :
            extract($listOneProduct);
            $imagePath = "../../assets/images/" . $image;

        ?>
            <div class="row">
                <div class="col-lg-7">
                    <div class="left-images">
                        <img src="<?= $imagePath ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-content">
                        <h4><?= $name_product ?></h4>
                        <span class="price">$<?= number_format($price_product) ?></span>

                        <!-- Mô tả -->
                        <span><?= $mota ?></span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        <div class="quantity-content">
                            <select name="id_style" id="chon_style" class="form-control" <?php if (empty($listStyle)) echo "disabled" ?>>
                                <option value="" hidden>-- Vui Lòng Chọn Kiểu Dáng --</option>
                                <?php
                                if (isset($listStyle)) :
                                    foreach ($listStyle as $value) :
                                        extract($value);
                                ?>
                                        <option value="<?= $id_style ?>"><?= $name_style ?></option>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                            <div class="quantity-content">
                                <select name="id_color" id="chon_mau" class="form-control" <?php if (empty($listColor)) echo "disabled" ?>>
                                    <option value="" hidden>-- Vui Lòng Chọn Màu Sắc --</option>
                                    <?php
                                    if (isset($listColor)) :
                                        foreach ($listColor as $value) :
                                            extract($value);
                                    ?>
                                            <option value="<?= $id_color ?>"><?= $name_color ?></option>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="total"> -->

                        <div class="main-border-button" style="display: flex; justify-content: space-between;">

                            <input type="hidden" name="id_product" id="id_sp" value="<?= $id_product ?>">
                            <input type="hidden" name="name_product" value="<?= $name_product ?>">
                            <input type="hidden" name="price_product" value="<?= $price_product ?>">
                            <input type="hidden" name="image" value="<?= $image ?>">
                            <input type="submit" name="datlich1" id="" value="Đặt Lịch" style="background-color: bisque;">
                            <input type="submit" name="themgiohang" id="" value="Thêm Giỏ Hàng" class="btn btn-danger">
     
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>
    </form>
</section>
<!-- ***** Product Area Ends ***** -->