<div class="row">
    <div class="col-lg-7">
        <form action="?url=admin/nguoidung/capnhat&ma_nguoi_dung=<?= $nguoiDungID['ma_nguoi_dung'] ?>" method="post">
            <div class="card-body">
                <h4 class="card-title">
                    <h4 class="col-lg-6">Họ và Tên :<?= $nguoiDungID['ho_va_ten'] ?></h4>
                    <label style="margin-left: 18px;">Vai trò: <?php
                                                                if ($nguoiDungID['quyen'] == 0) {
                                                                    echo "Người Dùng";
                                                                } else {
                                                                    echo "Quản trị";
                                                                } ?></label>
                </h4>
                <!-- <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mật khẩu cũ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="mat_khau_cu" placeholder="Password">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mật khẩu mới</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="mat_khau_moi" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nhập lại mật khẩu mới</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lname" name="mat_khau_moi" placeholder="Repassword">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                    <a href="?url=admin/nguoidung" class="btn btn-secondary" style="margin-left: 12px;">Hủy</a>
                </div>
            </div>
        </form>
    </div>
</div>