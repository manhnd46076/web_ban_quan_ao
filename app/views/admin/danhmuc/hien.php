<div class="card">
    <div class="card-body">
        <!-- Hiện thị thông báo  -->
        <?php if (isset($erros['tenDanhMuc'])) { ?>
            <div class='alert alert-danger' role='alert'> <?= $erros['tenDanhMuc'] ?? '' ?> </div>
        <?php  } else ?>
        <?php if (isset($erros['maLoais'])) { ?>
            <div class='alert alert-danger' role='alert'> <?= $erros['maLoais'] ?? '' ?> </div>
        <?php  } ?>
        <!--  -->
        <form action="?url=admin/danhmuc/hien&trang_thai=1&ten_danh_muc=<?=$tenDanhMucOld?>" method="post">
            <h5 class="card-title">Hiện danh mục</h5>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Tên danh mục</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" placeholder="Viết tên danh mục" value="<?= $tenDanhMucOld ?>" name="ten_danh_muc" readonly>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    </style>
                    <div class="row">
                        <h5 class="col-lg-6">Loại</h5>
                        <!-- đếm số lượng mã loại  -->
                        <?php if ($count == 1) {?>
                            <!-- Box 1 -->
                            <div class="col-lg-3">
                            <div class="custom-control custom-radio">
                                <input 
                                 
                                type="checkbox"
                                class="custom-control-input"
                                id="customControlAutosizing1"
                                <?php foreach ($danhMucTenAn as $key => $danhMucTen) : ?>

                                 <?php if ( ($danhMucTen['ma_loai'] == 1) ) {?> 
                                   checked 
                                    <?php } ?> 
                                    <?php if ( ($danhMucTen['ma_loai'] == 2) ) {?> 
                                   disabled
                                    <?php } ?> 
                                    
                                
                                 <?php endforeach ?> value="1" name="ma_loai[]">
                                <label  style="display: block;" class="custom-control-label" for="customControlAutosizing1">Nam</label>
                            </div>
                        </div>
                            <!-- Box 2 -->                       
                        <div class="col-lg-3">
                            <div class="custom-control custom-radio">
                                <input
                                
                                type="checkbox"
                                class="custom-control-input"
                                id="customControlAutosizing2"
                                <?php foreach ($danhMucTenAn as $key => $danhMucTen) : ?> 
                                    
                                    <?php if ( ($danhMucTen['ma_loai'] == 2) ) {?> 
                                   checked 
                                    <?php } ?> 
                                    <?php if ( ($danhMucTen['ma_loai'] == 1) ) {?> 
                                   disabled
                                    <?php } ?> 
                                  
                                <?php endforeach ?> 
                                
                                value="2" 
                                name="ma_loai[]" >
                                <label style="display: block;" class="custom-control-label" for="customControlAutosizing2">Nữ</label  >
                            </div>
                        </div>
                           <?php } ?> 

                           <!-- Khi có cả 2 mã loại  -->
                        <?php if ($count == 2) { ?>
                            <!-- box 1 -->
                            <div class="col-lg-3">
                            <div class="custom-control custom-radio">
                                <input
                                readonly
                                type="checkbox"
                                class="custom-control-input"
                                id="customControlAutosizing1"
                                <?php foreach ($danhMucTenAn as $key => $danhMucTen) : ?>
                                 <?php if ( ($danhMucTen['ma_loai'] == 1) ) {?> 
                                   checked 
                                    <?php } ?>                                                                                             
                                 <?php endforeach ?> value="1" name="ma_loai[]">
                                <label style="display: block;" class="custom-control-label" for="customControlAutosizing1">Nam</label>
                            </div>
                        </div>                      
                            <!-- Box 2 -->                                              
                        <div class="col-lg-3">
                            <div class="custom-control custom-radio">
                                <input
                                readonly
                                type="checkbox"
                                class="custom-control-input"
                                id="customControlAutosizing2"
                                <?php foreach ($danhMucTenAn as $key => $danhMucTen) : ?>                        
                                    <?php if ( ($danhMucTen['ma_loai'] == 2) ) {?> 
                                checked 
                                    <?php } ?>                                  
                                <?php endforeach ?>                            
                                value="2" 
                                name="ma_loai[]">
                                <label style="display: block;" class="custom-control-label" for="customControlAutosizing2">Nữ</label>
                            </div>
                        </div>
                            <?php  } ?>
                           
                    </div>
                </div>
            </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-warning">Hiện</button>
            <a href="?url=admin/danhmuc/danhmucan">
                <button type="button" class="btn btn-danger">Hủy</button>
            </a>
        </div>
    </div>
    </form>
</div>