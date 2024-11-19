<?php
    if(checkLogin("Bạn cần phải đăng nhập để quản trị")) {
        if($_SESSION["user"]["quyen"] == 0) {
            echo "
                <script>
                    alert('Bạn không có quyền để quản trị');
                </script>
            ";
            nextPage('?');
            die;
        }
    }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo IMAGES_URL ?>favicon.png">
    <title>SweetPick</title>
    <!-- Custom CSS -->
    <link href="<?php echo LIBS_URL ?>flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo EXTRA_LIBS_URL ?>multicheck/multicheck.css">
    <link href="<?php echo LIBS_URL ?>datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo LIBS_URL ?>select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo LIBS_URL ?>jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo LIBS_URL ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo LIBS_URL ?>quill/dist/quill.snow.css">
    <link href="<?php echo LIBS_URL ?>magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo LIBS_URL ?>toastr/build/toastr.min.css" rel="stylesheet">

    <link href="<?php echo CSS_URL ?>style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="?url=admin">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo IMAGES_URL ?>logo-icon.png" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="<?php echo IMAGES_URL ?>logo-text.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="<?php echo IMAGES_URL ?>logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a
                        class="topbartoggler d-block d-md-none waves-effect waves-light"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a
                                class="nav-link sidebartoggler waves-effect waves-light"
                                href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"
                            >
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li
                            class="nav-item search-box">
                            <a
                                class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"
                            >
                            <i class="ti-search"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Tìm kiếm danh mục, sản phẩm, người dùng...">
                                <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#!" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Chào, <?php echo $_SESSION["user"]["email"] ?></span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                href=""
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <img src="<?php echo IMAGES_URL . $_SESSION["user"]["anh_dai_dien"] ?>" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="?">
                                    <i class="fas fa-home m-r-5 m-l-5"></i>
                                    Trang chủ
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?url=dangxuat">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Đăng xuất
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?url=admin" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu"><?php echo $textBangDieuKhien ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="?url=admin/danhmuc"
                                aria-expanded="false"
                            >
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span class="hide-menu"><?php echo $textQuanLyDanhMuc ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-briefcase"></i>
                                <span class="hide-menu"><?php echo $textQuanLySanPham ?></span>
                            </a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item">
                                    <a href="?url=admin/sanpham/danhsach" class="sidebar-link">
                                    <span class="hide-menu"><?php echo $textDanhSachSanPham ?></span>
                                </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?url=admin/sanpham/mausac" class="sidebar-link">
                                    <span class="hide-menu"><?php echo $textMauSac ?></span>
                                </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?url=admin/sanpham/kichthuoc" class="sidebar-link">
                                    <span class="hide-menu"><?php echo $textKichThuoc ?></span>
                                </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?url=admin/nguoidung" aria-expanded="false">
                                <i class="mdi mdi-account-circle"></i>
                                <span class="hide-menu"><?php echo $textQuanLyNguoiDung ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?url=admin/binhluan" aria-expanded="false">
                                <i class="mdi mdi-comment-processing"></i>
                                <span class="hide-menu"><?php echo $textQuanLyBinhLuan ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?url=admin/donhang" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i>
                                <span class="hide-menu"><?php echo $textQuanLyDonHang ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="?url=admin/thongke" aria-expanded="false">
                                <i class="mdi mdi-chart-bar"></i>
                                <span class="hide-menu"><?php echo $textThongKe ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?php echo $pageTitle ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php if($arrayDirectional) : ?>
                                        <li class="breadcrumb-item"><?php echo $pageTitle ?></li>
                                        <?php foreach($arrayDirectional as $directional) : ?>
                                            <li class="breadcrumb-item">
                                                <?php echo $directional ?>
                                            </li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">