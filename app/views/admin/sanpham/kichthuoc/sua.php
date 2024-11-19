<!-- <div class="container-fluid"> -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Thêm Kích Thước</h5>

        <div class="form-group row">
            <label class="col-md-3 m-t-15">Mã Kích Thước</label>
            <div class="col-sm-9">
                 <form action="?url=admin/sanpham/kichthuoc/sua&ma_kich_thuoc=<?=$kichThuocID['ma_kich_thuoc']?>" method="post">
                <input type="text" class="form-control" id="" value="<?=$kichThuocID['ma_kich_thuoc']?>" disabled  name="ma_kich_thuoc">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 m-t-15">Tên Kích Thước</label>
            <div class="col-sm-9">
               
                <input type="text" class="form-control" id="fname" value="<?=$kichThuocID['ten_kich_thuoc']?>"  placeholder="Viết tên danh mục" name="ten_kich_thuoc">
            </div>
        </div>         
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <button type="button" class="btn btn-info">Nhập lại</button>
            <a href="?url=admin/sanpham/kichthuoc" class="btn btn-secondary" style="margin-left: 12px;">Hủy</a>
            
        </div>
    </div>
    </form>

</div>







<!-- </div> -->