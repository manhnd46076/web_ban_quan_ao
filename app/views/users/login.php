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
                <div id="loginform">
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
                    <!-- <div class="alert alert-danger" role="alert">
                        Lỗi: Vui lòng nhập email
                    </div> -->
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db">
                            <h1 class="text-white">Đăng Nhập</h1>
                        </span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="?url=dangnhap" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control form-control-lg"
                                        placeholder="Email"
                                        value="<?php echo $email ?? ''?>"
                                        name="email"
                                    >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input
                                        type="password"
                                        class="form-control form-control-lg"
                                        placeholder="Mật khẩu"
                                        value="<?php echo $password ?? ''?>"
                                        name="password"
                                    >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-danger" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Quên mật khẩu?</button>
                                        <button class="btn btn-success float-right" type="submit" name="btn-login">Đăng nhập</button>
                                    </div>
                                    <div class="p-t-30">
                                        <a href="?url=/" class="btn btn-primary">Trang chủ</a>
                                        <a href="?url=dangky" class="btn btn-info float-right">Đăng ký?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Nhập địa chỉ email của bạn bên dưới và chúng tôi sẽ gửi cho bạn hướng dẫn cách khôi phục mật khẩu.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" action="?url=dangnhap" method="post">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input
                                    type="text"
                                    class="form-control form-control-lg"
                                    placeholder="Email"
                                    name="emailForgot"
                                    value="<?php echo $emailForgot ?? '' ?>"
                                >
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Quay lại đăng nhập</a>
                                    <button class="btn btn-info float-right" type="submit" name="btn-forgot">Tiếp tục</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script>

    // $('[data-toggle="tooltip"]').tooltip();
    // $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>

</html>