<!-- content -->
<div id="content">


    <div class="shop-main container">
        <div class="row">
            <div class="col-md-3">
                <aside class="left-shop">

                    <div class="shop-categories mb30">
                        <h1 class="asidetitle">Danh Mục</h1>
                        <form action="?url=timkiem&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>" method="post">
                            <div class="timkiem">
                                <input type="text" placeholder="Tìm kiếm..." name="tim_kiem"> <button type="submit">TÌM KIẾM</button>

                            </div>
                        </form>
                        <ul>
                            <?php  ?>
                            <li><a href="?url=loc&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>&ma_danh_muc=0">Tất cả cả sản phẩm <span><?= $soLuongTatCaSanPham[0]['so_luong_san_pham'] ?></span></a></li>
                            <?php foreach ($danhMucs as $key => $danhMuc) : ?>
                                <!-- đếm số lượng sản phẩm từng danh mục  -->
                                <?php $soLuongSanPhams = soLuongSanPhamDanhMuc($danhMuc['ma_danh_muc'], $maLoai); ?>
                                <li>
                                    <a href="?url=loc&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>&ma_danh_muc=<?= $danhMuc['ma_danh_muc'] ?>"><?= $danhMuc['ten_danh_muc'] ?>
                                        <?php foreach ($soLuongSanPhams as $key => $soLuongSanPham) : ?>
                                            <span>
                                                <?= $soLuongSanPham['so_luong_san_pham'] ?>
                                            </span>
                                        <?php endforeach;   ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <!-- FORM  -->
                    <form action="
                    <?php if ($maLoai == 1) {
                        echo "?url=loc&ma_loai=1";
                    } ?>
                    <?php if ($maLoai == 2) {
                        echo "?url=loc&ma_loai=2";
                    } ?>
                    " method="POST">

                        <div class="shop-price mb30">
                            <h1 class="asidetitle">Giá</h1> <!--  PRICE  -->
                            <p>
                                <input type="text" id="amount" name="price">
                            </p>
                            <div id="slider-range"></div>
                        </div>
                        <div class="acc-bordered">
                            <div class="accordion">
                                <div id="accordion-container">
                                    <h2 class="accordion-header">Màu sắc</h2>
                                    <div class="accordion-content">
                                        <div class="brands mb30">
                                            <!-- COLOR  -->
                                            <!-- <form action="#"> -->
                                            <ul>
                                                <?php foreach ($getMauSacs as $key => $getMauSac) : ?>
                                                    <li>
                                                        <input type="checkbox" value="<?= $getMauSac['ma_mau_sac'] ?>" name="ma_mau_sac[]" <?php
                                                                                                                                            if (isset($_POST['ma_mau_sac']) && in_array($getMauSac['ma_mau_sac'], $_POST['ma_mau_sac'])) {
                                                                                                                                                // kiểm tra khởi tạo, kiêm tra xm gữ liệu gửi đi không
                                                                                                                                                // in_arry kiếm tra giá cụ thể có trong mảng không  ở đây càn tìm  getMauSac trong mảng $_POST
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                            ?>>
                                                        <?= $getMauSac['ten_mau'] ?>
                                                        <span><?= $getMauSac['so_luong_san_pham'] ?></span>
                                                    </li>
                                                <?php endforeach ?>

                                            </ul>
                                            <!-- </form> -->

                                        </div>
                                    </div>
                                    <h2 class="accordion-header">Sizes</h2>
                                    <div class="accordion-content">
                                        <div class="brands mb30">
                                            <!-- SIZE  -->

                                            <ul>
                                                <?php foreach ($getKichThuocs as $key => $getKichThuoc) : ?>
                                                    <li>
                                                        <input type="checkbox" value="<?= $getKichThuoc['ma_kich_thuoc'] ?>" name="ma_kich_thuoc[]" <?php echo (isset($_POST['ma_kich_thuoc']) && in_array($getKichThuoc['ma_kich_thuoc'], $_POST['ma_kich_thuoc'])) ? 'checked' : '' ?>>
                                                        <?= $getKichThuoc['ten_kich_thuoc'] ?>
                                                        <span><?= $getKichThuoc['so_luong_san_pham'] ?></span>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accordion -->
                        </div>
                        <button type="submit" class="medium-button button-red mt20" style="border: none;">
                            Lọc
                        </button>
                    </form> <!-- End FORM -->
                </aside>
                <!-- End aside shop -->
            </div>

            <div class="col-md-9">
                <div class="shop-content">
                    <div class="toolbar">
                        <!-- <div class="sort-select">
                            <label>Sắp xếp theo</label>
                            <select class="selectBox">
                                <option>Mặc định</option>
                                <option>Giá tăng dần</option>
                                <option>Giá giảm dần</option>
                            </select>
                        </div>
                        <div class="sort-select">
                            <label>Hiển thị</label>
                            <select class="selectBox">
                                <option>12</option>
                                <option>16</option>
                                <option>20</option>
                            </select>
                        </div> -->
                        <div class="lg-panel htabs">
                            <span>View</span>
                            <a href="#!" id="list" class="list-btn"><i class="fa fa-th-list"></i></a>
                            <a href="#!" id="grid" class="grid-btn active"><i class="fa fa-th"></i></a>
                        </div>
                    </div>

                    <div class="row shop-grid">
                        <?php foreach ($sanPhams as $key => $sanpham) : ?>

                            <div class="col-md-4 grid-item mb30">
                                <div class="arrival-overlay">
                                    <img src="<?php echo IMAGES_URL . $sanpham['anh'] ?>" alt="" style="height: 260px; object-fit: cover;">

                                    <div class="arrival-mask">
                                        <a href="?url=chitietsanpham&maSanPham=<?= $sanpham['ma_san_pham'] ?>" class="medium-button button-red add-cart">Thêm vào giỏ hàng</a>
                                        <a href="?url=chitietsanpham&maSanPham=<?= $sanpham['ma_san_pham'] ?>" class="wishlist">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="arr-content">
                                    <a href="?url=chitietsanpham&maSanPham=<?= $sanpham['ma_san_pham'] ?>">
                                        <p
                                            style="
                                                height: 42px;
                                                display: -webkit-box;
                                                -webkit-box-orient: vertical;
                                                overflow: hidden;
                                                -webkit-line-clamp: 2;
                                                text-align: left;"
                                        >
                                            <?= $sanpham['ten_san_pham'] ?>
                                        </p>
                                    </a>
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

                                    <div class="stars" style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
										<div>
											<img src="<?php echo SWEETPICK_URL ?>upload/stars.png" alt="" style="opacity: 1; margin: 0;">
										</div>
										<p style="margin: 0;">Lượt mua: <?php echo $sanpham["luot_mua"] ?></p>
									</div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php if(!$sanPhams) :  ?>
                            <div style="padding: 24px 0;">
                                <div style="display: flex; justify-content: center;">
                                    <img src="<?php echo IMAGES_URL ?>box-png.png" alt="" width="200px" > 
                                </div>
                                <h3 style="text-align: center;">Không có sản phẩm nào</h3>
                            </div>
                        <?php endif ?>

                    </div>
                    <!-- Phân trang  -->

                    <div class="shop-pag">
                        <div class="card-footer clearfix">
                            <div class="pagination-container" style="display: flex; justify-content: center;">
                                <ul class="pagination">
                                    <?php if ($trangHienTai > 1) { ?>
                                        <li class="page-item "><a class="page-link" href="?url=loc&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>&soTrang=<?= $trangHienTai - 1 ?>">&laquo; Trước</a></li>
                                    <?php } else {  ?>
                                        <li class="page-item disabled"><a class="page-link" href="#">&laquo; Trước</a></li>
                                    <?php } ?>
                                    <!-- Hiện số trang  -->
                                    <?php for ($i = 1; $i <= $tongSoTrang; $i++) { ?>
                                        <?php if ($i == $trangHienTai) { ?>
                                            <li class="page-item active"><a class="page-link" href="?url=loc&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>&soTrang=<?= $i ?>"> <?= $i ?></a></li>
                                        <?php } else {  ?>
                                            <li class="page-item "><a class="page-link" href="?url=loc&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>&soTrang=<?= $i ?>"> <?= $i ?></a></li>
                                        <?php } ?>
                                    <?php  } ?>
                                    <!-- Hiện nút tiếp theo  -->
                                    <?php if ($trangHienTai < $tongSoTrang) { ?>
                                        <li class="page-item"><a class="page-link" href="?url=loc&ma_loai=<?= ($maLoai == 1) ? $maLoai : 2 ?>&soTrang=<?= $trangHienTai + 1 ?>">Tiếp theo &raquo;</a></li>
                                    <?php } else {  ?>
                                        <li class="page-item disabled"><a class="page-link" href="#">Tiếp theo &raquo;</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Phân trang  -->


</div>

<!-- End content -->\

<style>
    .timkiem {
        display: flex;
        justify-content: start;
        gap: 5px;
        /* Khoảng cách giữa input và nút */
        padding: 5px;
        background-color: #fff;
        /* Đồng bộ với màu nền của sidebar */
        border: 1px solid #ccc;
        /* Màu viền nhẹ nhàng */
        border-radius: 4px;
        /* Bo góc nhẹ để phù hợp với các phần tử khác */
        margin: 10px 0;
    }

    .timkiem input[type="text"] {
        flex-grow: 1;
        /* Cho phép input mở rộng tối đa */
        padding: 5px 0;
        border: none;
        /* Loại bỏ viền để đơn giản hóa */
        font-size: 11px;
        /* Kích thước chữ phù hợp với giao diện */
        color: #333;
        /* Màu chữ tối */

    }

    .timkiem input[type="text"]::placeholder {
        color: #aaa;
        /* Màu chữ placeholder nhẹ nhàng */
    }

    .timkiem button {
        padding: 5px 5px;
        background-color: #76b852;
        /* Màu sắc phù hợp với nút "Giảm giá 25%" */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 10px;
        /* Kích thước chữ đồng bộ */
        text-transform: uppercase;
        /* Chữ hoa */
    }

    .timkiem button:hover {
        background-color: #689f38;
        /* Màu khi hover nút, tối hơn một chút */
    }
</style>