<div class="card">
    <div class="card-body">
        <?php if (isset($_GET['tb']) && isset($_GET['type'])) { ?>
            <div class='alert alert-<?= $_GET['type'] ?>' role='alert'> <?= $_GET['tb'] ?? '' ?> </div>
        <?php } ?>
        <h5 class="card-title">Danh sách Bình Luận</h5>
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Tổng Bình Luận</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $i = 1;
                    
                    foreach ($listBinhLuan as $key => $BinhLuan){  
                        // if (array_unique($BinhLuan['ten_san_pham'])) {
                        
                                
                    ?>

                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?= $BinhLuan['ten_san_pham'] ?></td>
                            <td><?= $BinhLuan['tongbl'] ?></td>
                            <td>
                                <a href="?url=admin/binhluan/tatcabinhluan&ma_san_pham=<?= $BinhLuan['ma_san_pham'] ?>" class="btn btn-primary margin-5 text-white">
                                    Chi Tiết Bình Luận
                                </a>

                            </td>
                        </tr>



                    <?php
                    
                        $i++;
                            } ?>

                    </tr>




            </table>
        </div>

    </div>
</div>