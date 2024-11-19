<div class="card">
    <div class="card-body">
        <?php if (isset($_GET['tb']) && isset($_GET['type'])) { ?>
            <div class='alert alert-<?= $_GET['type'] ?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
        <?php } ?>
        <h5 class="card-title">Chi Tiết Bình Luận</h5>
        <a href="?url=admin/binhluan/tatcabinhluan&ma_san_pham=<?=$ma_san_pham?>" class="btn btn-secondary margin-5 text-white">
            Quay Lại
        </a>
        <a href="?url=admin/binhluan" class="btn btn-secondary margin-5 text-white">
            Quay Lại Trang Chủ
        </a>    
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và Tên</th>
                        <th>Nội Dung</th>
                        <th>Ngày Bình Luận</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>


                    <?php $i = 1;
                    foreach ($listChiTietBinhLuan as $key => $BinhLuanCT) : ?>

                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?= $BinhLuanCT['ho_va_ten'] ?></td>
                            <td><?= $BinhLuanCT['noi_dung'] ?></td>
                            <td><?= $BinhLuanCT['ngay_binh_luan'] ?></td>
                            <td>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không')" href="index.php?url=admin/binhluan/xoatraloi&ma_san_pham=<?php echo $ma_san_pham ?>&ma_binh_luan=<?=$ma_binh_luan?>&ma_chi_tiet_binh_luan=<?= $BinhLuanCT['ma_chi_tiet_binh_luan'] ?>">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        Xóa
                                    </button>
                                </a>
                            </td>
                        </tr>



                    <?php $i++;
                    endforeach; ?>

                    </tr>




            </table>
        </div>

    </div>
</div>