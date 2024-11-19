<!-- content -->
<div id="content">

    <div class="checkout">

        <div class="container">

            <div class="check-anchor clearfix mb40">
                <div class="holder">
                    <ul>
                        <li><a href="?url=giohang"><i class="fa fa-star"></i> Giỏ hàng</a></li>
                        <li class="active"><a href="#!"><i class="fa fa-star"></i> Đặt hàng </a></li>
                        <li><a href="#!"><i class="fa fa-star"></i> Trạng thái đặt hàng <i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="holder-border"></div>
                </div>
            </div>

            <div class="checkout-infos">
                <form action="?url=dathang" method="post">
                    <div class="row">
                        <div class="col-md-7">
                            <?php if(isset($errors)) : ?>
                                <?php foreach($errors as $error ) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Lỗi: <?php echo $error ?>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                            <div id="accordion-container" class="checkout-accordion">
                                <h2 class="accordion-header">Thông tin khách hàng</h2>
                                <div class="accordion-content second-row">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label>Họ và tên <span>*</span></label>
                                            <input
                                                type="text"
                                                value="<?php echo $hoVaTen ?? $_SESSION["user"]["ho_va_ten"]?>"
                                                name="hoVaTen"
                                            >
                                        </div>
                                        <div class="col-md-4">
                                            <label>Số điện thoại <span>*</span></label>
                                            <input
                                                type="text"
                                                value="<?php echo $soDienThoai ?? $_SESSION["user"]["so_dien_thoai"]?>"
                                                name="soDienThoai"
                                            >
                                        </div>
                                        <div class="col-md-12">
                                            <label>Địa chỉ <span>*</span></label>
                                            <input
                                                type="text"
                                                value="<?php echo $diaChi ?? $_SESSION["user"]["dia_chi"]?>"
                                                name="diaChi"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="accordion-container" class="checkout-accordion">
                    
                                <h2 class="accordion-header">Phương thức thanh toán</h2>
                                <div class="accordion-content second-row">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input
                                                type="radio"
                                                name="phuongThucThanhToan"
                                                value="1"
                                                <?php echo isset($phuongThucThanhToan) ? ($phuongThucThanhToan == 1 ? 'checked' : '') : '' ?>
                                            >
                                            <p style="display: inline-block; margin-left: 8px;">Thanh toán khi nhận hàng</p>
                                        </div>
                                        <div class="col-md-2">
                                            <div style="display: flex; justify-content: space-around;">
                                                <div width="10%">
                                                    <input
                                                        type="radio"
                                                        name="phuongThucThanhToan"
                                                        value="2"
                                                        <?php echo isset($phuongThucThanhToan) ? ($phuongThucThanhToan == 2 ? 'checked' : '') : '' ?>
                                                    >
                                                </div>
                                                <div width="90%">
                                                    <div style="display: flex; justify-content: center;">
                                                        <img
                                                            src="<?php echo IMAGES_URL ?>payment/MoMo_Logo.png"
                                                            alt=""
                                                            style="width: 30px; height: 30px; object-fit: contain;"
                                                        >
                                                    </div>
                                                    <p style="text-align: center;">Momo</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div style="display: flex; justify-content: space-around;">
                                                <div width="10%">
                                                    <input
                                                        type="radio"
                                                        name="phuongThucThanhToan"
                                                        value="3"
                                                        <?php echo isset($phuongThucThanhToan) ? ($phuongThucThanhToan == 3 ? 'checked' : '') : '' ?>
                                                    >
                                                </div>
                                                <div width="90%">
                                                    <div style="display: flex; justify-content: center;">
                                                        <img
                                                            src="<?php echo IMAGES_URL ?>payment/VNPay_Logo.png"
                                                            alt=""
                                                            style="width: 30px; height: 30px; object-fit: contain;"
                                                        >
                                                    </div>
                                                    <p style="text-align: center;">VnPay</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div style="display: flex; justify-content: space-around;">
                                                <div width="10%">
                                                    <input
                                                        type="radio"
                                                        name="phuongThucThanhToan"
                                                        value="4"
                                                        <?php echo isset($phuongThucThanhToan) ? ($phuongThucThanhToan == 4 ? 'checked' : '') : '' ?>
                                                    >
                                                </div>
                                                <div width="90%">
                                                    <div style="display: flex; justify-content: center;">
                                                        <img
                                                            src="<?php echo IMAGES_URL ?>payment/PayPal_Logo.png"
                                                            alt=""
                                                            style="width: 30px; height: 30px; object-fit: contain;"
                                                        >
                                                    </div>
                                                    <p style="text-align: center;">Paypal</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="check-aside">
                                <div class="orders second-order mb20">
                                    <h6>Đơn đặt hàng của bạn</h6>
                                    <?php foreach($listSanPham as $sanPham) : ?>
                                        <?php $sanPhamChiTiet = getChiTietSanPhamById($sanPham["ma_chi_tiet_san_pham"]);?>
                                        <?php if($sanPhamChiTiet["so_luong"] == NULL) : ?>
                                            <?php
                                                $kichThuoc = getKichThuocID($sanPhamChiTiet["ma_kich_thuoc"]);
                                                $mauSac = getMauSacID($sanPhamChiTiet["ma_mau_sac"]);
                                                $sumProducts += ($sanPhamChiTiet["gia"] + $sanPhamChiTiet["gia_bien_dong"])*$sanPham["so_luong_muon_mua"];
                                            ?>
                                            <div class="order-box row" style="align-items: center;">
                                                <div class="col-md-8">
                                                    <p>
                                                        <p>
                                                            <?php echo $sanPhamChiTiet["ten_san_pham"] ?>
                                                            <br>
                                                            <label
                                                                style="font-style: italic; color: #909090; font-weight: 700;"
                                                            >
                                                                Size: <?php echo $kichThuoc["ten_kich_thuoc"]?>, <?php echo $mauSac["ten_mau"]?>
                                                            </label>
                                                        </p>
                                                        <div class="quantity">Số lượng: <?php echo $sanPham["so_luong_muon_mua"] ?></div>
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p style="text-align: right;"><?php echo ($sanPhamChiTiet["gia"] + $sanPhamChiTiet["gia_bien_dong"])*$sanPham["so_luong_muon_mua"] ?> VNĐ</p>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <?php $sumProducts += $sanPhamChiTiet["gia"]*$sanPham["so_luong_muon_mua"]; ?>
                                            <div class="order-box row" style="align-items: center;">
                                                <div class="col-md-8">
                                                    <p>
                                                        <?php echo $sanPhamChiTiet["ten_san_pham"] ?>
                                                        <div class="quantity">Số lượng: <?php echo $sanPham["so_luong_muon_mua"] ?></div>
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p style="text-align: right;" ><?php echo $sanPhamChiTiet["gia"]*$sanPham["so_luong_muon_mua"] ?> VNĐ</p>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <div class="order-box mb20">
                                        <input type="hidden" name="tongDonHang" value="<?php echo $sumProducts ?>">
                                        <p>Tổng phụ đơn hàng: <span><?php echo $sumProducts ?> VNĐ</span></p>
                                        <p style="margin-top: 12px;">Phí vận chuyển: <span><?php echo $shipping ?> VNĐ</span></p>
                                    </div>
                    
                                    <p><strong>Tổng đơn hàng: <span style="font-weight: 700;"><?php echo $sumProducts + $shipping ?> VNĐ</span></strong></p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button
                                            href="?url=thanhtoan"
                                            class="btn medium-button button-brown mb10 float-right"
                                            style="width: 100%;"
                                            name="btn-cancel"
                                            type="submit"
                                        >
                                            Hủy bỏ
                                        </button>
                                    </div>
                                    <div class="col-md-8">
                                        <button
                                            href="?url=thanhtoan"
                                            class="btn medium-button button-red mb10 float-right"
                                            style="width: 100%;"
                                            name="btn-payment"
                                            type="submit"
                                        >
                                            Đặt hàng
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
<!-- End Product Single -->

</div>
<!-- End content -->