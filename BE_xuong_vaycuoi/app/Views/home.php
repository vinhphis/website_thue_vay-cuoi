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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
                                <li class="breadcrumb-item active">Light Topbar</li>
                            </ol>
                        </div>
                        <!-- <h4 class="page-title">Light Topbar</h4> -->
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <?php
                if (isset($CountAccount)) {
                   
                    extract($CountAccount);
                ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#1abc9c" data-bgcolor="#d1f2eb" value="58" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h3 class="mb-1"> <?= $countAccount ?> </h3>
                                <p class="text-muted mb-1">Tài Khoản Khách Hàng</p>
                            </div>
                        </div>
                    </div><!-- end col -->
                <?php
                }
               
                ?>
                <?php
                if (isset($TongSanPham)) {
                    
                    extract($TongSanPham);
                ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#3bafda" data-bgcolor="#d8eff8" value="80" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h3 class="mb-1"> <?= $tongsanPham ?> </h3>
                                <p class="text-muted mb-1">Tổng Sản Phẩm</p>
                            </div>
                        </div>
                    </div><!-- end col -->
                <?php
                }
                
                ?>
                <?php
                if (isset($TongTien)) {

                    extract($TongTien);
                ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#f672a7" data-bgcolor="#fde3ed" value="77" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h3 class="mb-1"> <?= number_format($tongTien) ?> </h3>
                                <p class="text-muted mb-1">Doanh Thu Của Shop</p>
                            </div>
                        </div>
                    </div><!-- end col -->
                <?php
                }

                ?>
                <?php
                if (isset($TongTienThang)) {
                    // foreach ($CountAccount as  $value) {
                    extract($TongTienThang);
                ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box">
                            <div class="float-left" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#6c757d" data-bgcolor="#e2e3e5" value="35" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                            </div>
                            <div class="text-right">
                                <h3 class="mb-1"> <?= number_format($TongTien) ?> </h3>
                                <p class="text-muted mb-1">Doanh Thu Tháng 2</p>
                            </div>
                        </div>
                    </div><!-- end col -->
                <?php
                }
                // }
                ?>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title">Total Revenue</h4>

                        <div class="mt-3 text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Desktop</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Laptop</span>
                            </p>

                            <div id="sparkline1" class="mt-3"></div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4> $56,214</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success"></i> $840</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-down text-danger"></i> $7,845</h4>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

                <div class="col-xl-4">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title">Yearly Sales Report</h4>

                        <div class="mt-3 text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Revenue</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-light"></i> Number of Sales</span>
                            </p>

                            <div id="sparkline2" class="text-center mt-3"></div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4>$8712</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success"></i> $523</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-down text-danger"></i> $965</h4>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

                <div class="col-xl-4">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title">Weekly Sales Report</h4>

                        <div class="mt-3 text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-secondary"></i> Direct</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Affilliate</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-light"></i> Sponsored</span>
                            </p>

                            <div id="sparkline3" class="text-center mt-3"></div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4> $12,365</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-down text-danger"></i> $365</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-up text-success"></i> $8,501</h4>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                        <h4 class="header-title">Earning Reports</h4>
                        <p class="text-muted">1 Mar - 31 Mar Showing Data</p>
                        <h2 class="mb-4"><i class="mdi mdi-currency-usd text-primary"></i>25,632.78</h2>

                        <div class="row mb-4">
                            <div class="col-6">
                                <p class="text-muted mb-1">This Month</p>
                                <h3 class="mt-0 font-20">$120,254 <small class="badge badge-light-success font-13">+15%</small></h3>
                            </div>

                            <div class="col-6">
                                <p class="text-muted mb-1">Last Month</p>
                                <h3 class="mt-0 font-20">$98,741 <small class="badge badge-light-danger font-13">-5%</small></h3>
                            </div>
                        </div>

                        <h5 class="font-16"><i class="mdi mdi-chart-donut text-primary"></i> Weekly Earning Report</h5>

                        <div class="mt-5">
                            <span data-plugin="peity-bar" data-colors="#1abc9c,#ebeff2" data-width="100%" data-height="92">5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                        </div>

                    </div> <!-- end card-box -->
                </div> <!-- end col -->
                <div class="col-xl-8">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                        <h4 class="header-title mb-3">Revenue History</h4>

                        <div class="table-responsive">
                            <table class="table table-borderless table-hover table-centered m-0">

                                <thead class="thead-light">
                                    <tr>
                                        <th>Marketplaces</th>
                                        <th>Date</th>
                                        <th>US Tax Hold</th>
                                        <th>Payouts</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Themes Market</h5>
                                        </td>

                                        <td>
                                            Oct 15, 2018
                                        </td>

                                        <td>
                                            $125.23
                                        </td>

                                        <td>
                                            $5848.68
                                        </td>

                                        <td>
                                            <span class="badge badge-light-warning">Upcoming</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Freelance</h5>
                                        </td>

                                        <td>
                                            Oct 12, 2018
                                        </td>

                                        <td>
                                            $78.03
                                        </td>

                                        <td>
                                            $1247.25
                                        </td>

                                        <td>
                                            <span class="badge badge-light-success">Paid</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Share Holding</h5>
                                        </td>

                                        <td>
                                            Oct 10, 2018
                                        </td>

                                        <td>
                                            $358.24
                                        </td>

                                        <td>
                                            $815.89
                                        </td>

                                        <td>
                                            <span class="badge badge-light-success">Paid</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Envato's Affiliates</h5>
                                        </td>

                                        <td>
                                            Oct 03, 2018
                                        </td>

                                        <td>
                                            $18.78
                                        </td>

                                        <td>
                                            $248.75
                                        </td>

                                        <td>
                                            <span class="badge badge-light-danger">Overdue</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Marketing Revenue</h5>
                                        </td>

                                        <td>
                                            Sep 21, 2018
                                        </td>

                                        <td>
                                            $185.36
                                        </td>

                                        <td>
                                            $978.21
                                        </td>

                                        <td>
                                            <span class="badge badge-light-warning">Upcoming</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5 class="m-0 font-weight-normal">Advertise Revenue</h5>
                                        </td>

                                        <td>
                                            Sep 15, 2018
                                        </td>

                                        <td>
                                            $29.56
                                        </td>

                                        <td>
                                            $358.10
                                        </td>

                                        <td>
                                            <span class="badge badge-light-success">Paid</span>
                                        </td>

                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->

    <!-- end Footer -->

</div>