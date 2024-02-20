<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">



                <li>
                    <a href="<?= $_SESSION['dir'] ?>/index.php" class="waves-effect">
                        <i class="remixicon-dashboard-line"></i>
                        <span> Trang chủ </span>
                    </a>

                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-stack-line"></i>
                        <span> Quản lý sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-product">Danh sách sản phẩm</a>
                        </li>
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-color">Danh sách màu sắc </a>
                        </li>
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-style">Danh sách kiểu dáng </a>
                        </li>
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-bienthe">Danh sách biến thể </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-layout-line"></i>
                        <span> Quản lý danh mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-category">Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>

                <!-- <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-mail-open-line"></i>
                        <span> Quản lý bài viết </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="email-inbox.html">Tạo bài viết</a>
                        </li>
                        <li>
                            <a href="email-read.html">Danh sách bài viết</a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-file-copy-2-line"></i>
                        <span> Quản lý tài khoản </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="pages-starter.html">Tài khoản người dùng</a>
                        </li>
                        <li>
                            <a href="pages-login.html">Tài khoản nhân viên</a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-pages-line"></i>
                        <span> Bình luận & đánh giá</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="extras-profile.html">Danh sách bình luận</a>
                        </li>
                    </ul>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-briefcase-5-line"></i>
                        <span> Quản lý liên hệ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-lich-hen">Danh sách lịch hẹn</a>
                        </li>
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-name-email">Danh sách Tên & Email khách hàng</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="remixicon-pages-line"></i>
                        <span>Danh sách đơn hàng</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?list-don-hang">Danh sách đơn hàng</a>
                        </li>
                        <li>
                            <a href="<?= $_SESSION['dir'] ?>/?add-don-hang">Thanh toán tại quầy</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>