<h3>Sửa sản phẩm</h3>
<?php if(isset($thongbao) && isset($type)) : ?>
    <div class="alert alert-<?php echo $type ?> m-t-20" role="alert">
        <?php echo $thongbao ?>
    </div>
<?php endif ?>
<h4><span class="text-primary">[Tên sản phẩm]:</span> <?php echo $sanPham["ten_san_pham"] ?></h4>
<form
    action="?url=admin/sanpham/danhsach/sua&maSanPham=<?php echo $sanPham["ma_san_pham"]?>"
    method="post"
    enctype="multipart/form-data"
>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>Thông tin sản phẩm</h5>
                    <!-- <div class="form-group row">
                        <label class="col-md-3" for="disabledTextInput">Mã sản phẩm</label>
                        <div class="col-md-9">
                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
                        </div>
                    </div> -->
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Tên sản phẩm</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="fname"
                                placeholder="Nhập tên sản phẩm"
                                name="tenSanPham"
                                value="<?php echo $sanPham["ten_san_pham"] ?>"
                            >
                        </div>
                    </div>
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Danh Mục</label>
                        <div class="col-md-9">
                            <select
                                class="select2 form-control"
                                multiple="multiple"
                                style="height: 36px;width: 100%;"
                                name="danhMuc[]"
                            >
                                <optgroup label="Nam">
                                    <?php $danhMucNam = getAllDanhMucIDLoai(1) ?>
                                    <?php foreach($danhMucNam as $danhMuc) : ?>
                                        <option
                                            value="<?php echo $danhMuc["ma_danh_muc"]?>"
                                            <?php foreach($danhMucSelectedOlds as $danhMucSelectedOld ) : ?>
                                                <?php
                                                    if($danhMucSelectedOld["ma_danh_muc"] == $danhMuc["ma_danh_muc"]) {
                                                        echo "selected";
                                                    }
                                                ?>
                                            <?php endforeach ?>
                                        >
                                            <?php echo $danhMuc["ten_danh_muc"]?> ( Nam )
                                        </option>
                                    <?php endforeach ?>
                                </optgroup>
                                <optgroup label="Nữ">
                                    <?php $danhMucNam = getAllDanhMucIDLoai(2) ?>
                                    <?php foreach($danhMucNam as $danhMuc) : ?>
                                        <option
                                            value="<?php echo $danhMuc["ma_danh_muc"]?>"
                                            <?php foreach($danhMucSelectedOlds as $danhMucSelectedOld ) : ?>
                                                <?php
                                                    if($danhMucSelectedOld["ma_danh_muc"] == $danhMuc["ma_danh_muc"]) {
                                                        echo "selected";
                                                    }
                                                ?>
                                            <?php endforeach ?>
                                        >
                                            <?php echo $danhMuc["ten_danh_muc"]?> ( Nữ )
                                        </option>
                                    <?php endforeach ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Giá</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập giá"
                                    aria-label="Recipient 's username"
                                    aria-describedby="basic-addon2"
                                    name="gia"
                                    value="<?php echo $sanPham["gia"] ?>"
                                >
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Số lượng</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="fname"
                                placeholder="Nhập số lượng"
                                name="soLuong"
                                value="<?php echo $sanPham["so_luong"]?>"
                            >
                        </div>
                    </div>
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Giảm giá</label>
                        <div class="col-md-9">
                            <select
                                class="select2 form-control"
                                style="height: 36px;width: 100%;"
                                name="giamGia"
                            >
                                <option
                                    value="0"
                                    <?php echo $sanPham["ma_giam_gia"] ? 'selected' : '' ?>
                                >
                                    Không có giảm giá
                                </option>
                                <?php foreach($giamGias as $giamGia ) : ?>
                                    <option
                                        value="<?php echo $giamGia["ma_giam_gia"]?>"
                                        <?php echo $sanPham["ma_giam_gia"] == $giamGia["ma_giam_gia"] ? 'selected' : '' ?>
                                    >
                                    <?php echo $giamGia["ten_giam_gia"]?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Trạng thái</label>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="custom-control custom-radio">
                                        <input
                                            type="radio"
                                            class="custom-control-input"
                                            id="trangThai1"
                                            name="trangThai"
                                            value="1"
                                            <?php echo $sanPham["trang_thai"] == 1 ? "checked" : '' ?>
                                        >
                                        <label class="custom-control-label" for="trangThai1">Hiện</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="custom-control custom-radio">
                                        <input
                                            type="radio"
                                            class="custom-control-input"
                                            id="trangThai2"
                                            name="trangThai"
                                            value="0"
                                            <?php echo $sanPham["trang_thai"] == 0 ? "checked" : '' ?>
                                        >
                                        <label class="custom-control-label" for="trangThai2">Ẩn</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-t-15">
                        <label class="col-md-3">Mô tả</label>
                        <div class="col-md-9">
                            <div id="editor" style="height: 200px;"></div>
                        </div>
                        <textarea
                            name="moTa"
                            id="moTa"
                            style="display: none;"
                        ></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div class="col-md-5">
                                        <div class="row el-element-overlay">
                                            <div class="col-md-12">
                                                <h6 class="text-center">Ảnh mặc định</h6>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="el-card-item">
                                                    <div class="el-card-avatar el-overlay-1" style="margin: 0;">
                                                        <img src="<?php echo IMAGES_URL . $sanPham["anh"]?>" alt="user" />
                                                        <div class="el-overlay">
                                                            <ul class="list-style-none el-info">
                                                                <li class="el-item">
                                                                    <a
                                                                        class="btn default btn-outline image-popup-vertical-fit el-link"
                                                                        href="<?php echo IMAGES_URL . $sanPham["anh"]?>"
                                                                    >
                                                                        <i class="mdi mdi-magnify-plus"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="el-item">
                                                                    <a class="btn default btn-outline el-link" href="javascript:void(0);">
                                                                        <i class="mdi mdi-link"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="anhMacDinhCu" value="<?php echo $sanPham["anh"]?>">
                                            <div class="col-md-12 m-t-10">
                                                <div>
                                                    <div class="custom-file">
                                                        <input
                                                            type="file"
                                                            class="custom-file-input"
                                                            id="anhMacDinh"
                                                            name="anhMacDinh"
                                                        >
                                                        <label class="custom-file-label" for="anhMacDinh">Chọn ảnh</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row el-element-overlay">
                                            <div class="col-md-12">
                                                <h6 class="text-center">Bộ sưu tập</h6>
                                            </div>
                                            <?php if($boSuuTaps) {?>
                                                <?php foreach($boSuuTaps as $boSuuTap ) : ?>
                                                    <div class="col-md-6" class="position-relative">
                                                        <div class="el-card-item">
                                                            <div class="el-card-avatar el-overlay-1" style="margin: 0;">
                                                                <img src="<?php echo IMAGES_URL . $boSuuTap["anh"]?>" />
                                                            </div>
                                                        </div>
                                                        <div class="p-1 bg-white" style="position: absolute; top: 0; right: 0; border-radius: 50%;">
                                                            <a
                                                                href="?url=admin/sanpham/danhsach/xoaanh&maSanPham=<?php echo $sanPham["ma_san_pham"]?>&maBoSuuTap=<?php echo $boSuuTap["ma_bo_suu_tap"]?>"
                                                                style="color: red; font-weight: 700;"
                                                                onclick="return confirm('Bạn có chắc muốn xóa ảnh này không ?')";
                                                            >
                                                                X
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php } else { ?>
                                                <div class="col-md-12 m-t-10">
                                                    <div>
                                                        <div class="custom-file">
                                                            <input
                                                                type="file"
                                                                class="custom-file-input"
                                                                id="boSuuTap"
                                                                name="boSuuTap[]"
                                                                multiple
                                                            >
                                                            <label class="custom-file-label" for="boSuuTap">Chọn ảnh</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-top">
                                <div class="card-body">
                                    <?php if(isset($errors)) : ?>
                                        <?php foreach($errors as $key => $error) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                [#<?php echo $key+1 ?>] Lỗi: <?php echo $error ?>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                                    <a href="?url=admin/sanpham/danhsach" class="btn btn-secondary">Danh sách S.P</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    let moTa = document.querySelector('#moTa');
    let editor = document.querySelector('#editor');

    editor.addEventListener('keyup', function() {
        let qlEditor = document.querySelector('.ql-editor')
        moTa.innerHTML = qlEditor.innerHTML; 
    })
</script>
<?php
    if(isset($sanPham["mo_ta"])) {
        $moTa = $sanPham["mo_ta"];
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            let qlEditor = document.querySelector('.ql-editor')
            moTa.innerHTML = '$moTa'; 
            qlEditor.innerHTML = '$moTa';
        });
        </script>";
    }
?>