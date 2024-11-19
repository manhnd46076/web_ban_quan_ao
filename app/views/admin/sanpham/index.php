
<div class="card-body">
    <h5 class="card-title">Bảng sản phẩm</h5>
    <div style="margin-bottom: 18px;">
        <button type="button" class="btn btn-success margin-5 text-white" data-toggle="modal" data-target="#Modal0">
            Thêm mới
        </button>
        <a href="?url=admin/sanpham/danhsach/dsan" class="btn btn-danger">
            Danh sách các sản phẩm đã ẩn
        </a>
        <div class="modal fade" id="Modal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="?url=admin/sanpham/danhsach" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="col-lg-2">Loại</h5>
                                <div class="col-lg-5">
                                    <div class="custom-control custom-radio">
                                        <input
                                            type="radio"
                                            class="custom-control-input"
                                            id="bienthe"
                                            name="loai"
                                            checked
                                            value="<?php echo 1 ?>"
                                        >
                                        <label class="custom-control-label" for="bienthe">Sản phẩm bình thường</label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="custom-control custom-radio">
                                        <input
                                            type="radio"
                                            class="custom-control-input"
                                            id="binhthuong"
                                            name="loai"
                                            value="<?php echo 2 ?>"
                                        >
                                        <label class="custom-control-label" for="binhthuong">Sản phẩm biến thể</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning" name="btn-add">Ok</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Số lượng</th>
                    <th>Loại</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listSanPham as $key => $sanPham ) : ?>
                    <tr>
                        <td style="width: 0%;"><?php echo $key + 1 ?></td>
                        <td style="width: 0%;">
                            <img
                                src="<?php echo IMAGES_URL . $sanPham["anh"] ?>"
                                alt="ảnh sản phẩm"
                                style="object-fit: cover; width: 60px; height:60px;"
                            >
                        </td>
                        <td>
                            <h6><?php echo $sanPham["ten_san_pham"] ?></h6>
                            <div>
                                <a href="?url=admin/sanpham/danhsach/sua&maSanPham=<?php echo $sanPham["ma_san_pham"] ?>" class="text-primary">Chỉnh sửa</a>
                                <?php $checkSanPhamTrongDonHang = false; ?>
                                <?php foreach($listSanPhamTrongDonHang as $sanPhamTrongDonHang) :  ?>
                                    <?php if($sanPhamTrongDonHang["ma_san_pham"] == $sanPham["ma_san_pham"]) : ?>
                                        <?php  $checkSanPhamTrongDonHang = true; break; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                                <?php if(!$checkSanPhamTrongDonHang) : ?>
                                    |
                                    <a href="#" class="text-danger" data-toggle="modal" data-target="#Modal<?php echo $key+1 ?>">Ẩn</a>
                                <?php endif ?>
                            </div>
                            <div class="modal fade" id="Modal<?php echo $key+1 ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                <span class="text-info">#[Ẩn sản phẩm]</span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="?url=admin/sanpham/danhsach/an" method="post">
                                            <input type="hidden" name="maSanPham" value="<?php echo $sanPham["ma_san_pham"] ?>">
                                            <div class="modal-body">
                                                Bạn có chắc muốn ẩn 
                                                <?php echo $sanPham["ten_san_pham"] ?> không ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Ẩn</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 12%;"><?php echo $sanPham["gia"] ?> VND</td>
                        <td style="width: 20%;">
                            <?php if($sanPham["so_luong_danh_muc"] >= 2 ) { ?>
                                <?php 
                                    $listDetailSanPhamID = getIDSanPhamSoLuongLoai($sanPham["ma_san_pham"]);
                                    foreach($listDetailSanPhamID as $sanPhamID) {
                                        if($sanPhamID["so_luong_loai"] == 2 ) {
                                            echo $sanPhamID["ten_danh_muc"] . " ( Nam, Nữ )";
                                        }
                                        else if($sanPhamID["so_luong_loai"] == 1 ) {
                                            echo $sanPhamID["ten_danh_muc"] . " ( " . $sanPhamID["ten_loai"] . " )";
                                        }
                                        echo "<br>";
                                        
                                    }
                                ?>
                            <?php } else {
                                echo $sanPham["ten_danh_muc"] . " ( " . $sanPham["ten_loai"] . " )";
                            }?>
                        </td>
                        <td style="width: 10%;">
                            <?php
                                if($sanPham["so_luong"]) {
                                    echo $sanPham["so_luong"];
                                }
                                else {
                                    $soLuong = countSoLuongChiTietSanPham($sanPham["ma_san_pham"]);
                                    echo $soLuong["so_luong"];
                                }
                            ?>
                        </td>
                        <td style="width: 10%;">
                            <?php
                                if($sanPham["so_luong"]) {
                                    echo "<h6 class='text-secondary'>Sản phẩm bình thường</h6>";
                                }
                                else {
                                    echo "<h6 class='text-info'>Sản phẩm biến thể</h6>";
                                }
                            ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <tbody>
        </table>
    </div>

</div>