<div class="row">
    <div class="col-lg-7">
        <form action="?url=admin/nguoidung/phanquyen&ma_nguoi_dung=<?= $nguoiDungID['ma_nguoi_dung'] ?>" method="post">
        <h4 class="col-lg-6">Họ và Tên :<?=$nguoiDungID['ho_va_ten']?></h4>
       
            <div class="card-body">
                <div class="row">                   
                    <h5 class="col-lg-6">Phân quyền</h5>
                    <div class="col-lg-3">
                        <div class="custom-control custom-radio">
                            <input
                            type="radio"
                            class="custom-control-input"
                            id="customControlValidation1"
                            name="quyen"
                             value="1" 
                             <?php if($nguoiDungID['quyen']==1){    
                                echo 'checked';
                             }?>>
                            <label class="custom-control-label" for="customControlValidation1">Quản Trị</label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="custom-control custom-radio">
                            <input
                            type="radio"
                            class="custom-control-input"
                            id="customControlValidation2"
                            name="quyen" 
                            value="0" 
                            <?php if($nguoiDungID['quyen']==0){
                                echo 'checked';
                             }?>>
                            <label class="custom-control-label" for="customControlValidation2">Người Dùng</label>
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body d-flex justify-content-end">

                        <button type="submit" class="btn btn-warning">Cập nhật</button>
                        <!-- <a href="?url=admin/nguoidung/capnhat&ma_nguoi_dung=<? //= $nguoiDungID['ma_nguoi_dung'] ?>" class="btn btn-secondary" style="margin-left: 12px;">Thay đổi mật khẩu</a> -->
                        <a href="?url=admin/nguoidung" class="btn btn-secondary" style="margin-left: 12px;">Hủy</a>
                    </div>
                </div>

        </form>
    </div>
</div>