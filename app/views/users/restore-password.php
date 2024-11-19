<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo IMAGES_URL ?>favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="<?php echo CSS_URL ?>style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
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
                <?php if($success) { ?>
                    <div class="text-center">
                        <span class="text-white">Mật khẩu của bạn đã được thay đổi. 
                            Vui lòng nhấn <a href="?url=dangnhap&email=<?php echo $email ?>">vào đây</a> để thực hiện đăng nhập
                        </span>
                    </div>
                <?php } else { ?>
                    <?php if($check) { ?>
                        <div class="text-center">
                            <span class="text-white">Mật khẩu mới của bạn.</span>
                        </div>
                        <div class="row m-t-20">
                            <!-- Form -->
                            <form class="col-12" action="?url=khoiphucmatkhau&email=<?php echo $email ?>" method="post">
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control form-control-lg"
                                        placeholder="Mật khẩu mới"
                                        name="newPassword"
                                        value="<?php echo $newPassword ?? '' ?>"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control form-control-lg"
                                        placeholder="Nhập lại mật khẩu mới"
                                        name="reNewPassword"
                                        value="<?php echo $reNewPassword ?? '' ?>"
                                    >
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-20 p-t-20 border-top border-secondary">
                                    <div class="col-12">
                                        <a class="btn btn-success" href="?url=dangnhap&email=<?php echo $email ?>" >Quay lại đăng nhập</a>
                                        <button class="btn btn-info float-right" type="submit" name="btn-update">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="text-center">
                            <span class="text-white">Mã xác nhận đã được gửi đến email của bạn. Vui lòng điền mã xác nhận vào đây để tiếp tục khôi phục mật khẩu.</span>
                        </div>
                        <div class="row m-t-20">
                            <!-- Form -->
                            <form class="col-12" action="?url=khoiphucmatkhau&email=<?php echo $email ?>" method="post">
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        placeholder="Mã xác nhận"
                                        name="codeConfirm"
                                        value="<?php echo $codeConfirm ?? '' ?>"
                                    >
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-20 p-t-20 border-top border-secondary">
                                    <div class="col-12">
                                        <a class="btn btn-success" href="?url=dangnhap&email=<?php echo $email ?>" >Quay lại đăng nhập</a>
                                        <button class="btn btn-info float-right" type="submit" name="btn-next">Tiếp tục</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo LIBS_URL ?>jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo LIBS_URL ?>popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo LIBS_URL ?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

</body>

</html>