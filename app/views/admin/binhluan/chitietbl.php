<div class="card">
    <div class="card-body">
        <?php if (isset($_GET['tb']) && isset($_GET['type'])) { ?>
            <div class='alert alert-<?= $_GET['type'] ?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
        <?php } ?>
        <h5 class="card-title">Chi Tiết Bình Luận</h5>
        <a href="?url=admin/binhluan" class="btn btn-secondary margin-5 text-white">
            Quay Trang Chủ
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
                    foreach ($listBinhLuan as $key => $BinhLuanID) :
                    ?>

                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?= $BinhLuanID['ho_va_ten'] ?></td>
                            <td><?= $BinhLuanID['noi_dung'] ?></td>
                            <td><?= $BinhLuanID['ngay_binh_luan'] ?></td>
                            <td>
                                <a href="?url=admin/binhluan/traloi&ma_san_pham=<?=$ma_san_pham?>&ma_binh_luan=<?= $BinhLuanID['ma_binh_luan'] ?>" class="btn btn-primary margin-5 text-white">
                                    Chi Tiết Trả lời
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không')" href="?url=admin/binhluan/xoa&ma_san_pham=<?php echo $ma_san_pham ?>&ma_binh_luan=<?= $BinhLuanID['ma_binh_luan'] ?>">
                                    <button type="button" class="btn btn-danger ">
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