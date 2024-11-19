<?php
// Dang nhap
function dangNhap() {
    if(isset($_GET["email"])) {
        $email = $_GET["email"];

        if(isset($_GET["sendmail"])) {
            if($_GET["sendmail"]) {
                $code = rand(0,999999);
                $title = "Xác minh địa chỉ email của bạn";
                $content = "
                Gửi bạn,
                <br> <br>
                Vui lòng nhấn vào đây để xác minh tài khoản email của bạn.
                <h4><a href='http://duan1.com/?url=confirm&email=$email&code=$code'>Xác minh email</a></h4>
                ";
                if (sendMail($email,$title,$content)) {
                    updateMaNguoiDung($email,$code);
                    $thongbao = "Vui lòng kiểm tra email của bạn";
                    $type = "success";
                }
                else {
                    $thongbao = "Lỗi";
                    $type = "danger";
                }
            }
        }
    }

    

    if (isset($_POST["btn-login"])) {
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $user = getNguoiDungEmail($email);

        $regexEmail = "/^\S+@\S+\.\S+$/";

        // debug($user);
        $errors = [];
        if ($email == "") {
            $errors[] = "Vui lòng nhập email";
        } else {
            if (!preg_match($regexEmail, $email)) {
                $errors[] = "Email không đúng định dạng";
            }
            else {
                if ($password == "") {
                    $errors[] = "Vui lòng nhập mật khẩu";
                }
                else {
                    if($user) {
                        if($password !== $user["mat_khau"]) {
                            $errors[] = "Mật khẩu không chính xác";
                        }
                        else {
                            if(!$user["trang_thai"]) {
                                $errors[] = "Tài khoản của bạn đã bị khóa";
                            }
                            else {
                                if(!$user["kich_hoat"]) {
                                    $errors[] = "Tài khoản email của bạn chưa được xác minh";
                                    $thongbao = "Vui lòng nhấn <a href='?url=dangnhap&email=$email&sendmail=true'>vào đây</a> để xác minh email của bạn";
                                    $type = "warning";
                                }
                            }

                        }
                    }
                    else {
                        $errors[] = "Không tồn tại email";
                    }
                }
            }
        }

        if (empty($errors)) {
            $_SESSION["user"] = $user;
            echo "<script>alert('Đăng nhập thành công !')</script>";
            nextPage('?');
            die;
        }
    }

    if(isset($_POST["btn-forgot"])) {
        $emailForgot = $_POST["emailForgot"];
        $errors = [];

        if($emailForgot == "") {
            $errors[] = "Vui lòng nhập email để tiếp tục";
        }
        else {
            if(getNguoiDungEmail($emailForgot)) {
                $code = rand(0,999999);
                $title = "Khôi phục mật khẩu";
                $content = "
                Gửi bạn,
                <br> <br>
                Đây là mã xác nhận để khôi phục mật khẩu: <span><strong>$code</strong></span>
                <h4>Vui lòng không cung cấp mã này cho bất kì ai để đảm bảo bảo mật của bạn.</h4>
                ";
                if(sendMail($emailForgot,$title,$content)) {
                    updateMaNguoiDung($emailForgot,$code);
                    nextPage("?url=khoiphucmatkhau&email=$emailForgot");
                    die;
                }
                else {
                    $thongbao = "Lỗi gửi mail";
                    $type = "danger";
                }
            }
            else {
                $errors[] = "Email để khôi phục của bạn không tồn tại";
            }
        }

    }
    
    include VIEWS_URL . "users/login.php";
}

// Dang ky
function dangKy() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        $regexEmail = "/^\S+@\S+\.\S+$/";

        $errors = [];
        if ($email == "") {
            $errors[] = "Vui lòng nhập email";
        } else {
            if (!preg_match($regexEmail, $email)) {
                $errors[] = "Email không đúng định dạng";
            }
            else {
                if(getNguoiDungEmail($email)) {
                    $errors[] = "Email đã tồn tại";
                }
            }
        }

        if ($password == "") {
            $errors[] = "Vui lòng nhập mật khẩu";
        } else {
            if (strlen($password) < 6) {
                $errors[] = "Mật khẩu phải lớn hơn hoặc bằng 6 ký tự";
            } else {
                if ($repassword == "") {
                    $errors[] = "Vui lòng nhập lại mật khẩu";
                } else {
                    if ($password !== $repassword) {
                        $errors[] = "Mật khẩu nhập lại của bạn không giống";
                    }
                }
            }
        }

        if (empty($errors)) {
            $code = rand(0,999999);
            $title = "Xác minh địa chỉ email của bạn";
            $content = "
            Gửi bạn,
            <br> <br>
            Vui lòng nhấn vào đây để xác minh tài khoản email của bạn.
            <h4><a href='http://duan1.com/?url=confirm&email=$email&code=$code'>Xác minh email</a></h4>
            ";

            if (sendMail($email,$title,$content)) {
                $maNguoiDung = insertNguoiDung($email,$password,$code);
                insertGioHang($maNguoiDung);
                $thongbao = "Vui lòng kiểm tra email của bạn";
                $type = "success";
                $password = "";
                $repassword = "";
            }
            else {
                $thongbao = "Lỗi gửi mail";
                $type = "danger";
            }
        }
    }

    include VIEWS_URL . "users/signup.php";
}

// Dang xuat
function dangXuat() {
    session_destroy();
    nextPage('?');
    die;
}

// Xac nhan mat khau
function khoiPhucMatKhau() {
    $check = false;
    $success = false;

    $email = $_GET["email"];

    $errors = [];

    if(isset($_POST["btn-next"])) {
        $codeConfirm = $_POST["codeConfirm"];

        $user = getNguoiDungEmail($email);
        if($codeConfirm == "") {
            $errors[] = "Vui lòng nhập mã xác nhận";
        }
        else {
            if($codeConfirm == $user["ma"]) {
                $thongbao = "Xác nhận thành công";
                $type = "success";
                $check = true;
            }
            else {
                $errors[] = "Mã xác nhận không chính xác";
            }
        }
    }

    if(isset($_POST["btn-update"])) {
        $check = true;
        $newPassword = $_POST["newPassword"];
        $reNewPassword = $_POST["reNewPassword"];
        if ($newPassword == "") {
            $errors[] = "Vui lòng nhập mật khẩu mới";
        } else {
            if (strlen($newPassword) < 6) {
                $errors[] = "Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự";
            } else {
                if ($reNewPassword == "") {
                    $errors[] = "Vui lòng nhập lại mật khẩu mới";
                } else {
                    if ($newPassword !== $reNewPassword) {
                        $errors[] = "Mật khẩu mới nhập lại của bạn không giống";
                    }
                }
            }
        }

        if(empty($errors)) {
            updatePasswordNguoiDung($newPassword,$email);
            $thongbao = "Thay đổi mật khẩu thành công";
            $type = "success";
            $success = true;
        }
    }

    include VIEWS_URL . "users/restore-password.php";
}

// Mat khau moi
function matKhauMoi() {
    include VIEWS_URL . "users/new-password.php";
}

// Xac nhan email
function confirm() {
    $email = $_GET["email"];
    $code = $_GET["code"];
    $user = getNguoiDungEmail($email);
    $check = false;
    if($code == $user["ma"]) {
        $check = true;
        updateKichHoatNguoiDung($email);
    }

    include VIEWS_URL . "users/confirm.php";
}
