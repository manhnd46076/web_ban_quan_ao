<div class="card">
    <!-- Hiện thị thông báo  -->
    <?php if (isset($_GET['tb']) && isset($_GET['type'])) { ?>
        <div class='alert alert-<?= $_GET['type'] ?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
    <?php } ?>
    <!--  -->
    <div class="card-body">
        <h5 class="card-title">Bảng danh mục ẩn</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Tên loại</th>
                        <th>
                            Hành động

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listDanhMucAn as $key => $danhMuc) : ?>



                        <tr>
                            <td><?= $danhMuc['ten_danh_muc'] ?></td>
                            <?php $danhMucTenAn = getDanhMucTenAn($danhMuc['ten_danh_muc'])   ?>
                            <td>
                                <?php foreach ($danhMucTenAn as $key => $danhMucTen) : ?>
                                    <?php echo $danhMucTen['ten_loai'] ?>
                                <?php endforeach ?>
                            </td>
                            <td>


                                <!-- <a href="?url=admin/danhmuc/xoa&ten_danh_muc=<?= $danhMuc['ten_danh_muc'] ?>" class="btn btn-danger">
                                    Xóa
                                </a> -->
                                <a href="?url=admin/danhmuc/hien&ten_danh_muc=<?= $danhMuc['ten_danh_muc'] ?>" class="btn btn-danger">
                                    Hiện
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