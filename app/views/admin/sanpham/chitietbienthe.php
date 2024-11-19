<h3><span class="text-primary">[Tên sản phẩm]:</span> <?php echo $sanPham["ten_san_pham"] ?></h3>
<?php if(isset($thongbao) && isset($type)) : ?>
    <div class="alert alert-<?php echo $type ?> m-t-20" role="alert">
        <?php echo $thongbao ?>
    </div>
<?php endif ?>
<h5>Thông tin các biến thể</h5>
<form
    action="?url=admin/sanpham/danhsach/bienthe/chitiet&maSanPham=<?php echo $maSanPham ?>"
    method="post"
    enctype="multipart/form-data"
>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <?php foreach($bienThes as $key => $bienThe) : ?>
                    <div class="col-md-12">
                        <form
                            action="?url=admin/sanpham/danhsach/bienthe/chitiet&maSanPham=<?php echo $maSanPham ?>"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            <div class="card">
                                <div class="card-body">
                                    <!-- <div class="alert alert-danger" role="alert">
                                        Vui lòng điền đầy đủ thông tin
                                    </div> -->
                                    <h5 class="card-header">
                                        <a
                                            class="link"
                                            data-toggle="collapse"
                                            data-parent="#accordian-4"
                                            href="#Toggle-<?php echo $key ?>"
                                            aria-expanded="true"
                                            aria-controls="Toggle-<?php echo $key ?>"
                                        >
                                            <h5>
                                                Biến thể [#<?php echo $key+1 ?>]:
                                                Size <?php echo $bienThe["ten_kich_thuoc"]?>,
                                                <?php echo $bienThe["ten_mau"]?>
                                            </h5>
                                        </a>
                                    </h5>
                                    <div id="Toggle-<?php echo $key ?>" class="collapse show multi-collapse m-t-15">
                                        <div class="card-body widget-content">
                                            <div class="row justify-content-between">
                                                <input
                                                    type="hidden"
                                                    name="maChiTietSanPham"
                                                    value="<?php echo $bienThe["ma_chi_tiet_san_pham"] ?>"
                                                >
                                                <div class="col-md-4">
                                                    <div class="row el-element-overlay">
                                                        <?php if($bienThe["anh_chi_tiet"]) : ?>
                                                            <div class="col-md-12">
                                                                <div class="el-card-item">
                                                                    <div class="el-card-avatar el-overlay-1" style="margin: 0;">
                                                                        <img src="<?php echo IMAGES_URL . $bienThe["anh_chi_tiet"]?>" alt="image" />
                                                                        <div class="el-overlay">
                                                                            <ul class="list-style-none el-info">
                                                                                <li class="el-item">
                                                                                    <a
                                                                                        class="btn default btn-outline image-popup-vertical-fit el-link"
                                                                                        href="<?php echo IMAGES_URL . $bienThe["anh_chi_tiet"]?>"
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
                                                            <input
                                                                type="hidden"
                                                                name="anhBienDongCu"
                                                                value="<?php echo $bienThe["anh_chi_tiet"]?>"
                                                            >
                                                        <?php endif ?>
                                                        <div class="col-md-12">
                                                            <h5 class="text-center">Ảnh</h5>
                                                        </div>
                                                        <div class="col-md-12 m-t-10">
                                                            <div>
                                                                <div class="custom-file">
                                                                    <input
                                                                        type="file"
                                                                        class="custom-file-input"
                                                                        id="anhBienThe"
                                                                        name="anhBienThe"
                                                                    >
                                                                    <label class="custom-file-label" for="anhBienThe">Chọn ảnh</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4">Giá biến động</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Nhập giá biến động"
                                                                    aria-label="Recipient 's username"
                                                                    aria-describedby="basic-addon2"
                                                                    name="giaBienDong"
                                                                    value="<?php
                                                                        if($bienThe["gia_bien_dong"] || $bienThe["gia_bien_dong"] == 0) {
                                                                            echo $bienThe["gia_bien_dong"];
                                                                        }
                                                                        else {
                                                                            echo '';
                                                                        }
                                                                    ?>"
                                                                >
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon2">VNĐ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row m-t-15">
                                                        <label class="col-md-4">Số lượng</label>
                                                        <div class="col-md-8">
                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="fname"
                                                                placeholder="Nhập số lượng"
                                                                name="soLuong"
                                                                value="<?php
                                                                    if($bienThe["so_luong"] || $bienThe["so_luong"] == 0) {
                                                                        echo $bienThe["so_luong"];
                                                                    }
                                                                    else {
                                                                        echo '';
                                                                    }
                                                                ?>"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2 offset-md-9">
                                                    <button type="submit" class="btn btn-warning" name="btn-update">Lưu thay đổi</button>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#Modal<?php echo $key+1?>"
                                                >
                                                    Xóa
                                                </button>
                                                <div class="modal fade" id="Modal<?php echo $key+1?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Xóa biến thể</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có chắc muốn xóa Biến Thể [#<?php echo $key+1 ?>]:
                                                                Size <?php echo $bienThe["ten_kich_thuoc"]?>,
                                                                <?php echo $bienThe["ten_mau"]?> không ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button
                                                                    type="submit"
                                                                    name="btn-delete"
                                                                    class="btn btn-danger"
                                                                >
                                                                    Xóa
                                                                </button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-top">
                                <div class="card-body">
                                    <!-- <div class="alert alert-danger" role="alert">
                                        [#1] Lỗi: Vui lòng nhập tên sản phẩm
                                    </div> -->
                                    <?php if(!empty($errors)) : ?>
                                        <?php foreach($errors as $key => $error) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                [#<?php echo $key+1 ?>] Lỗi: <?php echo $error ?>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    <button
                                        type="button"
                                        class="btn btn-success margin-5"
                                        data-toggle="modal"
                                        data-target="#Modal0"
                                    >
                                        Thêm biến thể
                                    </button>
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

<div class="modal fade" id="Modal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm biến thể</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form
                action="?url=admin/sanpham/danhsach/bienthe/chitiet&maSanPham=<?php echo $maSanPham ?>"
                method="post"
            >
                <div class="modal-body">
                    <div class="card-body widget-content">
                            <div class="form-group row m-t-15">
                                <label class="col-md-3">Kích thước</label>
                                <div class="col-md-9">
                                    <select
                                        class="select2 form-control"
                                        style="height: 36px; width: 100%;"
                                        name="kichThuoc"
                                    >
                                        <?php foreach($kichThuocs as $kichThuoc) : ?>
                                            <option
                                                value="<?php echo $kichThuoc["ma_kich_thuoc"]?>"
                                            >
                                            <?php echo $kichThuoc["ten_kich_thuoc"] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-t-15">
                                <label class="col-md-3 m-t-15">Màu sắc</label>
                                <div class="col-md-9">
                                    <select
                                        class="select2 form-control"
                                        style="height: 36px; width: 100%;"
                                        name="mauSac"
                                    >
                                        <?php foreach($mauSacs as $key => $mauSac) : ?>
                                            <option
                                                value="<?php echo $mauSac["ma_mau_sac"]?>"
                                            >
                                            <?php echo $mauSac["ten_mau"] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="btn-add-bien-the">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

