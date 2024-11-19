<?php
    // Gio hang cua toi
    function gioHang() {
        $params = getAllParam($_GET);

        $maNguoiDung = $_SESSION["user"]["ma_nguoi_dung"];
        $gioHang = getGioHangByIdUser($maNguoiDung);
        $maGioHang = $gioHang["ma_gio_hang"];

        // Xu ly xoa san pham da chon
        if(isset($_POST["btn-delete-product-selected"])) {
            $errors = [];
            if(isset($_POST["maChiTietSanPham"])) {
                $listMaChiTietSanPhamChecked = $_POST["maChiTietSanPham"]; 
            }
            else {
                $errors[] = "Vui lòng chọn sản phẩm để xóa";
            }
            
            if(empty($errors)) {
                foreach($listMaChiTietSanPhamChecked as $maChiTietSanPhamChecked) {
                    xoaSanPhamInGioHangById($maGioHang, $maChiTietSanPhamChecked);
                }
                $thongbao = "Xóa thành công sản phẩm đã chọn";
                $type = "success";
            }
        }

        // Xu ly tien hanh thanh toan
        if(isset($_POST["btn-checkout"])) {
            $errors = [];

            if(isset($_POST["maChiTietSanPham"])) {
                $listMaChiTietSanPhamChecked = $_POST["maChiTietSanPham"]; 
            }
            else {
                $errors[] = "Vui lòng chọn sản phẩm để tiến hành thanh toán";
            }

            if(empty($errors)) {
                $sanPhamDonHang = [];

                foreach($listMaChiTietSanPhamChecked as $maChiTietSanPhamChecked) {
                    array_push($sanPhamDonHang, [
                        "ma_chi_tiet_san_pham" => $maChiTietSanPhamChecked,
                        "so_luong_muon_mua" => $_POST["soLuongMuonMua$maChiTietSanPhamChecked"]
                    ]);
                }

                $_SESSION["donHang"]["san_pham"] = $sanPhamDonHang;
                $_SESSION["donHang"]["ma_nguoi_dung"] = $_SESSION["user"]["ma_nguoi_dung"];
                nextPage("?url=dathang");
                die;
            }
        }

        
        $sumCart = 0;
        $productsInCart = getAllProductInCart($maGioHang);
        include VIEWS_URL . "users/giohang.php";
    }

    // Them san pham vao gio hang
    function themGioHang() {
        $view = $_GET["view"];
        $url = str_replace("$", "&", $view);

        $maChiTietSanPham = $_GET["maChiTietSanPham"];
        $soLuongMuonMua = $_GET["soLuongMuonMua"];

        $maNguoiDung = $_SESSION["user"]["ma_nguoi_dung"];
        $gioHang = getGioHangByIdUser($maNguoiDung);
        $maGioHang = $gioHang["ma_gio_hang"];

        if(!getProductByIdAndMaGioHang($maGioHang,$maChiTietSanPham)) {
            insertCartDetail($maGioHang,$maChiTietSanPham,$soLuongMuonMua);
            $thongbao = "Thêm sản phẩm thành công";
            $type = "success";
        }
        else {
            $thongbao = "Lỗi: Sản phẩm đã tồn tại trong giỏ hàng";
            $type = "danger";
        }

        nextPage("?$url&thongbao=$thongbao&type=$type");
        die;
    }

    // Xoa 1 san pham trong gio hang
    function xoaSanPhamGioHang() {
        $view = $_GET["view"];
        $url = str_replace("$", "&", $view);

        $maChiTietSanPham = $_GET["maChiTietSanPham"];

        $maNguoiDung = $_SESSION["user"]["ma_nguoi_dung"];
        $gioHang = getGioHangByIdUser($maNguoiDung);
        $maGioHang = $gioHang["ma_gio_hang"];

        xoaSanPhamInGioHangById($maGioHang, $maChiTietSanPham);

        nextPage("?$url");
        die;
    }

    // Thanh toan
    function datHang() {
        $shipping = 30000;

        if(isset($_POST["btn-payment"])) {
            $hoVaTen = trim($_POST["hoVaTen"]);
            $soDienThoai = trim($_POST["soDienThoai"]);
            $diaChi = trim($_POST["diaChi"]);

            $tongDonHang = $_POST["tongDonHang"];

            $regexNumber = "/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/";

            $errors = [];

            // CHECK ERROR
            if($hoVaTen == "") {
                $errors[] = "Vui lòng nhập họ và tên";
            }

            if($soDienThoai == "") {
                $errors[] = "Vui lòng nhập số điện thoại";
            }
            else {
                if(!preg_match($regexNumber,$soDienThoai)) {
                    $errors[] = "Sai định dạng số điện thoại";
                }
            }

            if($diaChi == "") {
                $errors[] = "Vui lòng nhập địa chỉ";
            }

            if(isset($_POST["phuongThucThanhToan"])) {
                $phuongThucThanhToan = $_POST["phuongThucThanhToan"];
            }
            else {
                $errors[] = "Vui lòng chọn phương thức thanh toán";
            }

            if(empty($errors)) {
                $_SESSION["donHang"]["ho_va_ten"] = $hoVaTen;
                $_SESSION["donHang"]["so_dien_thoai"] = $soDienThoai;
                $_SESSION["donHang"]["dia_chi"] = $diaChi;
                $_SESSION["donHang"]["ngay_dat"] = date("Y-m-d H:i:s");
                $_SESSION["donHang"]["ma_phuong_thuc"] = $phuongThucThanhToan;
                $_SESSION["donHang"]["shipping"] = $shipping;
                $_SESSION["donHang"]["tong_tien"] = $tongDonHang;

                $orderId = randomCodeOrder(); //Mã đơn hàng

                switch($phuongThucThanhToan) {
                    case 1: {
                        nextPage("?url=trangthaidathang&orderId=$orderId");
                        die;
                        break;
                    }
                    case 2: {
                        include LIBRARIES_URL . "momoPayment.php";
                        $partnerCode = 'MOMOBKUN20180529';
                        $accessKey = 'klm05TvNBzhg7h7j';
                        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                        $orderInfo = "Thanh toán qua MoMo";
                        $amount = $tongDonHang+$shipping; // Tổng tiền cần phải chuyển
                        $redirectUrl = "http://localhost/DuAn1_ClothesShopping/?url=trangthaidathang";
                        $ipnUrl = "http://localhost/DuAn1_ClothesShopping/?url=trangthaidathang";
                        $extraData = "";

                        $requestId = time() . "";
                        $requestType = "payWithATM";
                        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                        //before sign HMAC SHA256 signature
                        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                        $signature = hash_hmac("sha256", $rawHash, $secretKey);
                        $data = array('partnerCode' => $partnerCode,
                            'partnerName' => "Test",
                            "storeId" => "MomoTestStore",
                            'requestId' => $requestId,
                            'amount' => $amount,
                            'orderId' => $orderId,
                            'orderInfo' => $orderInfo,
                            'redirectUrl' => $redirectUrl,
                            'ipnUrl' => $ipnUrl,
                            'lang' => 'vi',
                            'extraData' => $extraData,
                            'requestType' => $requestType,
                            'signature' => $signature);
                        $result = thanhToanMoMo($endpoint, json_encode($data));
                        $jsonResult = json_decode($result, true);  // decode json

                        //Just a example, please check more in there

                        header('Location: ' . $jsonResult['payUrl']);
                        break;
                    }
                    case 3: {
                        
                        break;
                    }
                    case 4: {
                        
                        break;
                    }
                }
            }

        }

        if(isset($_POST["btn-cancel"])) {
            // debug($_SESSION);
            unset($_SESSION["donHang"]);
            nextPage("?url=giohang");
            die;
        }

        $listSanPham = $_SESSION["donHang"]["san_pham"];
        $sumProducts = 0;
        include VIEWS_URL . "users/dathang.php";
    }

    // Don Hang Thanh Cong
    function trangThaiDatHang() {
        // THONG TIN DON HANG
        $maDonHang = $_GET["orderId"];
        $maNguoiDung = $_SESSION["donHang"]["ma_nguoi_dung"];
        $hoVaTen = $_SESSION["donHang"]["ho_va_ten"];
        $soDienThoai = $_SESSION["donHang"]["so_dien_thoai"];
        $diaChi = $_SESSION["donHang"]["dia_chi"];
        $ngayDat = $_SESSION["donHang"]["ngay_dat"];
        $maPhuongThuc = $_SESSION["donHang"]["ma_phuong_thuc"];
        $phuongThucThanhToan = getPhuongThucThanhToanById($maPhuongThuc);
        $maTinhTrang = 1;
        $shipping = $_SESSION["donHang"]["shipping"];
        $tongTien = (int)$_SESSION["donHang"]["tong_tien"];

        $gioHang = getGioHangByIdUser($maNguoiDung);
        $maGioHang = $gioHang["ma_gio_hang"]; //Lay ma gio hang

        // THANH TOAN TRUC TIEP
        if($maPhuongThuc == 1) {
            $maTrangThai = 1; // Chua thanh toan

            $idDonHang = insertDonHang(
                        $maDonHang, $hoVaTen,
                        $soDienThoai, $diaChi,
                        $ngayDat, $maPhuongThuc,
                        $maTrangThai, $maTinhTrang,
                        $tongTien, $maNguoiDung, NULL );

            $listSanPhamDonHang = $_SESSION["donHang"]["san_pham"];

            foreach($listSanPhamDonHang as $sanpham) {
                insertChiTietDonHang($idDonHang, $sanpham["ma_chi_tiet_san_pham"], $sanpham["so_luong_muon_mua"]);
                xoaSanPhamInGioHangById($maGioHang, $sanpham["ma_chi_tiet_san_pham"]);
            }

            unset($_SESSION["donHang"]);
            include VIEWS_URL . "users/ordersuccess.php";
        }

        // THANH TOAN MOMO
        if($maPhuongThuc == 2) {
            if($_GET["resultCode"] == 0) {
                // THANH CONG
                $maTrangThai = 2; //Da thanh toan
                $ngayThanhToan = date("Y-m-d H:i:s"); //Ngay thanh toan

                $idDonHang = insertDonHang(
                            $maDonHang, $hoVaTen,
                            $soDienThoai, $diaChi,
                            $ngayDat, $maPhuongThuc,
                            $maTrangThai, $maTinhTrang,
                            $tongTien, $maNguoiDung,
                            $ngayThanhToan );

                $listSanPhamDonHang = $_SESSION["donHang"]["san_pham"];

                foreach($listSanPhamDonHang as $sanpham) {
                    insertChiTietDonHang($idDonHang, $sanpham["ma_chi_tiet_san_pham"], $sanpham["so_luong_muon_mua"]);
                    xoaSanPhamInGioHangById($maGioHang, $sanpham["ma_chi_tiet_san_pham"]);
                }

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

                unset($_SESSION["donHang"]);
                include VIEWS_URL . "users/ordersuccess.php";
            }
            else {
                // THAT BAI
                unset($_SESSION["donHang"]);
                include VIEWS_URL . "users/orderfail.php";
            }
        }
        // debug($_GET);
        // debug($_SESSION);
    }

?>