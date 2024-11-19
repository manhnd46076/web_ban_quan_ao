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
        /* Bo tròn góc bên phải */
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

<main id="main" class="" style="padding-bottom: 50px;">



    <div class="my-account-header page-title normal-title">


        <div class="page-title-inner flex-row container text-left">
            <div class="flex-col flex-grow medium-text-center">
                <h1 class="uppercase mb-0">My Account</h1>
            </div>
        </div>
    </div>

    <div class="page-wrapper my-account" style="margin-top: 30px;">
        <div role="main" style="margin: 0 100px;">


            <div class="row vertical-tabs">
                <div class="col-md-3" style="border-right: 1px solid #ccc;">
                    <div class="account-user circle">
                        <span class="image mr-half inline-block">
                            <img alt="" src="<?php echo IMAGES_URL . $_SESSION["user"]["anh_dai_dien"] ?>" height="70" width="70" style="border-radius: 50%;">
                        </span>
                        <span class="user-name inline-block" style="margin-left: 10px;">
                            <?php echo $_SESSION["user"]["email"] ?>
                        </span>

                    </div>


                    <ul class="nav nav-line nav-uppercase nav-vertical" style="margin-top: 15px;">

                        <li style="border-bottom: 1px solid #ccc;">
                            <a href="?url=taikhoan">Tài khoản</a>
                        </li>
                        <li style="border-bottom: 1px solid #ccc;">
                            <a href="?url=taikhoan/donhang">Đơn hàng</a>
                        </li>
                        <li style="border-bottom: 1px solid #ccc;">
                            <a href="?url=dangxuat">Thoát</a>
                        </li>
                    </ul>

                </div>

                <div class="col-md-9">
                    <?php if(isset($_GET["thongbao"]) && isset($_GET["type"])) : ?>
                        <div class="alert alert-<?php echo $_GET["type"] ?>" role="alert">
                            <?php echo $_GET["thongbao"] ?>
                        </div>
                    <?php endif ?>
                    <div class="content-wrapper">
                        <div class="card" style="border: 1px solid gray; width: 98%; margin: 10px auto;">
                            <div
                                class="card-header border-0"
                                style="display: flex; align-items: center; justify-content: space-between; padding: 12px 24px;"
                            >
                                <h2 style="margin: 0;">Đơn hàng</h2>
                                <div class="search-container">
                                    <form action="#" method="GET">
                                        <input type="text" placeholder="Tìm kiếm..." name="searchQuery" style="margin-right: 5px;">
                                        <button type="submit">Tìm</button>
                                    </form>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 24px; margin: 12px 0;">
                                <div class="action-buttons">
                                    <?php foreach($listTinhTrang as $tinhTrang ) : ?>
                                        <a
                                            href="<?php echo $maTinhTrang == $tinhTrang["ma_tinh_trang"] ? '#!' : '?url=taikhoan/donhang&maTinhTrang=' . $tinhTrang["ma_tinh_trang"] ?> "
                                            class="btn btn-tinhtrang <?php echo $maTinhTrang == $tinhTrang["ma_tinh_trang"] ? 'active' : '' ?> "
                                        >
                                            <?php echo $tinhTrang["ten_tinh_trang"]?>
                                        </a>
                                    <?php endforeach ?>
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
                                                <td
                                                    style="color: <?php echo $donHang["ma_trang_thai"] == 1 ? 'red' : 'green'?>;
                                                    font-weight: 700;"
                                                >
                                                    <?php echo $donHang["ten_trang_thai"] ?>
                                                </td>
                                                <td>
                                                    <?php if($maTinhTrang == 1) : ?>
                                                        <a
                                                            href="?url=taikhoan/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=huy&view=<?php echo $url ?>"
                                                            class="btn btn-danger"
                                                            style="margin-right: 10px;"
                                                            onclick="return confirm('Bạn có muốn hủy đơn hàng <?php echo $donHang['ma_don_hang'] ?> không ?')"
                                                        >
                                                            <i class="far fa-times-circle"></i>
                                                        </a>
                                                    <?php elseif ($maTinhTrang == 2) : ?>
                                                        <a
                                                            href="?url=taikhoan/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=huy&view=<?php echo $url ?>"
                                                            class="btn btn-danger"
                                                            style="margin-right: 10px;"
                                                            onclick="return confirm('Bạn có muốn hủy đơn hàng <?php echo $donHang['ma_don_hang'] ?> không ?')"
                                                        >
                                                            <i class="far fa-times-circle"></i>
                                                        </a>
                                                    <?php elseif ($maTinhTrang == 3) : ?>
                                                        <?php if($donHang["ma_trang_thai"] == 2) : ?>
                                                            <a
                                                                href="?url=taikhoan/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=xacnhan&view=<?php echo $url ?>"
                                                                class="btn btn-success"
                                                                style="margin-right: 10px;"
                                                                onclick="return confirm('Xác nhận đã nhận được hàng ?')"
                                                            >
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php endif ?>
                                                    <?php elseif ($maTinhTrang == 4) : ?>

                                                    <?php elseif ($maTinhTrang == 5) : ?>
                                                        <a
                                                            href="?url=taikhoan/donhang/update&id=<?php echo $donHang["id_don_hang"]?>&ma=<?php echo $donHang["ma_don_hang"] ?>&action=mualai&view=<?php echo $url ?>"
                                                            class="btn btn-warning"
                                                            style="margin-right: 10px;"
                                                            onclick="return confirm('Bạn có muốn mua lại đơn hàng đã hủy <?php echo $donHang['ma_don_hang'] ?> không ?')"
                                                        >
                                                            Mua lại
                                                        </a>
                                                    <?php endif ?>
                                                    <a
                                                        href="?url=taikhoan/donhang/chitiet&id=<?php echo $donHang["id_don_hang"]?>&view=<?php echo $url ?>"
                                                        class="btn btn-primary"
                                                    >
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <!-- Thêm các hàng khác theo mẫu trên nếu cần -->
                                    </tbody>
                                </table>
                                <?php if(!$donHangByTinhTrang) :  ?>
                                    <div style="padding: 24px 0;">
                                        <div style="display: flex; justify-content: center;">
                                            <img src="<?php echo IMAGES_URL ?>no-order.png" alt="" width="120px" > 
                                        </div>
                                        <h3 style="text-align: center;">Không có đơn hàng nào</h3>
                                    </div>
                                <?php endif ?>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>


        </div>
    </div>



</main>