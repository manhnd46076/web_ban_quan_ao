<!-- content -->
<style>
    /* Style for the main container */
    .product-write-comment {
        margin-bottom: 20px;
        /* Adjust spacing as needed */
    }

    /* Style for each comment */
    .product-write-comment>div {
        width: 50%;
        margin-bottom: 20px;
        /* Adjust spacing as needed */
    }

    /* Style for commenter name */
    .product-write-comment strong {
        font-weight: bold;
    }

    /* Style for comment content */
    .product-write-comment p {
        margin-bottom: 5px;
        /* Adjust spacing as needed */
    }

    /* Style for reply button */

    /* Style for nested comments */
    .product-write-comment>div>div {
        margin-left: 20px;
    }

    /* Style for the reply form container */
    .replyForm {
        margin-top: 10px;
        /* Adjust spacing as needed */
    }

    /* Style for the reply input */
    .replyText {
        width: 100%;
        /* Adjust width as needed */
        padding: 5px;
        margin-bottom: 5px;
        /* Adjust spacing as needed */

        /* Include padding and border in the element's total width and height */
    }

    /* Style for the reply submit button */
    .replySubmitBtn {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
    }

    /* Optional: Hover effect for the submit button */
    .replySubmitBtn:hover {
        background-color: #45a049;
        /* Darker green */
    }

    .comment-container {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .comment-container img {
        border-radius: 50%;
    }

    .comment-container .comment-header {
        margin-bottom: 5px;
    }

    .comment-container .comment-header strong {
        margin-right: 5px;
    }

    .comment-container .comment-content {
        margin-bottom: 5px;
    }

    .comment-container .comment-time {
        font-size: 12px;
        color: #888;
    }
</style>
<div id="content">

    <div class="product-page container">

        <div class="row">
            <div class="col-md-6">
                <div class="single-img">
                    <div class="sp-wrap">
                        <?php if (isset($detailProduct)) : ?>
                            <?php if ($detailProduct) : ?>
                                <a href="<?php echo IMAGES_URL . $detailProduct["anh_chi_tiet"] ?>">
                                    <img src="<?php echo IMAGES_URL . $detailProduct["anh_chi_tiet"] ?>" alt="">
                                </a>
                            <?php else : ?>
                                <a href="<?php echo IMAGES_URL . $sanpham["anh"] ?>">
                                    <img src="<?php echo IMAGES_URL . $sanpham["anh"] ?>" alt="">
                                </a>
                            <?php endif ?>
                        <?php else : ?>
                            <a href="<?php echo IMAGES_URL . $sanpham["anh"] ?>">
                                <img src="<?php echo IMAGES_URL . $sanpham["anh"] ?>" alt="">
                            </a>
                        <?php endif ?>
                        <?php foreach ($listBoSuuTap as $boSuuTap) : ?>
                            <a href="<?php echo IMAGES_URL . $boSuuTap["anh"] ?>">
                                <img src="<?php echo IMAGES_URL . $boSuuTap["anh"] ?>" alt="">
                            </a>
                        <?php endforeach ?>
                    </div>
                    <div id="test"></div>
                </div>
            </div>
            <div class="col-md-6">
                <?php if (isset($errors)) : ?>
                    <?php foreach ($errors as $error) : ?>
                        <div class="alert alert-danger" role="alert">
                            Lỗi: <?php echo $error ?>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if (isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
                    <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
                        <?php echo $_GET["thongbao"] ?>
                    </div>
                <?php endif ?>
                <form action="?url=chitietsanpham&maSanPham=<?php echo $sanpham["ma_san_pham"] ?>" method="post">
                    <input type="hidden" name="maChiTietSanPham" value="<?php
                                                                        if (isset($detailProduct)) {
                                                                            if ($detailProduct) {
                                                                                echo $detailProduct['ma_chi_tiet_san_pham'];
                                                                            }
                                                                        }
                                                                        if ($sanpham["so_luong"] !== NULL) {
                                                                            $chiTietSanPhamIdSanPhamBinhThuong = getChiTietSanPhamIDSanPhamBinhThuong($sanpham["ma_san_pham"]);
                                                                            echo $chiTietSanPhamIdSanPhamBinhThuong["ma_chi_tiet_san_pham"];
                                                                        }
                                                                        ?>">
                    <div class="single-desc">
                        <div class="top-single">
                            <span>Trang chủ / Chi tiết sản phẩm / <?php echo $sanpham["ten_san_pham"] ?></span>
                            <div class="right-arrows">
                                <a href="#"><i class="fa fa-angle-left"></i></a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="middle-single">
                            <h1 style="position: relative;">
                                <?php echo $sanpham['ten_san_pham'] ?>
                            </h1>
                            <img src="<?php echo SWEETPICK_URL ?>upload/stars.png" alt="">
                            <div class="reviews">
                                <a href="#">10 Bình luận</a>
                            </div>
                        </div>
                        <div class="single-price">
                            <ul>
                                <?php
                                $giaBienDongMax = getGiaChiTietSanPhamIDSanPham($sanpham["ma_san_pham"]);
                                $giaBienDongMin = getGiaChiTietSanPhamIDSanPham($sanpham["ma_san_pham"], false);
                                $tienMin = $sanpham["gia"] + $giaBienDongMin[0];
                                $tienMax = $sanpham["gia"] + $giaBienDongMax[0];
                                ?>
                                <?php if ($sanpham["so_luong"] == NULL) : ?>
                                    <p class="low-price">
                                        <?php echo $tienMin ?> VNĐ -
                                        <?php echo $tienMax ?> VNĐ
                                    </p>
                                <?php else : ?>
                                    <p class="low-price"><?php echo $sanpham["gia"] ?> VNĐ</p>
                                <?php endif ?>
                            </ul>
                        </div>

                        <?php if (isset($detailProduct)) : ?>
                            <?php if ($detailProduct) : ?>
                                <div class="single-infos">
                                    <p><span>Số lượng trong kho: <?php echo $detailProduct['so_luong'] ?></span></p>
                                </div>
                                <input type="hidden" name="so_luong_bien_the" value="<?php echo $detailProduct['so_luong'] ?>">
                            <?php endif ?>
                        <?php endif ?>
                        <?php if ($sanpham["so_luong"] != NULL) : ?>
                            <div class="single-infos">
                                <p><span>Số lượng trong kho: <?php echo $sanpham['so_luong'] ?></span></p>
                            </div>
                        <?php endif ?>
                        <input type="hidden" name="so_luong" value="<?php echo $sanpham["so_luong"] ?>">
                        <?php if ($sanpham['so_luong'] == NULL) : ?>
                            <?php
                            $listSize = getSizeChiTietSanPham($sanpham["ma_san_pham"]);
                            $listColor = getColorChiTietSanPham($sanpham["ma_san_pham"]);
                            ?>
                            <div class="single-inputs row variants">
                                <div class="col-md-6">
                                    <select class="select variants-size" name="size">
                                        <option value="undefined" <?php if (!isset($maKichThuoc)) : ?> <?php echo "disabled selected" ?> <?php else : ?> <?php echo "disabled" ?> <?php endif ?>>
                                            Chọn Kích Thước
                                        </option>

                                        <?php foreach ($listSize as $key => $size) : ?>
                                            <option value="<?= $size['ma_kich_thuoc'] ?>" <?php if (isset($maKichThuoc)) : ?> <?php echo $maKichThuoc == $size["ma_kich_thuoc"] ? 'selected' : '' ?> <?php endif ?>>
                                                <?= $size['ten_kich_thuoc'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="select variants-color" name="color">
                                        <option value="undefined" <?php if (!isset($maMauSac)) : ?> <?php echo "disabled selected" ?> <?php else : ?> <?php echo "disabled" ?> <?php endif ?>>
                                            Chọn Màu Sắc
                                        </option>
                                        <?php foreach ($listColor as $key => $color) : ?>
                                            <option value="<?= $color['ma_mau_sac'] ?>" <?php if (isset($maMauSac)) : ?> <?php echo $maMauSac == $color["ma_mau_sac"] ? 'selected' : '' ?> <?php endif ?>>
                                                <?= $color['ten_mau'] ?>
                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if (isset($detailProduct)) : ?>
                            <div class="single-inputs">
                                <?php if ($detailProduct) : ?>
                                    <p style="font-family: 'Noticia Text'; font-size: 23px; font-weight: bold; color: #ea5748;">
                                        <?php echo $sanpham["gia"] + $detailProduct["gia_bien_dong"] ?> VNĐ
                                    </p>
                                <?php else : ?>
                                    <p style="font-family: 'Noticia Text'; font-size: 20px; font-weight: bold;">
                                        <?php echo "Không có biến thể này" ?>
                                    </p>
                                <?php endif ?>
                            </div>
                        <?php endif ?>

                        <div class="prod-end">
                            <button class="btn medium-button button-red add-cart" type="submit" name="btn-add-cart">
                                Thêm vào giỏ hàng
                            </button>
                            <button style="display: none;" type="submit" name="btn-load-variants" class="btn-load-variants">
                                loadvariants
                            </button>
                            <input type="text" placeholder="1" name="so_luong_muon_mua" value="<?php echo $soLuongMuonMua ?? '' ?>">
                            <div class="clear"></div>
                        </div>
                        <div class="share">
                            <span>Share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- End Product Single -->

    <div class="tabs-single">
        <div class="container">

            <div id="tabs">
                <ul>
                    <li class="active"><a href="#tabs-1">Mô tả</a></li>
                    <li><a href="#tabs-2">Bình luận</a></li>
                </ul>
                <div class="tab-border"></div>
                <div id="tabs-1">
                    <p>
                        <?= $sanpham['mo_ta'] ?>
                    </p>
                </div>
                <div id="tabs-2">
                    <div>
                        <form action="?url=chitietsanpham&maSanPham=<?= $maSanPham ?>" method="post" class="product-write-comment">
                            <div class="comment-container" style="width: 100%; border: 1px solid #ccc; border-radius: 8px; padding: 10px; margin-bottom: 10px;">
                                <?php foreach ($listBinhLuan as $bl) : ?>
                                    <div class="comment-main" style=" padding-bottom: 10px; margin-bottom: 10px;">
                                        <div class="comment-item" style=" width: 70%; border: 1px solid #ccc; border-radius: 8px; padding: 10px; margin-bottom: 10px;">
                                            <div class="comment-header d-flex">
                                                <p>
                                                    <img src="<?= IMAGES_URL . $bl["anh_dai_dien"] ?>" style="border-radius: 50%;" width="30px" alt="">
                                                    <strong><?= $bl['ho_va_ten'] ?> </strong>
                                                </p>

                                            </div>
                                            <div class="comment-content">
                                                <p><?= $bl['noi_dung'] ?> </p>
                                            </div>
                                            <p class="comment-time" style=" margin-right: 15px; display:inline-block; font-size: 11px;"><?= $bl['ngay_binh_luan'] ?></p>
                                            <div class="comment-reply" style="display: inline-block;">
                                                <a style="cursor: pointer;" class="replyBtn">Trả lời</a>
                                                <input class="mabl" type="hidden" value="<?php echo $bl['ma_binh_luan'] ?>">
                                            </div>

                                        </div>
                                        <?php $listBinhLuanct = getAllChiTietBinhLuan($bl['ma_binh_luan']); ?>

                                        <?php foreach ($listBinhLuanct as $blct) : ?>
                                            <div class="comment-reply-item" style=" width: 66%;border: 1px solid #ccc; border-radius: 8px; padding: 10px; margin-bottom: 10px; margin-left: 40px;">
                                                <div class="comment-header d-flex">
                                                    <p>
                                                        <img src="<?= IMAGES_URL . $blct["anh_dai_dien"] ?>" style="border-radius: 50%;" width="22px" alt="">
                                                        <strong><?= $blct['ho_va_ten'] ?></strong>
                                                    </p>
                                                </div>
                                                <div class="comment-content">
                                                    <p><?= $blct['noi_dung'] ?></p>
                                                </div>
                                                <p class="comment-time" style="margin-left: auto;"><?= $blct['ngay_binh_luan'] ?></p>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endforeach ?>
                            </div>



                            <input name="matrl" class="matraloi" type="hidden">

                    </div>
                    </form>
                    <?php if (isset($_SESSION["user"]["ma_nguoi_dung"])) : ?>
                        <form action="?url=chitietsanpham&maSanPham=<?= $maSanPham ?>" method="post" class="product-write-comment">
                            <div style="display: flex; align-items: center;" class="mt50">
                                <div class="col-md-4" style="padding: 0;">
                                    <input style="width: 100%;border-radius: 10px;width: calc(200% - 20px);padding: 10px;" type="text" name="comment" id="" placeholder="Viết bình luận của bạn" required>
                                </div>
                                <div class="col-md-2">
                                    <input style="width: calc(200% - 5px);background-color: #007bff;color: #fff;border: none;border-radius: 5px;" type="submit" name="guibinhluan" value="Gửi Bình Luận">

                                    <div class="product-comment_info">
                                    </div>
                        </form>
                    <?php endif ?>
                    
                    <?php if (!isset($_SESSION["user"]["ma_nguoi_dung"])) : ?>
                        <h4>Bạn cần đăng nhập để bình luận</h4>
                    <?php endif ?>

                </div>
            </div>
        </div>
        <!-- End First Tabs -->


    </div>
</div>
<!-- End tab Signle -->


<div class="feat-items mb30">
    <div class="container">
        <h1>Sản phẩm tương tự</h1>
        <div class="list_carousel1 responsive">

        <div class="row">
            <?php foreach ($listSPTT as $sptt) : ?>
                <?php if ($sptt['ma_san_pham'] != $maSanPham) : ?>
                        <div class="col-md-3 grid-item mb30">
                            <div class="arrival-overlay">
                                <img src="<?= IMAGES_URL . $sptt['anh'] ?>" style="height: 250px; object-fit: cover;" alt="">
                                <div class="arrival-mask">
                                    <a href="?url=chitietsanpham&maSanPham=<?= $sptt['ma_san_pham'] ?>" class="medium-button button-red add-cart">Thêm vào giỏ hàng</a>
                                    <a href="?url=chitietsanpham&maSanPham=<?= $sptt['ma_san_pham'] ?>" class="wishlist">Xem chi tiết</a>
                                </div>
                            </div>
                            <div class="arr-content">
                                <a href="?url=chitietsanpham&maSanPham=<?= $sptt['ma_san_pham'] ?>">
                                    <p
                                            style="
												height: 42px;
												display: -webkit-box;
												-webkit-box-orient: vertical;
												overflow: hidden;
												-webkit-line-clamp: 2;
												text-align: left;"
                                    >
                                        <?= $sptt['ten_san_pham'] ?>
                                    </p>
                                </a>
                                <?php
                                    $giaBienDongMax = getGiaChiTietSanPhamIDSanPham($sptt["ma_san_pham"]);
                                    $giaBienDongMin = getGiaChiTietSanPhamIDSanPham($sptt["ma_san_pham"], false);
                                    $tienMin = $sptt["gia"] + $giaBienDongMin[0];
                                    $tienMax = $sptt["gia"] + $giaBienDongMax[0];
                                ?>
                                <?php if($sptt["so_luong"] == NULL) : ?>
                                    <p class="low-price">
                                        <?php echo $tienMin ?> VNĐ - 
                                        <?php echo $tienMax ?> VNĐ
                                    </p>
                                <?php else : ?>
                                    <p class="low-price"><?php echo $sptt["gia"] ?> VNĐ</p>
                                <?php endif ?>

                                <div class="stars" style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
                                    <div>
                                        <img src="<?php echo SWEETPICK_URL ?>upload/stars.png" alt="" style="opacity: 1; margin: 0;">
                                    </div>
                                    <p style="margin: 0;">Lượt mua: <?php echo $sptt["luot_mua"] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="clearfix"></div>
            <div class="arrows">
                <a id="prev1" class="prev1" href="#"><i class="fa fa-angle-left"></i></a>
                <a id="next1" class="next1" href="#"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <?php if (!isset($sptt["ma_san_pham"])) : ?>
            <div style="padding-left: 165px;">
                <h4>Không có sản phẩm tương tự !</h4>
            </div>
        <?php endif ?>

        <!-- End List Carousel -->
    </div>
</div>

</div>
<!-- End content -->

<script>
    var replyBtn = document.querySelectorAll('.replyBtn');
    // console.log(replyBtn);
    var matraloi = document.querySelector('.matraloi');

    // Tạo phần tử input
    var inputElement = document.createElement("input");
    inputElement.setAttribute("name", "commentmin");
    inputElement.setAttribute("class", "replyText");
    inputElement.setAttribute("placeholder", "Nhập câu trả lời của bạn");

    // Tạo phần tử button
    var buttonElement = document.createElement("button");
    buttonElement.setAttribute("type", "submit");
    buttonElement.setAttribute("class", "replySubmitBtn");
    buttonElement.setAttribute("name", "submitButton"); // Thêm thuộc tính name cho nút gửi
    buttonElement.textContent = "Gửi trả lời";

    // Tạo phần tử div
    var divElement = document.createElement("div");
    divElement.setAttribute("class", "replyForm");

    // Thêm input và button vào phần tử div
    divElement.appendChild(inputElement);
    divElement.appendChild(document.createElement("br")); // Thêm dòng mới
    divElement.appendChild(buttonElement);

    // Thêm phần tử div vào body hoặc nơi khác trong DOM mà bạn muốn
    // document.body.appendChild(divElement);
    // Gắn sự kiện click vào nút "Trả lời"

    replyBtn.forEach(element => {
        element.addEventListener('click', function(e) {
            // console.log("nguuu");
            // console.log(e.target.parentElement.querySelector('.mabl').value)
            matraloi.value = e.target.parentElement.querySelector('.mabl').value;
            // Kiểm tra xem form đã hiển thị hay chưa
            e.target.parentElement.parentElement.appendChild(divElement)
        });
    });


    let variants = document.querySelector('.variants');
    let variantsSize = document.querySelector('.variants-size');
    let variantsColor = document.querySelector('.variants-color');
    let btnLoadVariants = document.querySelector('.btn-load-variants');

    let urlParams = new URLSearchParams(window.location.search);

    let idSanPham = urlParams.get('maSanPham');
    let size = variantsSize.value;
    let color = variantsColor.value;

    variantsSize.addEventListener('change', () => {
        size = variantsSize.value
    })
    variantsColor.addEventListener('change', () => {
        color = variantsColor.value
    })

    variants.onchange = function() {
        if (size != "undefined" && color != "undefined") {
            btnLoadVariants.click();
        }
    }
</script>