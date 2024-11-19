<div class="card">
    <!-- Hiện thị thông báo  -->
    <?php if (isset($erros['tenDanhMuc'])) { ?>
        <div class='alert alert-danger' role='alert'> <?= $erros['tenDanhMuc'] ?? '' ?> </div>
    <?php  } else ?>
    <?php if (isset($erros['maLoai'])) { ?>
        <div class='alert alert-danger' role='alert'> <?= $erros['maLoai'] ?? '' ?> </div>
    <?php  } ?>
    <form action="?url=admin/danhmuc/them" method="post">
        <div class="card-body">
            <h5 class="card-title">Thêm danh mục</h5>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Tên danh mục</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" placeholder="Viết tên danh mục" name="ten_danh_muc">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Tên loại</label>
                <div class="col-md-9">
                    <select class="select2 form-control m-t-15" multiple="multiple" style="height: 36px;width: 100%;" name="ma_loai[]">
                        <?php foreach ($listLoai as $key => $loai) : ?>
                            <option value="<?= $loai['ma_loai'] ?>"><?= $loai['ten_loai'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-success">Thêm mới</button>
                <!-- <button type="button" class="btn btn-info">Nhập lại</button> -->
                <a href="?url=admin/danhmuc"><button type="button" class="btn btn-danger">Hủy</button></a>
            </div>
        </div>
    </form>
</div>