<main id="main" class="" style="padding-bottom: 50px;">
    <div class="my-account-header page-title normal-title">


        <div class="page-title-inner flex-row container text-left">
            <div class="flex-col flex-grow medium-text-center">
                <h1 class="uppercase mb-0">My Account</h1>
            </div>
        </div>
    </div>

    <div class="page-wrapper my-account" style="margin-top: 30px;">
        <div role="main" style="margin: 0 100px;">


            <div class="row vertical-tabs">
                <div class="col-md-3" style="border-right: 1px solid #ccc;">
                    <div class="account-user circle">
                        <span class="image mr-half inline-block">
                            <img alt="" src="<?php echo IMAGES_URL . $_SESSION["user"]["anh_dai_dien"] ?>" height="70" width="70" style="border-radius: 50%;">
                        </span>
                        <span class="user-name inline-block" style="margin-left: 10px;">
                            <?php echo $_SESSION["user"]["email"] ?>
                        </span>

                    </div>


                    <ul class="nav nav-line nav-uppercase nav-vertical" style="margin-top: 15px;">

                        <li style="border-bottom: 1px solid #ccc;">
                            <a href="?url=taikhoan">Tài khoản</a>
                        </li>
                        <li style="border-bottom: 1px solid #ccc;">
                            <a href="?url=taikhoan/donhang">Đơn hàng</a>
                        </li>
                        <li style="border-bottom: 1px solid #ccc;">
                            <a href="?url=dangxuat">Thoát</a>
                        </li>
                    </ul>

                </div>


                <div class="col-md-9" >

                    <div class="content-wrapper" style="padding-bottom: 24px;">
                        <div class="invoice p-3 mb-3" style="border: 1px solid gray; padding: 10px 20px 30px;">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h3> Chi tiết đơn hàng <?php echo $donHang["ma_don_hang"] ?></h3>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info" style="margin-top: 12px;">
                                <!-- /.col -->
                                <div class="col-md-8 invoice-col">
                                    <div class="row">
                                        <address class="col-md-6">
                                            <p>
                                                <strong>Tên khách hàng: </strong><?php echo $donHang["ho_va_ten"] ?>
                                            </p>
                                            <p style="margin: 4px 0;">
                                                <strong>Địa chỉ: </strong><?php echo $donHang["dia_chi"] ?>
                                            </p>
                                            <p>
                                                <strong>Số điện thoại: </strong><?php echo $donHang["so_dien_thoai"] ?>
                                            </p>
                                        </address>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>Ngày đặt: </strong><?php echo $donHang["ngay_dat"] ?>
                                            </p>
                                            <p>
                                                <strong>Ngày thanh toán: </strong>
                                                <?php if($donHang["ngay_thanh_toan"]) { ?>
                                                    <?php echo $donHang["ngay_thanh_toan"] ?>
                                                <?php } else { ?>
                                                    chưa có
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- Table row -->
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Màu sắc</th>
                                                <th>Size</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sanPhamDonHang as $sanPham ) : ?>
                                                <tr>
                                                    <?php $sum += ($sanPham["gia"] + $sanPham["gia_bien_dong"])*$sanPham["so_luong_muon_mua"]; ?>
                                                    <td><?php echo $sanPham["ten_san_pham"] ?></td>
                                                    <td>
                                                        <?php if($sanPham["so_luong"] == NULL ) : ?>
                                                            <?php 
                                                                $kichThuoc = getKichThuocID($sanPham["ma_kich_thuoc"]);
                                                                echo $kichThuoc["ten_kich_thuoc"];
                                                            ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if($sanPham["so_luong"] == NULL ) : ?>
                                                            <?php 
                                                                $mauSac = getMauSacID($sanPham["ma_mau_sac"]);
                                                                echo $mauSac["ten_mau"];
                                                            ?>
                                                        <?php endif ?>
                                                    </td>
                                                    <td><?php echo $sanPham["so_luong_muon_mua"]?></td>
                                                    <td><?php echo $sanPham["gia"] + $sanPham["gia_bien_dong"] ?> VNĐ</td>
                                                    <td><?php echo ($sanPham["gia"] + $sanPham["gia_bien_dong"])*$sanPham["so_luong_muon_mua"] ?> VNĐ</td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-md-6">
                                    <p style="font-size: 15px;">
                                        Phương thức thanh toán: 
                                        <span style="font-weight: 700;">
                                            <?php echo $donHang["ten_phuong_thuc"] ?>
                                        </span>
                                    </p>
                                    <p style="font-size: 15px; margin: 24px 0;">
                                        Trạng thái thanh toán: 
                                        <span
                                            style="color: <?php echo $donHang["ma_trang_thai"] == 1 ? 'red' : 'green'?>;
                                            font-weight: 700;"
                                        >
                                            <?php echo $donHang["ten_trang_thai"] ?>
                                        </span>
                                    </p>
                                    <p style="font-size: 15px;">
                                        Tình trạng đơn hàng: 
                                        <span
                                            style="color: <?php 
                                                if($donHang["ma_tinh_trang"] == 1) {
                                                    echo "#f09300";
                                                }
                                                else if($donHang["ma_tinh_trang"] == 2) {
                                                    echo "#f09300";
                                                }
                                                else if($donHang["ma_tinh_trang"] == 3) {
                                                    echo "#f09300";
                                                }
                                                else if($donHang["ma_tinh_trang"] == 4) {
                                                    echo "green";
                                                }
                                                else if($donHang["ma_tinh_trang"] == 5) {
                                                    echo "red";
                                                }
                                            ?>;
                                            font-weight: 700;"
                                        >
                                            <?php echo $donHang["ten_tinh_trang"] ?>
                                        </span>
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td style="width: 60%">Tổng Tiền:</td>
                                                <td><?php echo $sum ?> VND</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 60%">Phí vận chuyển:</td>
                                                <td><?php echo $shipping ?> VND</td>
                                            </tr>
                                            <tr>
                                                <td>Số Tiền Phải Trả:</td>
                                                <td style="font-weight: 700;"><?php echo $sum + $shipping ?> VNĐ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print" style="margin-top: 12px;">
                                <div class="col-md-12">
                                    <div style="display: inline-block;">
                                        <img src="<?= IMAGES_URL . 'payment/visa.png' ?>" alt="Visa" />
                                        <img src="<?= IMAGES_URL . 'payment/mastercard.png' ?>" alt="Mastercard" />
                                        <img src="<?= IMAGES_URL . 'payment/american-express.png' ?>" alt="American Express" />
                                        <img src="<?= IMAGES_URL . 'payment/paypal2.png' ?>" alt="Paypal" />
                                    </div>
                                    <a href="?<?php echo $url ?>" style="float: right;">
                                        <button type="button" class="btn btn-success">
                                            Quay lại
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>



</main>