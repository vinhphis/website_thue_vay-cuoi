<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang Chú</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Quản Lý Đơn Hàng</a></li>
                                <li class="breadcrumb-item active">Danh Sách Đơn Hàng</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Danh Sách Đơn Hàng</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">


                        <div class="mb-2">
                            <div class="row">
                                <div class="col-12 text-sm-center form-inline">
                                    <div class="form-group mr-2">
                                        <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                            <option value="" hidden>Show all</option>
                                            <option value="active">Active</option>
                                            <option value="disabled">Disabled</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                    </div>
                                </div>
                                <!-- <div class="col-12 text-lg-right mr-2">
                                    <a href="<?= $_SESSION['dir'] ?>/?add-bienthe" class="btn btn-success">Thêm Biến Thể</a>
                                </div> -->
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                <thead>
                                    <tr>
                                        <th data-toggle="true">Họ Tên</th>
                                        <th data-toggle="true">Email</th>
                                        <th data-toggle="true">Số Điện Thoại</th>
                                        <th data-toggle="true">Địa Chỉ</th>
                                        <th data-toggle="true">Ngày Đặt</th>
                                        <th data-toggle="true">Ngày Trả</th>
                                        <th data-toggle="true">Tổng Tiền</th>
                                        <!-- <th data-hide="phone, tablet">Status</th> -->
                                        <th>Tác Vụ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($listDonHang)) :
                                        foreach ($listDonHang as $value) :
                                            extract($value);
                                            // $xoaProduct = $_SESSION['dir'] . "/?delete-bienthe&id_bienthe=" . $id_bienthe;
                                            // $suaProduct = $_SESSION['dir'] . "/?update-bienthe&id_bienthe=" . $id_bienthe;
                                    ?>
                                            <tr>
                                                <td><?= $ho_ten ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $sdt ?></td>
                                                <td><?= $dia_chi ?></td>
                                                <td><?= $ngay_dat ?></td>
                                                <td><?= $ngay_tra ?></td>
                                                <td><?= $tong_tien ?></td>
                                                <!-- <?php
                                                if ($action == 0) {
                                                    echo ' <td><span class="badge label-table badge-secondary">Disabled</span></td>';
                                                } else if ($action == 1) {
                                                    echo ' <td><span class="badge label-table badge-success">Active</span></td>';
                                                } else if ($action == 2) {
                                                    echo '<td><span class="badge label-table badge-danger">Suspended</span></td>';
                                                }
                                                ?> -->
                                                <td>

                                                    <?php
                                                    if ($action == 0) {
                                                    ?>
                                                        <a href="<?= $xoaProduct ?>" onclick="return confirm('Bạn có muốn ẩn sản phẩm này không?')"><i class="fe-eye-off" style="font-size: 25px; color: black;"></i> </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="<?= $xoaProduct ?>" onclick="return confirm('Bạn có muốn hiện sản phẩm này không?')"><i class="fe-eye" style="font-size: 25px; color: black;"></i> </a>
                                                    <?php
                                                    }
                                                    ?>

                                                    <a href="<?= $suaProduct ?>"><i class="remixicon-edit-box-fill" style="font-size: 25px;  color: black;"></i></a>
                                                </td>
                                            </tr>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr class="active">
                                        <td colspan="8">
                                            <div class="text-right">
                                                <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->

    <!-- end Footer -->

</div>