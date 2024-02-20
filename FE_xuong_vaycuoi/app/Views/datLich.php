<!-- ***** Main Banner Area Start ***** -->
<!-- <div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
             
            </div>
        </div>
    </div>
</div> -->
<!-- ***** Main Banner Area End ***** -->


<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <form class="container" method="post" action="<?= $_SESSION['dir'] ?>?bill">

        <div class="row">
            <div class="col-lg-8">

                <div class="group-form">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" name="hoten" id="" placeholder="Nhập họ tên">
                </div>
                <div class="group-form">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="" placeholder="Nhập email">
                </div>
                <div class="group-form">
                    <label for="">Số Điện Thoại</label>
                    <input type="text" class="form-control" name="sdt" id="" placeholder="Nhập số điện thoại">
                </div>

                <div class="group-form">
                    <label for="">Thời Gian Hẹn</label>
                    <input type="datetime-local" class="form-control" name="thoigian" id="" min="">
                </div>

                <div class="group-form">
                    <label for="">Ghi Chú</label>
                    <textarea name="ghichu" id="" cols="30" rows="10" class="form-control" placeholder="Nhập ghi chú..."></textarea>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="right-content">
                    <?php
                    if (isset($myArr)) :
                        $imagePath = "../../assets/images/" . $myArr[3];
                    ?>
                        <h4><?= $myArr[1] ?></h4>
                        <span class="price">$<?= number_format($myArr[2]) ?></span>
                        <img src="<?= $imagePath ?>" alt="ảnh sản phẩm" width="100%">
                        <div class="quantity-content">
                            <label for="">Màu Sắc</label>
                            <input type="text" value="<?= $myArr[4] ?>" class="form-control" name="" readonly>
                            <label for="">Kiểu Dáng</label>
                            <input type="text" value="<?= $myArr[5] ?>" class="form-control" name="" readonly>
                            <input type="hidden" name="id_color" value="<?= $myArr[6] ?>">
                            <input type="hidden" name="id_style" value="<?= $myArr[7] ?>">
                            <input type="hidden" name="id_product" value="<?= $myArr[0] ?>">
                            <input type="hidden" name="nameProduct" value="<?= $myArr[1] ?>">
                            <input type="hidden" name="priceProduct" value="<?= $myArr[2] ?>">
                            <input type="hidden" name="nameColor" value="<?= $myArr[5] ?>">
                            <input type="hidden" name="nameStyle" value="<?= $myArr[4] ?>">
                        </div>
                        <div class="total">
                            <div class="main-border-button">
                                <input type="submit" value="Hoàn Tất" name="success_order1">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php
                    if (isset($bienthe)) :
                    ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Màu sắc & Kiểu dáng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($bienthe as  $value) :
                                    extract($value);
                                    $imgpath = "../../assets/images/" . $image;
                                ?>
                                    <tr>
                                        <td><img src="<?= $imgpath ?>" alt="" height="150px"></td>
                                        <td><?= $name_product ?></td>
                                        <td>
                                            <?= $name_color ?> &
                                            <?= $name_style ?>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="id_bienthe[]" id="" value="<?= $id_bienthe ?>">
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="total">
                            <div class="main-border-button">
                                <input type="submit" value="Hoàn Tất" name="success_order2">
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </form>
</section>
<!-- ***** Product Area Ends ***** -->