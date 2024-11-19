<!-- <div class="container-fluid"> -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Thêm Màu Sắc</h5>

        <div class="form-group row">
            <label class="col-md-3 m-t-15">Mã Màu Sắc</label>
            <div class="col-sm-9">
                 <form action="?url=admin/sanpham/mausac/sua&ma_mau_sac=<?=$mauSacID['ma_mau_sac']?>" method="post">
                <input type="text" class="form-control" id="" value="<?=$mauSacID['ma_mau_sac']?>" disabled  name="ma_mau_sac">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 m-t-15">Tên Mùa</label>
            <div class="col-sm-9">
               
                <input type="text" class="form-control" id="" value="<?=$mauSacID['ten_mau']?>"  placeholder="Viết tên màu" name="ten_mau">
            </div>
        </div>         
        <div class="form-group row">
            <label class="col-md-3 m-t-15">Mã Màu</label>
            <div class="col-sm-9">
               
                <input type="text" class="form-control" id="fname" value="<?=$mauSacID['ma_mau']?>"  placeholder="Viết mã màu" name="ma_mau">
            </div>
        </div>  
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-warning">Cập nhật</button>
            <button type="button" class="btn btn-info">Nhập lại</button>
            <a href="?url=admin/sanpham/mausac" class="btn btn-secondary" style="margin-left: 12px;">Hủy</a>
        </div>
    </div>
    </form>

</div>







<!-- </div> -->