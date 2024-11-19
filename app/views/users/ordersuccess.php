<!-- content -->
<div id="content">

<div class="checkout">

    <div class="container">

        <div class="check-anchor clearfix mb40">
            <div class="holder">
                <ul>
                    <li><a href="?url=giohang"><i class="fa fa-star"></i> Giỏ hàng </a></li>
                    <li><a href="#!"><i class="fa fa-star"></i> Đặt hàng </a></li>
                    <li class="active"><a href="#!"><i class="fa fa-star"></i> Đặt hàng thành công <i class="fa fa-star"></i></a></li>
                </ul>
                <div class="holder-border"></div>
            </div>
        </div>

        <div class="checkout-infos">
            <div>
                <div style="display: flex; justify-content: center;">
                    <div style="display: inline-block;">
                        <div style="text-align: center;">
                            <img src="<?php echo IMAGES_URL ?>success.png" alt="" width="80px">
                        </div>
                        <h4>Đặt hàng thành công</h4>
                    </div>
                </div>
                <div style="background-color: #fff; margin-top: 28px; padding: 24px 48px; border: 1px #ccc solid;">
                    <p style="font-size: 14px;">
                        Bạn đã đặt hàng thành công đơn hàng mã 
                        <strong><?php echo ($maDonHang) ?? '' ?></strong> 
                        trị giá <strong><?php echo ($tongTien+$shipping) ?? '' ?>đ</strong>, 
                        <?php
                            if($maPhuongThuc != 1) {
                                echo "Thanh toán bằng " . ($phuongThucThanhToan["ten_phuong_thuc"]) ?? '';
                            }
                            else {
                                echo ($phuongThucThanhToan["ten_phuong_thuc"]) ?? '';
                            }
                        ?>.
                    </p>
                    <p style="font-size: 14px; margin-top: 16px;">
                        Sau khi xác nhận đơn hàng, sản phẩm sẽ được giao đến địa chỉ 
                        <strong><?php echo ($diaChi) ?? '' ?></strong>.
                        Bạn có thể theo dõi đơn hàng tại <strong>Tài khoản > Đơn hàng</strong> 
                        hoặc bấm vào nút <strong>Chi tiết đơn hàng</strong> ở phía dưới.
                    </p>
                    <p style="font-size: 14px; margin-top: 16px;">
                        Hiệp Bé Bỏng rất hân hạnh được phục vụ bạn !
                    </p>
                    <div style="display: flex; justify-content: center; margin-top: 28px;">
                        <div class="col-md-3">
                            <a
                                href="?"
                                class="btn medium-button button-brown mb10"
                                style="width: 100%;"
                                name="btn-delete-product-selected"
                            >
                                Tiếp tục mua sắm
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a
                                href="?url=taikhoan/donhang"
                                class="btn medium-button button-red mb10"
                                style="width: 100%;"
                                name="btn-delete-product-selected"
                            >
                                Chi tiết đơn hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- End Product Single -->
</div>
<!-- End content -->