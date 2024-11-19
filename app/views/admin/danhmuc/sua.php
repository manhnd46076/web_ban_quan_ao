<div class="card">
    <!-- Hiện thị thông báo  -->
    <?php if (isset($erros['tenDanhMuc'])) { ?>
        <div class='alert alert-danger' role='alert'> <?= $erros['tenDanhMuc'] ?? '' ?> </div>
    <?php  } else ?>
    <?php if (isset($erros['maLoai'])) { ?>
        <div class='alert alert-danger' role='alert'> <?= $erros['maLoai'] ?? '' ?> </div>
    <?php  } ?>
    <!--  -->
    <form action="?url=admin/danhmuc/sua&ten_danh_muc=<?= $tenDanhMucOld ?>" method="post">
        <div class="card-body">
            <h5 class="card-title">Cập nhật danh mục</h5>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Tên danh mục</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fname" placeholder="Viết tên danh mục" value="<?= $tenDanhMucOld ?>" name="ten_danh_muc">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 m-t-15">Tên loại</label>
                <div class="col-md-9">
                    <select class="select2 form-control m-t-15  disable-on-load" multiple="multiple" style="height: 36px;width: 100%;" name="ma_loai[]"  >
                        <?php foreach ($listLoai as $key => $Loai) : ?>
                            <?php $isSelected = in_array($Loai['ma_loai'], array_column($danhMucTens, 'ma_loai')) ?>
                            <option 
                            value="<?= $Loai['ma_loai'] ?>" 
                            <?= $isSelected ? 'selected' : '' ?>
                            
                            >
                            <?= $Loai['ten_loai'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>               
                    <input type="hidden" name="ma_loai_hidden[]" id="ma_loai_hidden" value="<?= implode(',', array_column($danhMucTens, 'ma_loai')) ?>">
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-warning">Cập nhật</button>
                <a href="?url=admin/danhmuc">
                    <button type="button" class="btn btn-danger">Hủy</button>
                </a>
            </div>
        </div>
    </form>
</div>
<script>
    window.onload = function () {
        var selects = document.querySelectorAll('select.disable-on-load');
        selects.forEach(function(select){
            select.disabled = true;
        });      
    };
</script>
<!-- 
