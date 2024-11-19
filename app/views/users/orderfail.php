<!-- content -->
<div id="content">

<div class="checkout">

    <div class="container">

        <div class="check-anchor clearfix mb40">
            <div class="holder">
                <ul>
                    <li><a href="?url=giohang"><i class="fa fa-star"></i> Giỏ hàng </a></li>
                    <li><a href="#!"><i class="fa fa-star"></i> Đặt hàng </a></li>
                    <li class="active"><a href="#!"><i class="fa fa-star"></i> Đặt hàng thất bại <i class="fa fa-star"></i></a></li>
                </ul>
                <div class="holder-border"></div>
            </div>
        </div>

        <div class="checkout-infos">
            <div>
                <div style="display: flex; justify-content: center;">
                    <div style="display: inline-block;">
                        <div style="text-align: center;">
                            <img src="<?php echo IMAGES_URL ?>fail.png" alt="" width="80px">
                        </div>
                        <h4>Giao dịch thất bại</h4>
                    </div>
                </div>
                <div style="background-color: #fff; margin-top: 28px; padding: 24px 48px; border: 1px #ccc solid;">
                    <p style="font-size: 14px;">
                        Bạn đã hủy thanh toán đơn hàng mã 
                        <strong><?php echo $maDonHang ?? '' ?></strong> 
                        trị giá <strong><?php echo ($tongTien+$shipping) ?? '' ?>đ</strong>.
                    </p>
                    <div style="display: flex; justify-content: center; margin-top: 28px;">
                        <div class="col-md-3">
                            <a
                                href="?"
                                class="btn medium-button button-brown mb10"
                                style="width: 100%;"
                                name="btn-delete-product-selected"
                            >
                                Trở về trang chủ
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a
                                href="?url=giohang"
                                class="btn medium-button button-red mb10"
                                style="width: 100%;"
                                name="btn-delete-product-selected"
                            >
                                Danh sách giỏ hàng
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