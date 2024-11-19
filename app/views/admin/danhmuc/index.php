<div class="card">
    <!-- Hiện thị thông báo  -->
    <?php if (isset($_GET['tb']) && isset($_GET['type'])) { ?>
        <div class='alert alert-<?= $_GET['type'] ?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
    <?php } ?>
    <!--  -->
    <div class="card-body">
        <h5 class="card-title">Bảng danh mục</h5>
        <a href="?url=admin/danhmuc/danhmucan">
                                <button style="margin-left: 12px;" type="submit" class="btn btn-success">
                                    Danh mục đã ẩn
                                </button>
                            </a>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Tên loại</th>
                        <th>
                            Hành động
                            <a href="?url=admin/danhmuc/them">
                                <button style="margin-left: 12px;" type="submit" class="btn btn-success">
                                    Thêm
                                </button>
                            </a>
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>



                        <tr>

                            <td><?= $danhMuc['ten_danh_muc'] ?></td>
                            <?php $danhMucTens = getDanhMucTen($danhMuc['ten_danh_muc'])   ?>
                            <td>
                                <?php foreach ($danhMucTens as $key => $danhMucTen) : ?>
                                    <?php echo $danhMucTen['ten_loai'] ?>
                                <?php endforeach ?>
                            </td>

                            <td>
                                <a href="?url=admin/danhmuc/sua&ten_danh_muc=<?= $danhMuc['ten_danh_muc'] ?>" class="btn btn-warning">
                                    Sửa
                                </a>

                                <!-- <a href="?url=admin/danhmuc/xoa&ten_danh_muc=<?= $danhMuc['ten_danh_muc'] ?>" class="btn btn-danger">
                                    Xóa
                                </a> -->
                                <a href="?url=admin/danhmuc/an&ten_danh_muc=<?= $danhMuc['ten_danh_muc'] ?>" class="btn btn-danger">
                                    Ẩn
                                </a>
                            </td>
                        </tr>


                    <?php endforeach ?>
                <tbody>
            </table>
        </div>
    </div>
</div>


<!--   -->