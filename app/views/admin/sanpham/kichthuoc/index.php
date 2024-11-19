<!-- <div class="container-fluid"> -->

<div class="card">
    <div class="card-body">
    <?php if (isset($_GET['tb']) && isset($_GET['type'])) {?>
                <div class='alert alert-<?=$_GET['type']?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
            <?php } ?>
        <h5 class="card-title">Bảng Kích Thước</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên loại</th>
                        <th>
                            Hành động
                            <a href="index.php?url=admin/sanpham/kichthuoc/them">
                                <button style="margin-left: 12px;" type="button" class="btn btn-success btn-sm">
                                    Thêm
                                </button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($listKichThuoc as $key => $kichthuoc) : ?>
                       
                  
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?=$kichthuoc['ten_kich_thuoc']?></td>
                        
                        <td>
                            <a href="index.php?url=admin/sanpham/kichthuoc/sua&ma_kich_thuoc=<?= $kichthuoc['ma_kich_thuoc']?>">
                                <button type="button" class="btn btn-warning btn-sm">
                                    Sửa
                                </button>
                            </a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không')" href="index.php?url=admin/sanpham/kichthuoc/xoa&ma_kich_thuoc=<?=$kichthuoc['ma_kich_thuoc']?>">
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