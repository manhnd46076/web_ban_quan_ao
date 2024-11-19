<style>
    .actions-search-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 10px;
    }

    .action-buttons a {
        margin-right: 10px;
        /* Tạo khoảng cách giữa các nút */
    }

    .search-container form {
        display: flex;
    }

    .search-container input[type="text"] {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
        /* Bo tròn góc bên trái */
    }

    .search-container button {
        padding: 5px 10px;
        border: none;
        background: #007bff;
        color: white;
        border-radius: 5px;
        
        cursor: pointer;
    }

    .search-container button:hover {
        background: #0056b3;
    }

    .btn-tinhtrang {
        border: 1px solid #000;
        color: #000;
    }

    .btn-tinhtrang:hover {
        background-color: #f6e3e1;
        color: #000;
    }

    .btn-tinhtrang.active {
        background-color: #ea5748;
        color: #fff;
        border-color: #ea5748;
    }

    .btn-tinhtrang:hover.active {
        background-color: #ea5748;
        color: #fff;
        border-color: #ea5748;
    }

</style>

<div class="content-wrapper">
    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
            <?php echo $_GET["thongbao"] ?>
        </div>
    <?php endif ?>
    <div class="card" style="border: 1px solid gray; width: 98%; margin: 10px auto;">
        <div class="actions-search-container" style="display: flex; justify-content: space-between; align-items: center; margin: 20px 10px;">
            <div class="action-buttons">
                <?php foreach($listTinhTrang as $tinhTrang ) : ?>
                    <a
                        href="<?php echo $maTinhTrang == $tinhTrang["ma_tinh_trang"] ? '#!' : '?url=admin/donhang&maTinhTrang=' . $tinhTrang["ma_tinh_trang"] ?> "
                        class="btn btn-tinhtrang <?php echo $maTinhTrang == $tinhTrang["ma_tinh_trang"] ? 'active' : '' ?> "
                    >
                        <?php echo $tinhTrang["ten_tinh_trang"]?>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="search-container">
                <form action="#" method="GET">
                    <input type="text" placeholder="Tìm kiếm..." name="searchQuery" style="margin-right: 5px;">
                    <button type="submit">Tìm</button>
                </form>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Mã hóa đơn</th>
                        <th>Ngày đặt</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng hóa đơn</th>
                        <th>Phương thức thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach($donHangByTinhTrang as $donHang ) : ?>
                        <tr>
                            <td style="font-weight: 700;"><?php echo $donHang["ma_don_hang"] ?></td>
                            <td><?php echo $donHang["ngay_dat"] ?></td>
                            <td><?php echo $donHang["ho_va_ten"]?></td>
                            <td><?php echo $donHang["tong_tien"]+$shipping?> VND</td>
                            <td style="font-weight: 600;"><?php echo $donHang["ten_phuong_thuc"] ?></td>
                            <td
                                style="color: <?php echo $donHang["ma_trang_thai"] == 1 ? 'red' : 'green'?>;
                                font-weight: 700;"
                            >
                                <?php echo $donHang["ten_trang_thai"] ?>
                            </td>
                            <td>
                                <?php if($maTinhTrang == 1 ) : ?>
                                    <a
                                        href="?url=admin/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=xacnhan&view=<?php echo $url ?>"
                                        class="btn btn-success"
                                        style="margin-right: 10px;"
                                        onclick="return confirm('Bạn có muốn xác nhận đơn hàng <?php echo $donHang['ma_don_hang'] ?> không ?')"
                                    >
                                        <i class="fas fa-check"></i>
                                    </a>
                                <?php elseif ($maTinhTrang == 2) : ?>
                                    <a
                                        href="?url=admin/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=xacnhandonggoi&view=<?php echo $url ?>"
                                        class="btn btn-success"
                                        style="margin-right: 10px;"
                                        onclick="return confirm('Bạn có muốn xác nhận đóng gói cho đơn hàng <?php echo $donHang['ma_don_hang'] ?> không ?')"
                                    >
                                        <i class="fas fa-check"></i>
                                    </a>
                                <?php elseif ($maTinhTrang == 3) : ?>
                                    <?php if($donHang["ma_trang_thai"] == 1) : ?>
                                        <a
                                            href="?url=admin/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=xacnhanthanhtoan&view=<?php echo $url ?>"
                                            class="btn btn-success"
                                            style="margin-right: 10px;"
                                            onclick="return confirm('Bạn có muốn xác nhận thanh toán cho đơn hàng <?php echo $donHang['ma_don_hang'] ?> không ?')"
                                        >
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php endif ?>
                                <?php elseif ($maTinhTrang == 4) : ?>

                                <?php elseif ($maTinhTrang == 5) : ?>
                                
                                <?php endif ?>
                                <a
                                    href="?url=admin/donhang/chitiet&id=<?php echo $donHang["id_don_hang"]?>&view=<?php echo $url ?>"
                                    class="btn btn-primary"
                                >
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php if(!$donHangByTinhTrang) :  ?>
                <div style="padding: 24px 0;">
                    <div style="display: flex; justify-content: center;">
                        <img src="<?php echo IMAGES_URL ?>no-order.png" alt="" width="120px" > 
                    </div>
                    <h4 style="text-align: center; margin-top: 16px;">Không có đơn hàng nào</h4>
                </div>
            <?php endif ?>
        </div>

    </div>
    <!-- /.card -->
</div>