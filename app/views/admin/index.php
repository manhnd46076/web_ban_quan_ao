
<!-- ============================================================== -->
<!-- Sales Cards  -->
<!-- ============================================================== -->
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                <h6 class="text-white">Bảng điều khiển</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                <h6 class="text-white">Quản lý danh mục</h6>
            </div>
        </div>
    </div>
        <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                <h6 class="text-white">Quản lý sản phẩm</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                <h6 class="text-white">Quản lý người dùng</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                <h6 class="text-white">Quản lý bình luận</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-danger text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                <h6 class="text-white">Quản lý đơn hàng</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white"><i class="mdi mdi-chart-bar"></i></h1>
                <h6 class="text-white">Thống kê</h6>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- ============================================================== -->
<!-- Sales chart -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-md-flex align-items-center">
                    <div>
                        <h4 class="card-title">Phân Tích Trang Web</h4>
                        <h5 class="card-subtitle">Tổng quan về tháng gần nhất</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-9">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-user m-b-5 font-16"></i>
                                    <h5 class="m-b-0 m-t-5"><?=$nguoiDung[0]['so_luong']?></h5>
                                    <small class="font-light">Tổng người dùng</small>
                                </div>
                            </div>
                                <div class="col-6">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-plus m-b-5 font-16"></i>
                                    <h5 class="m-b-0 m-t-5"><?=$nguoiDungNew[0]['so_luong']?></h5>
                                    <small class="font-light">Người dùng mới</small>
                                </div>
                            </div>
                                <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-tag m-b-5 font-16"></i>
                                    <h5 class="m-b-0 m-t-5"><?=$tongDonHang[0]['so_luong']?></h5>
                                    <small class="font-light">Tổng đơn hàng</small>
                                </div>
                            </div>
                            <div class="col-6 m-t-15">
                                <div class="bg-dark p-10 text-white text-center">
                                    <i class="fa fa-table m-b-5 font-16"></i>
                                    <h5 class="m-b-0 m-t-5"><?=$demDonThanhCong[0]['so_luong']?></h5>
                                    <small class="font-light">Đơn hàng thành công</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
            </div>
        </div>
    </div>
</div>
