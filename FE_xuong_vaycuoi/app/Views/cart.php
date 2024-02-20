<?php
if (isset($_COOKIE['thongbao'])) echo $_COOKIE['thongbao'];

?>
<form action="<?= $_SESSION['url'] ?>?dat-lich" method="post">
    <table class="table table-hover col-10" style="margin: auto; margin-top: 100px;">
        <thead>
            <tr>
                <th></th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Màu sắc và Kiểu dáng</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($bienthe)) {
                foreach ($bienthe as  $value) {
                    extract($value);
                    $imgpath = "../../assets/images/" . $image;
            ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="id_bienthe[]" id="" value="<?= $id_bienthe ?>">
                        </td>
                        <td><?= $name_product ?></td>
                        <td><img src="<?= $imgpath ?>" alt="" height="150"></td>
                        <td><?= $name_color ?> & <?= $name_style ?></td>
                        <td>
                            <a href="#">Xóa</a>
                        </td>
                    </tr>
            <?php

                }
            }
            ?>
            <!-- <p><?php var_dump($_SESSION['cart']) ?></p> -->

        </tbody>

    </table>
    <input type="submit" name="datlich2" id="" class="btn btn-success" value="Tiếp Tục" style="margin-left: 80%; margin-top: 50px; width: 150px;">
</form>