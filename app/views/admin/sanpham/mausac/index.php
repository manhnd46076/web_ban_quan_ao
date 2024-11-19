<!-- <div class="container-fluid"> -->
<div class="card">
    <div class="card-body">
    <?php if (isset($_GET['tb']) && isset($_GET['type'])) {?>
                <div class='alert alert-<?=$_GET['type']?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
            <?php } ?>
        <h5 class="card-title">Bảng Màu Sắc</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Màu</th>
                        <th>Mã Màu</th>
                        <th>
                            Hành động
                            <a href="index.php?url=admin/sanpham/mausac/them">
                                <button style="margin-left: 12px;" type="button" class="btn btn-success btn-sm">
                                    Thêm
                                </button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($listMauSac as $key => $MauSac) : ?>
                       
                  
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?=$MauSac['ten_mau']?></td>
                        <td><?=$MauSac['ma_mau']?></td>
                        
                        <td>
                            <a href="index.php?url=admin/sanpham/mausac/sua&ma_mau_sac=<?= $MauSac['ma_mau_sac']?>">
                                <button type="button" class="btn btn-warning btn-sm">
                                    Sửa
                                </button>
                            </a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không')" href="index.php?url=admin/sanpham/mausac/xoa&ma_mau_sac=<?=$MauSac['ma_mau_sac']?>">
                                <button type="button" class="btn btn-danger btn-sm">
                                    Xóa
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    
            </table>
        </div>

        
    </div>
</div>






<!-- </div> -->