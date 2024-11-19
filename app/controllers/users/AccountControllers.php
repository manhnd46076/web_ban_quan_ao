<?php

    function taiKhoan() {
        $email = $_SESSION["user"]["email"];
        $user = getNguoiDungEmail($email);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $hoVaTen = trim($_POST["hoVaTen"]);
            $soDienThoai = trim($_POST["soDienThoai"]);
            $diaChi = trim($_POST["diaChi"]);
            $matKhauHienTai = $_POST["matKhauHienTai"];
            $matKhau1 = $_POST["matKhau1"];
            $matKhau2 = $_POST["matKhau2"];

            $regexNumber = "/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/";

            $errors = [];

            if($soDienThoai !== "") {
                if(!preg_match($regexNumber,$soDienThoai)) {
                    $errors[] = "Sai định dạng số điện thoại";
                }
            }

            if(!($matKhauHienTai == "")) {
                if($matKhauHienTai == $user["mat_khau"]) {
                    if($matKhau1 == "") {
                        $errors[] = "Vui lòng nhập mật khẩu mới";
                    }
                    else {
                        if(strlen($matKhau1) < 6) {
                            $errors[] = "Mật khẩu mới phải lớn hơn hoặc bằng 6 kí tự";
                        }
                        else {
                            if($matKhau1 == $matKhauHienTai) {
                                $errors[] = "Mật khẩu mới không được trùng với mật khẩu hiện tại";
                            }
                            else {
                                if($matKhau2 == "") {
                                    $errors[] = "Vui lòng xác nhận mật khẩu mới";
                                }
                                else {
                                    if($matKhau2 !== $matKhau1) {
                                        $errors[] = "Mật khẩu xác nhận không giống";
                                    }
                                }
                            }
                        }
                    }
                }
                else {
                    $errors[] = "Mật khẩu hiện tại không chính xác";
                }
            }

            if(empty($errors)) {
                updateThongTinNguoiDung($hoVaTen,$soDienThoai,$diaChi,$email);
                if($matKhau1 !== "") {
                    updatePasswordNguoiDung($matKhau1,$email);
                    $matKhauHienTai = "";
                    $matKhau1 = "";
                    $matKhau2 = "";
                }
                $thongbao = "Cập nhật thông tin thành công";
                $type = "success";
                $user = getNguoiDungEmail($email);
                $_SESSION["user"] = $user;
            }
        }

        include VIEWS_URL . "users/taikhoan.php";
    }

    // Đơn hàng 
    function donHangUser() {
        $url = getAllParam($_GET);

        if(isset($_GET["maTinhTrang"])) {
            $maTinhTrang = $_GET["maTinhTrang"];
        }
        else {
            $maTinhTrang = 1;
        }

        $listTinhTrang = getAllTinhTrang();
        $donHangByTinhTrang = getDonHangByNguoiDungAndTinhTrang($maTinhTrang, $_SESSION["user"]["ma_nguoi_dung"]);
        $shipping = 30000;
        include VIEWS_URL . "users/donhang.php";
    }

    // Chi Tiet Don Hang
    function chiTietDonHangUser() {
        $idDonHang = $_GET["id"];

        $view = $_GET["view"];
        $url = str_replace("$", "&", $view);


        $donHang = getDonHangById($idDonHang);
        $sanPhamDonHang = getAllSanPhamDonHangById($idDonHang);
        $shipping = 30000;
        $sum = 0;
        // debug($sanPhamDonHang);
        include VIEWS_URL . "users/chitietdonhang.php";
    }

    // Update don hang user
    function updateDonHangUser() {
        $idDonHang = $_GET["id"];
        $maDonHang = $_GET["ma"];
        $action = $_GET["action"];

        $view = $_GET["view"];
        $url = str_replace("$", "&", $view);

        $thongbao = "";
        $type = "";

        if($action == "huy") {
            updateDonHang($idDonHang, 5);
            $thongbao = "Hủy đơn hàng $maDonHang thành công !";
            $type = "success";
        }

        if($action == "xacnhan") {
            updateDonHang($idDonHang, 4);
            $sanPhamDonHang = getAllSanPhamDonHangById($idDonHang);
            foreach($sanPhamDonHang as $sanPham) {
                if($sanPham["so_luong"] == NULL) {
                    $soLuongCanUpdate = $sanPham["so_luong_bien_the"] - $sanPham["so_luong_muon_mua"];
                    updateSoLuongSanPhamBienThe($soLuongCanUpdate, $sanPham["ma_chi_tiet_san_pham"]);
                }
                else {
                    $soLuongCanUpdate = $sanPham["so_luong"] - $sanPham["so_luong_muon_mua"];
                    updateSoLuongSanPhamBinhThuong($soLuongCanUpdate, $sanPham["ma_san_pham"]);
                }
            }


            $thongbao = "Xác nhận đã nhận được hàng thành công !";
            $type = "success";
        }

        if($action == "mualai") {
            updateDonHang($idDonHang, 1);
            $thongbao = "Mua lại đơn hàng đã hủy $maDonHang thành công !";
            $type = "success";
        }

        nextPage("?$url&thongbao=$thongbao&type=$type");
        die;
    }

?>