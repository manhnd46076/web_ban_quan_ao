<main id="main" class="" style="padding-bottom: 50px;">



    <div class="my-account-header page-title normal-title">


        <div class="page-title-inner flex-row container text-left">
            <div class="flex-col flex-grow medium-text-center">
                <h1 class="uppercase mb-0">My Account</h1>
            </div>
        </div>
    </div>

    <div class="page-wrapper my-account" style="margin-top: 30px;">
        <div class="container" role="main">


            <div class="row vertical-tabs">
                <div class="col-md-4" style="border-right: 1px solid #ccc;">
                    <div class="account-user circle">
                        <span class="image mr-half inline-block">
                            <img
                                alt=""
                                src="<?php echo IMAGES_URL . $_SESSION["user"]["anh_dai_dien"] ?>"
                                height="70"
                                width="70"
                                style="border-radius: 50%;"
                            >
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

                <div class="col-md-8">
                    <?php if(isset($errors)) : ?>
                        <?php foreach($errors as $error ) : ?>
                            <div class="alert alert-danger" role="alert">
                                Lỗi: <?php echo $error ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if(isset($thongbao) && isset($type)) : ?>
                        <div class="alert alert-<?php echo $type ?>" role="alert">
                            <?php echo $thongbao ?>
                        </div>
                    <?php endif?>
                    <form action="?url=taikhoan" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label class="btn-block" >Họ và tên</label>
                                    <input
                                        type="text"
                                        name="hoVaTen"
                                        style="width: 100%;"
                                        value="<?php echo $user["ho_va_ten"] ?>"
                                    >
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label class="btn-block" >Số điện thoại</label>
                                    <input
                                        type="text"
                                        name="soDienThoai"
                                        style="width: 100%;"
                                        value="<?php echo $user["so_dien_thoai"] ?>"
                                    >
                                </p>
                            </div>
                            <div class="col-md-12" style="margin: 30px 0;">
                                <p>
                                    <label class="btn-block" >Địa chỉ</label>
                                    <input
                                        type="text"
                                        name="diaChi"
                                        style="width: 100%;"
                                        value="<?php echo $user["dia_chi"] ?>"
                                    >
                                </p>
                            </div>
                        </div>

                        <fieldset style="margin-bottom: 40px;">
                            <legend>Thay đổi mật khẩu</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <label class="btn-block" >Mật khẩu hiện tại (bỏ trống nếu không đổi)</label>
                                        <input
                                            type="password"
                                            style="width: 100%;"
                                            name="matKhauHienTai"
                                            value="<?php echo $matKhauHienTai ?? '' ?>"
                                        >
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-6">
                                    <p>
                                        <label class="btn-block" >Mật khẩu mới (bỏ trống nếu không đổi)</label>
                                        <input
                                            type="password"
                                            style="width: 100%;"
                                            name="matKhau1"
                                            value="<?php echo $matKhau1 ?? '' ?>"
                                        >
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-6">
                                    <p>
                                        <label class="btn-block" >Xác nhận mật khẩu mới</label>
                                        <input
                                            type="password"
                                            style="width: 100%;"
                                            name="matKhau2"
                                            value="<?php echo $matKhau2 ?? '' ?>"
                                        >
                                    </p>
                                </div>
                            </div>
                        </fieldset>
                        <button
                            type="submit"
                            class="btn medium-button button-red mb10"
                        >
                            Lưu thay đổi
                        </button>

                    </form>
                </div>
            </div>


        </div>
    </div>



</main>