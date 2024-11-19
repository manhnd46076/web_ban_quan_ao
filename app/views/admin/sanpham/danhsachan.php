<form action="?url=admin/sanpham/danhsach/dsan" method="post">
    <div class="row">
        <div class="col-md-8">
            <?php if(isset($thongbao) && isset($type)) : ?>
                <div class="alert alert-<?php echo $type ?>" role="alert">
                    <?php echo $thongbao ?>
                </div>
            <?php endif ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-0">Danh sách các sản phẩm đã ẩn</h5>
                </div>
                <div class="table-responsive">
                    <table class="table thead-light">
                        <thead>
                            <tr>
                                <th>
                                    <label class="customcheckbox m-b-20">
                                        <input type="checkbox" id="mainCheckbox" />
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Loại</th>
                            </tr>
                        </thead>
                        <tbody class="customtable">
                            <?php foreach($listSanPham as $key => $sanPham ) : ?>
                                <tr>
                                    <th>
                                        <label class="customcheckbox">
                                            <input
                                                type="checkbox"
                                                class="listCheckbox"
                                                name="checkbox[]"
                                                value="<?php echo $sanPham["ma_san_pham"]?>"
                                            />
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <td><?php echo $key + 1 ?></td>
                                    <td>
                                        <img
                                            src="<?php echo IMAGES_URL . $sanPham["anh"] ?>"
                                            alt="ảnh sản phẩm"
                                            style="object-fit: cover; width: 60px; height:60px;"
                                        >
                                    </td>
                                    <td>
                                        <h6><?php echo $sanPham["ten_san_pham"] ?></h6>
                                    </td>
                                    <td>
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
                        <?php if(!$listSanPham) : ?>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-center">Không có sản phẩm nào ẩn</td>
                                </tr>
                            </tfoot>
                        <?php endif ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="border-top">
                        <div class="card-body">
                            <?php if(isset($errors)) : ?>
                                <?php foreach($errors as $error) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        [#1] Lỗi: <?php echo $error ?>
                                    </div>
                                <?php endforeach?>
                            <?php endif ?>
                            <button type="submit" class="btn btn-success">Bỏ ẩn sản phẩm đã chọn</button>
                            <a href="?url=admin/sanpham/danhsach" class="btn btn-secondary">Danh sách S.P</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>