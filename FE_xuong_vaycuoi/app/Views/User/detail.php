<div class="container " style="margin-top: 100px;">
    <h2>Xin chào : <?= $_SESSION['user']['username'] ?></h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home">Thông tin tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu1">Sản phẩm yêu thích</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu2">Lịch hẹn của bạn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $_SESSION['url'] ?>?logout">Đăng Xuất</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <form action="/action_page.php">
                <div class="mb-3 mt-3">

                    <label for="" class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" name="hoten" value="<?= $_SESSION['user']['ho_ten'] ?>">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Số điện thoại:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Email:</label>
                    <input type="text" class="form-control" value="<?= $_SESSION['user']['email'] ?>" placeholder="Enter password" name="pswd" readonly>
                </div>

                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" value="<?= $_SESSION['user']['password'] ?>" placeholder="Enter password" name="pswd">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>

            </form>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="">Họ tên</th>
                        <th scope="col" class="">Email</th>
                        <th scope="col" class="">Số điện thoại </th>
                        <th scope="col" class="">Ngày hẹn</th>
                        <th scope="col" class="">Ghi chú</th>
                        <!-- <th scope="col" class="col-3">Màu sắc & Kiểu dáng</th>
                                                <th scope="col" class="col-2">Số lượng</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    use App\Models\DetailDatLichModel;

                    if (isset($listProduct)) {
                        foreach ($listProduct as  $value) {
                            extract($value);
                           
                    ?>
                            <!-- hàng cha -->
                            <tr data-toggle="collapse" data-target="#collapse<?= $id_appointment_date ?>" aria-expanded="false" aria-controls="collapse<?= $id_appointment_date ?>" style="cursor: pointer;">
                                <td><?= $ho_ten ?></td>
                                <td><?= $email ?></td>
                                <td><?= $phone ?></td>
                                <td><?= $ngay_hen ?></td>
                                <td><?= $ghi_chu ?></td>
                               
                            </tr>
                            <?php
                            $listBienThe = new DetailDatLichModel();
                            $selectbt = $listBienThe->selectLichHenAccount($id_appointment_date);

                            foreach ($selectbt as  $value1) :
                                $imgpath = "/FE_xuong_vaycuoi/assets/images/" . $value1['image']
                            ?>
                                <!-- hàng con -->
                                <tr>
                                    <td class="collapse" id="collapse<?= $id_appointment_date ?>" colspan="2">
                                        <img src="<?=$imgpath?>" alt="" height="100px">
                                        
                                    </td>
                                    <td class="collapse" id="collapse<?= $id_appointment_date ?>">
                                        <strong>Tên Sản Phẩm :</strong> <?= $value1['name_product'] ?>
                                    </td>
                                    <td class="collapse" colspan="2" id="collapse<?= $id_appointment_date ?>">
                                        <strong>Màu sắc & Kiểu dáng :</strong> <?= $value1['name_color'] ?> & <?= $value1['name_style'] ?>
                                    </td>

                                </tr>
                    <?php
                            endforeach;
                        }
                    }
                    ?>

                    <!-- <tr data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <td>Dữ liệu hàng 4</td>
                        <td>Dữ liệu hàng 5</td>
                        <td>Dữ liệu hàng 6</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="collapse" id="collapse2">
                            Nội dung con của hàng 2
                        </td>
                        <td colspan="3" class="collapse" id="collapse2">
                            Nội dung con của hàng 2
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>